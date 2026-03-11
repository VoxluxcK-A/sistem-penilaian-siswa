<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Nilai;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswaData = [
            [
                'nis' => '12001',
                'nama' => 'Ahmad Budi Santoso',
                'perilaku' => 'Siswa yang aktif dan disiplin. Selalu mengerjakan tugas tepat waktu dan memiliki sikap yang baik terhadap guru dan teman.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 85],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 88],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 82],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 90],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 87]
                ]
            ],
            [
                'nis' => '12002',
                'nama' => 'Siti Nurhaliza',
                'perilaku' => 'Siswa yang cerdas dan kreatif. Sering membantu teman yang kesulitan dalam belajar dan aktif dalam kegiatan ekstrakurikuler.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 92],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 95],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 89],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 88],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 91]
                ]
            ],
            [
                'nis' => '12003',
                'nama' => 'Dedi Kurniawan',
                'perilaku' => 'Siswa yang rajin namun perlu meningkatkan pemahaman di beberapa mata pelajaran. Memiliki semangat belajar yang tinggi.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 75],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 78],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 72],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 76],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 74]
                ]
            ],
            [
                'nis' => '12004',
                'nama' => 'Maya Sari Dewi',
                'perilaku' => 'Siswa yang memiliki potensi besar dan sangat aktif dalam diskusi kelas. Menunjukkan kemampuan analitis yang baik.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 86],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 84],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 88],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 85],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 82]
                ]
            ],
            [
                'nis' => '12005',
                'nama' => 'Rizki Pratama',
                'perilaku' => 'Siswa berprestasi dengan kemampuan akademik yang sangat baik dan kepemimpinan yang kuat. Sering menjadi ketua kelas.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 94],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 90],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 93],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 96],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 89]
                ]
            ],
            [
                'nis' => '12006',
                'nama' => 'Indah Permatasari',
                'perilaku' => 'Siswa yang pendiam namun memiliki kemampuan akademik yang solid. Selalu konsisten dalam prestasi belajar.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 81],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 83],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 79],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 80],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 85]
                ]
            ],
            [
                'nis' => '12007',
                'nama' => 'Fajar Ramadhan',
                'perilaku' => 'Siswa yang energik dan suka bertanya. Memiliki rasa ingin tahu yang tinggi namun perlu lebih fokus dalam mengerjakan tugas.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 70],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 73],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 68],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 71],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 69]
                ]
            ],
            [
                'nis' => '12008',
                'nama' => 'Putri Ayu Lestari',
                'perilaku' => 'Siswa yang sangat rajin dan teliti. Memiliki kemampuan organisasi yang baik dan sering membantu guru dalam kegiatan kelas.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 87],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 91],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 85],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 83],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 88]
                ]
            ],
            [
                'nis' => '12009',
                'nama' => 'Arif Hidayat',
                'perilaku' => 'Siswa yang kreatif dan inovatif. Sering mengajukan ide-ide baru dalam diskusi kelas dan memiliki kemampuan problem solving yang baik.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 89],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 86],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 90],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 92],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 84]
                ]
            ],
            [
                'nis' => '12010',
                'nama' => 'Dewi Sartika',
                'perilaku' => 'Siswa yang memiliki kemampuan komunikasi yang baik. Aktif dalam kegiatan OSIS dan memiliki jiwa sosial yang tinggi.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 77],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 80],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 75],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 78],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 82]
                ]
            ]
        ];

        foreach ($siswaData as $data) {
            $siswa = Siswa::create([
                'nis' => $data['nis'],
                'nama' => $data['nama'],
                'perilaku' => $data['perilaku']
            ]);

            // Create nilai records for each mata pelajaran
            foreach ($data['nilai'] as $nilaiData) {
                Nilai::create([
                    'nis' => $siswa->nis,
                    'mata_pelajaran' => $nilaiData['mata_pelajaran'],
                    'nilai' => $nilaiData['nilai']
                ]);
            }
        }
    }
}