<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Nilai;

class AdditionalSiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswaData = [
            [
                'nis' => '12011',
                'nama' => 'Budi Setiawan',
                'perilaku' => 'Siswa yang tekun dan bertanggung jawab. Memiliki kemampuan matematika yang baik dan sering membantu teman belajar.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 88],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 82],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 85],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 87],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 83]
                ]
            ],
            [
                'nis' => '12012',
                'nama' => 'Citra Melati',
                'perilaku' => 'Siswa yang sangat aktif dalam kegiatan seni dan budaya. Memiliki bakat menyanyi dan sering tampil dalam acara sekolah.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 79],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 91],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 86],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 78],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 89]
                ]
            ],
            [
                'nis' => '12013',
                'nama' => 'Eko Prasetyo',
                'perilaku' => 'Siswa yang memiliki minat besar dalam olahraga. Kapten tim basket sekolah dan memiliki jiwa kepemimpinan yang baik.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 74],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 76],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 72],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 75],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 77]
                ]
            ],
            [
                'nis' => '12014',
                'nama' => 'Fitri Handayani',
                'perilaku' => 'Siswa yang rajin dan disiplin. Selalu hadir tepat waktu dan memiliki catatan yang rapi dan lengkap.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 84],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 87],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 81],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 86],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 85]
                ]
            ],
            [
                'nis' => '12015',
                'nama' => 'Gilang Ramadhan',
                'perilaku' => 'Siswa yang memiliki kemampuan teknologi yang baik. Sering membantu guru dalam penggunaan perangkat komputer.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 90],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 83],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 88],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 92],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 80]
                ]
            ],
            [
                'nis' => '12016',
                'nama' => 'Hani Safitri',
                'perilaku' => 'Siswa yang memiliki kemampuan bahasa yang sangat baik. Aktif dalam klub debat dan sering menjadi MC acara sekolah.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 81],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 94],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 92],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 79],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 88]
                ]
            ],
            [
                'nis' => '12017',
                'nama' => 'Ivan Setiadi',
                'perilaku' => 'Siswa yang pendiam namun sangat fokus dalam belajar. Memiliki kemampuan analisis yang tajam terutama dalam mata pelajaran eksak.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 95],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 85],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 87],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 93],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 82]
                ]
            ],
            [
                'nis' => '12018',
                'nama' => 'Jihan Aulia',
                'perilaku' => 'Siswa yang kreatif dan memiliki jiwa seni tinggi. Sering membuat karya seni untuk pameran sekolah.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 76],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 89],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 84],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 77],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 91]
                ]
            ],
            [
                'nis' => '12019',
                'nama' => 'Kevin Pratama',
                'perilaku' => 'Siswa yang memiliki semangat belajar tinggi namun perlu bimbingan lebih dalam beberapa mata pelajaran.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 68],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 71],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 69],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 70],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 73]
                ]
            ],
            [
                'nis' => '12020',
                'nama' => 'Laila Sari',
                'perilaku' => 'Siswa yang memiliki kemampuan sosial yang baik. Aktif dalam kegiatan PMR dan peduli terhadap lingkungan.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 82],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 86],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 80],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 84],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 87]
                ]
            ],
            [
                'nis' => '12021',
                'nama' => 'Muhammad Farid',
                'perilaku' => 'Siswa yang memiliki bakat dalam bidang agama. Sering menjadi imam sholat di sekolah dan aktif dalam kegiatan rohani.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 78],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 85],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 79],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 81],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 88]
                ]
            ],
            [
                'nis' => '12022',
                'nama' => 'Nadia Putri',
                'perilaku' => 'Siswa yang sangat teliti dan perfeksionis. Memiliki kemampuan menulis yang baik dan sering menulis artikel untuk majalah sekolah.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 86],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 93],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 89],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 84],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 90]
                ]
            ],
            [
                'nis' => '12023',
                'nama' => 'Omar Khayyam',
                'perilaku' => 'Siswa yang memiliki minat besar dalam matematika dan fisika. Sering mengikuti olimpiade sains tingkat kabupaten.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 96],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 82],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 85],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 98],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 79]
                ]
            ],
            [
                'nis' => '12024',
                'nama' => 'Priska Amelia',
                'perilaku' => 'Siswa yang memiliki kemampuan berorganisasi yang baik. Bendahara OSIS dan sangat bertanggung jawab dalam mengelola keuangan.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 89],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 87],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 91],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 85],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 92]
                ]
            ],
            [
                'nis' => '12025',
                'nama' => 'Qori Maulana',
                'perilaku' => 'Siswa yang memiliki suara yang merdu. Sering menjadi qori dalam acara-acara keagamaan di sekolah.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 75],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 88],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 77],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 76],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 84]
                ]
            ],
            [
                'nis' => '12026',
                'nama' => 'Rina Marlina',
                'perilaku' => 'Siswa yang memiliki kemampuan leadership yang kuat. Ketua kelas yang tegas namun adil dalam mengambil keputusan.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 87],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 90],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 88],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 86],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 89]
                ]
            ],
            [
                'nis' => '12027',
                'nama' => 'Sandi Kurniawan',
                'perilaku' => 'Siswa yang memiliki bakat dalam bidang teknologi informasi. Sering membantu sekolah dalam maintenance website dan sistem.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 91],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 80],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 86],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 89],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 78]
                ]
            ],
            [
                'nis' => '12028',
                'nama' => 'Tari Wulandari',
                'perilaku' => 'Siswa yang memiliki bakat menari tradisional. Sering tampil dalam acara budaya sekolah dan mewakili sekolah dalam festival.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 73],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 85],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 78],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 74],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 86]
                ]
            ],
            [
                'nis' => '12029',
                'nama' => 'Umar Faruq',
                'perilaku' => 'Siswa yang memiliki kemampuan public speaking yang baik. Sering menjadi presenter dalam acara-acara sekolah.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 84],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 92],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 90],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 81],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 87]
                ]
            ],
            [
                'nis' => '12030',
                'nama' => 'Vina Agustina',
                'perilaku' => 'Siswa yang memiliki kemampuan analitis yang baik. Sering mengajukan pertanyaan kritis dalam diskusi kelas.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 88],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 86],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 89],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 90],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 85]
                ]
            ],
            [
                'nis' => '12031',
                'nama' => 'Wahyu Hidayat',
                'perilaku' => 'Siswa yang memiliki semangat juang tinggi meskipun menghadapi kesulitan belajar. Selalu berusaha keras untuk meningkatkan prestasi.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 67],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 70],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 65],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 68],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 72]
                ]
            ],
            [
                'nis' => '12032',
                'nama' => 'Xenia Kartika',
                'perilaku' => 'Siswa yang memiliki kemampuan multibahasa. Fasih berbahasa Inggris dan Mandarin, sering menjadi penerjemah dalam acara internasional sekolah.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 85],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 88],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 95],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 82],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 90]
                ]
            ],
            [
                'nis' => '12033',
                'nama' => 'Yoga Pratama',
                'perilaku' => 'Siswa yang memiliki minat besar dalam bidang lingkungan hidup. Ketua klub pecinta alam dan aktif dalam program go green sekolah.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 79],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 83],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 81],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 87],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 85]
                ]
            ],
            [
                'nis' => '12034',
                'nama' => 'Zahra Amalia',
                'perilaku' => 'Siswa yang memiliki kemampuan menulis puisi dan cerpen. Karya-karyanya sering dimuat di majalah sekolah dan pernah memenangkan lomba sastra.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 80],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 96],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 91],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 78],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 89]
                ]
            ],
            [
                'nis' => '12035',
                'nama' => 'Andi Firmansyah',
                'perilaku' => 'Siswa yang memiliki bakat dalam bidang fotografi. Sering mendokumentasikan kegiatan sekolah dan hasil karyanya dipajang di galeri sekolah.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 76],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 82],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 79],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 81],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 84]
                ]
            ],
            [
                'nis' => '12036',
                'nama' => 'Bella Safira',
                'perilaku' => 'Siswa yang memiliki kemampuan bermusik yang baik. Pemain piano dalam band sekolah dan sering tampil dalam konser musik sekolah.',
                'nilai' => [
                    ['mata_pelajaran' => 'Matematika', 'nilai' => 83],
                    ['mata_pelajaran' => 'Bahasa Indonesia', 'nilai' => 87],
                    ['mata_pelajaran' => 'Bahasa Inggris', 'nilai' => 85],
                    ['mata_pelajaran' => 'IPA', 'nilai' => 80],
                    ['mata_pelajaran' => 'IPS', 'nilai' => 88]
                ]
            ]
        ];

        foreach ($siswaData as $data) {
            // Check if student already exists
            if (Siswa::where('nis', $data['nis'])->exists()) {
                continue;
            }

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