<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Nilai;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Secret Login Methods
    public function secretLogin()
    {
        if (session('admin_secret_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.secret-login');
    }

    public function secretLoginPost(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        // Simple password check - you can change this
        if ($request->password === 'admin2024') {
            session(['admin_secret_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['error' => 'Password salah']);
    }

    public function dashboard()
    {
        $totalSiswa = Siswa::count();
        
        // Query yang benar untuk SQLite
        $siswaLulus = DB::table('siswa')
            ->join('nilai', 'siswa.nis', '=', 'nilai.nis')
            ->select('siswa.id')
            ->groupBy('siswa.id', 'siswa.nis')
            ->havingRaw('AVG(nilai.nilai) >= 79')
            ->count();
        
        return view('admin.dashboard', compact('totalSiswa', 'siswaLulus'));
    }

    // Excel Import Methods
    public function importForm()
    {
        return view('admin.import');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls,csv|max:2048'
        ]);

        try {
            DB::beginTransaction();

            $data = Excel::toArray([], $request->file('excel_file'));
            $rows = $data[0]; // First sheet
            
            // Skip header row
            array_shift($rows);
            
            $imported = 0;
            $errors = [];

            foreach ($rows as $index => $row) {
                $rowNumber = $index + 2; // +2 because we skipped header and array is 0-indexed
                
                // Skip empty rows
                if (empty(array_filter($row))) {
                    continue;
                }

                // Validate required columns
                if (empty($row[0]) || empty($row[1])) {
                    $errors[] = "Baris {$rowNumber}: NIS dan Nama harus diisi";
                    continue;
                }

                $nis = trim($row[0]);
                $nama = trim($row[1]);
                $rataRata = isset($row[2]) ? floatval($row[2]) : 0;
                $perilaku = isset($row[3]) ? trim($row[3]) : '';

                // Validate NIS uniqueness
                if (Siswa::where('nis', $nis)->exists()) {
                    $errors[] = "Baris {$rowNumber}: NIS {$nis} sudah ada dalam database";
                    continue;
                }

                // Validate rata-rata nilai
                if ($rataRata < 0 || $rataRata > 100) {
                    $errors[] = "Baris {$rowNumber}: Rata-rata nilai harus antara 0-100";
                    continue;
                }

                // Create siswa
                $siswa = Siswa::create([
                    'nis' => $nis,
                    'nama' => $nama,
                    'perilaku' => $perilaku
                ]);

                // Create nilai record with rata-rata
                if ($rataRata > 0) {
                    Nilai::create([
                        'nis' => $nis,
                        'mata_pelajaran' => 'Rata-rata',
                        'nilai' => $rataRata
                    ]);
                }

                $imported++;
            }

            DB::commit();

            $message = "Berhasil import {$imported} data siswa";
            if (!empty($errors)) {
                $message .= ". Terdapat " . count($errors) . " error.";
            }

            return redirect()->route('admin.dashboard')
                ->with('success', $message)
                ->with('import_errors', $errors);

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Gagal import: ' . $e->getMessage()]);
        }
    }

    public function downloadTemplate()
    {
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="template_siswa.csv"',
        ];

        $template = "NIS,Nama Siswa,Rata-rata Nilai,Perilaku\n";
        $template .= "12001,Ahmad Budi,85,Siswa yang aktif dan disiplin\n";
        $template .= "12002,Siti Aminah,76,Perlu peningkatan dalam beberapa mata pelajaran\n";
        $template .= "12003,Budi Santoso,82,Siswa berprestasi dengan sikap yang baik\n";

        return response($template, 200, $headers);
    }

    // Existing CRUD Methods
    public function siswaIndex(Request $request)
    {
        $query = Siswa::with('nilai');
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('nis', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        
        // Handle graduation status filter
        if ($request->has('status') && !empty($request->status)) {
            if ($request->status === 'lulus') {
                $query->whereHas('nilai', function($q) {
                    $q->select('nis')
                      ->groupBy('nis')
                      ->havingRaw('AVG(nilai) >= 79');
                });
            } elseif ($request->status === 'tidak_lulus') {
                $query->whereHas('nilai', function($q) {
                    $q->select('nis')
                      ->groupBy('nis')
                      ->havingRaw('AVG(nilai) < 79');
                });
            }
        }
        
        // Apply pagination (10 per page)
        $siswa = $query->paginate(10);
        
        // Preserve search and filter parameters in pagination links
        $siswa->appends($request->only(['search', 'status']));
        
        return view('admin.siswa.index', compact('siswa'));
    }

    public function siswaCreate()
    {
        return view('admin.siswa.create');
    }

    public function siswaStore(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa',
            'nama' => 'required',
            'perilaku' => 'nullable'
        ]);

        Siswa::create($request->all());
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function siswaEdit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function siswaUpdate(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        
        $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $id,
            'nama' => 'required',
            'perilaku' => 'nullable'
        ]);

        $siswa->update($request->all());
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }

    public function siswaDestroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }

    // Nilai Management
    public function nilaiIndex($siswaId)
    {
        $siswa = Siswa::with('nilai')->findOrFail($siswaId);
        return view('admin.nilai.index', compact('siswa'));
    }

    public function nilaiStore(Request $request, $siswaId)
    {
        $siswa = Siswa::findOrFail($siswaId);
        
        $request->validate([
            'mata_pelajaran' => 'required',
            'nilai' => 'required|numeric|min:0|max:100'
        ]);

        Nilai::create([
            'nis' => $siswa->nis,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai' => $request->nilai
        ]);

        return redirect()->route('admin.nilai.index', $siswaId)->with('success', 'Nilai berhasil ditambahkan');
    }

    public function nilaiDestroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $siswaId = $nilai->siswa->id;
        $nilai->delete();
        
        return redirect()->route('admin.nilai.index', $siswaId)->with('success', 'Nilai berhasil dihapus');
    }
}