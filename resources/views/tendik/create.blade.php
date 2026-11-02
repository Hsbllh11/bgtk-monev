@extends('layouts.app')

@section('title', 'Pengisian Instrumen TENDIK')

@section('page-title', 'Pengisian Instrumen TENDIK')

@section('content')

    @php
        /*
         * Pernyataan instrumen TENDIK (isi tidak diubah).
         * Ditulis sebagai data agar markup tabel tidak diulang 43 kali.
         */
        $pertanyaan = [
            1 => 'Materi pelatihan sesuai dengan tugas dan kebutuhan saya sebagai tenaga kependidikan.',
            2 => 'Cakupan materi lengkap dan disusun secara runtut sehingga mudah diikuti.',
            3 => 'Materi yang disampaikan sesuai dengan ketentuan dan perkembangan terbaru.',
            4 => 'Materi dilengkapi contoh kasus dan praktik sehingga dapat saya terapkan langsung di sekolah.',
            5 => 'Bahan pendukung (modul, tayangan, contoh dokumen) lengkap, jelas, dan bermanfaat.',
            6 => 'Narasumber/fasilitator menguasai materi dan menjawab pertanyaan dengan tepat.',
            7 => 'Narasumber/fasilitator menyampaikan materi dengan jelas, sistematis, dan mudah dipahami.',
            8 => 'Metode dan media pembelajaran (contoh kasus, praktik, tayangan) membuat saya tertarik dan terlibat aktif.',
            9 => 'Narasumber/fasilitator terbuka terhadap pertanyaan, mendorong diskusi, dan memberikan umpan balik.',
            10 => 'Narasumber/fasilitator bersikap ramah dan santun serta mengelola waktu dengan baik.',
            11 => 'Informasi kegiatan (undangan, jadwal, dan bahan) disampaikan dengan jelas dan tepat waktu.',
            12 => 'Alokasi waktu dan jadwal pelatihan memadai dan dijalankan sesuai rencana.',
            13 => 'Tempat, sarana prasarana, dan konsumsi mendukung kelancaran kegiatan.',
            14 => 'Panitia melayani peserta dengan ramah, cepat tanggap, dan membantu.',
            15 => 'Secara keseluruhan, saya puas dengan penyelenggaraan pelatihan ini.',

            16 => 'Saya memahami jenis data sekolah yang harus dikelola serta alur pengelolaannya (pengumpulan, verifikasi, dan pemutakhiran).',
            17 => 'Saya mampu mempraktikkan pengelolaan data sekolah (input, verifikasi, dan pemutakhiran) sesuai ketentuan.',
            18 => 'Saya menjadi lebih teliti dan bertanggung jawab dalam menjaga keakuratan data sekolah.',
            19 => 'Saya memahami prosedur layanan administrasi sekolah (persuratan, pengarsipan, dan pelayanan warga sekolah) yang benar.',
            20 => 'Saya mampu menyusun dokumen persuratan, mengelola arsip, dan melayani warga sekolah sesuai prosedur.',
            21 => 'Saya menjadi lebih ramah, tertib, dan responsif dalam melayani kebutuhan warga sekolah.',
            22 => 'Saya memahami ketentuan administrasi keuangan dan pelaporan yang berlaku di sekolah.',
            23 => 'Saya mampu menyusun pembukuan, bukti transaksi, dan laporan keuangan sesuai format yang ditetapkan.',
            24 => 'Saya menjadi lebih jujur, transparan, dan akuntabel dalam mengelola administrasi keuangan.',
            25 => 'Saya memahami peran dan manfaat kolaborasi serta jejaring dengan kepala sekolah, guru, rekan sejawat, dinas, dan mitra.',
            26 => 'Saya mampu berkomunikasi, berkoordinasi, dan membangun jejaring kerja dengan berbagai pihak.',
            27 => 'Saya menjadi lebih terbuka, menghargai pendapat orang lain, dan mau bekerja sama.',
            28 => 'Saya memahami bahwa kemampuan dapat berkembang melalui usaha dan belajar, serta perbedaan growth mindset dengan fixed mindset.',
            29 => 'Saya mampu merumuskan tujuan pengembangan diri dan strategi menghadapi tantangan serta umpan balik dalam pekerjaan.',
            30 => 'Saya memandang tantangan dan kesalahan sebagai peluang belajar dan bersemangat mengembangkan diri.',
            31 => 'Saya memahami peran, etika, dan standar kinerja yang dituntut dari tenaga kependidikan yang profesional.',
            32 => 'Saya mampu mengatur waktu dan prioritas kerja serta memanfaatkan teknologi secara profesional.',
            33 => 'Saya berkomitmen menjaga integritas, disiplin, tanggung jawab, dan kerahasiaan data dalam bekerja.',

            34 => 'Saya menerapkan hasil pelatihan dalam pengelolaan data sekolah, yaitu memperbarui dan memverifikasi data secara berkala.',
            35 => 'Saya melayani kebutuhan administrasi warga sekolah dengan lebih cepat, tertib, dan ramah.',
            36 => 'Saya menyusun dokumen administrasi dan laporan (termasuk laporan keuangan) tepat waktu dan sesuai format.',
            37 => 'Saya berkolaborasi aktif dengan kepala sekolah, guru, rekan tenaga kependidikan, dan pihak luar (dinas, mitra jejaring) dalam menjalankan tugas.',
            38 => 'Saya memanfaatkan teknologi dalam bekerja dan menjaga keamanan serta kerahasiaan data sekolah.',

            39 => 'Data sekolah menjadi lebih akurat, lengkap, dan mutakhir dibandingkan sebelum pelatihan.',
            40 => 'Waktu penyelesaian layanan administrasi menjadi lebih singkat dan keluhan layanan berkurang.',
            41 => 'Kesalahan dan temuan pada laporan administrasi maupun keuangan berkurang.',
            42 => 'Kerja sama tim dan koordinasi antarwarga sekolah menjadi lebih baik.',
            43 => 'Pelatihan memberi dampak positif pada mutu layanan dan kinerja sekolah secara keseluruhan.',
        ];

        /* Level, rentang butir, dan keterangannya. */
        $levels = [
            1 => [
                'judul' => 'Level I — Reaksi',
                'deskripsi' => 'Penilaian terhadap materi, narasumber/fasilitator, layanan, dan kepuasan kegiatan.',
                'rentang' => range(1, 15),
                'rubrik_judul' => 'Rubrik Penilaian Level I — Reaksi',
                'rubrik_ket' => 'Makna skor 1–4 untuk setiap indikator pada Level I (Reaksi). Klik untuk melihat atau menyembunyikan.',
            ],
            2 => [
                'judul' => 'Level II — Belajar',
                'deskripsi' => 'Pengetahuan, keterampilan, dan sikap yang diperoleh melalui pelatihan.',
                'rentang' => range(16, 33),
                'rubrik_judul' => 'Rubrik Penilaian Level II — Belajar',
                'rubrik_ket' => 'Makna skor 1–4 untuk setiap indikator pada Level II (Belajar). Klik untuk melihat atau menyembunyikan.',
            ],
            3 => [
                'judul' => 'Level III — Perilaku',
                'deskripsi' => 'Penerapan hasil pelatihan dalam pelaksanaan tugas di sekolah.',
                'rentang' => range(34, 38),
                'rubrik_judul' => 'Rubrik Penilaian Level III — Perilaku',
                'rubrik_ket' => 'Makna skor 1-4 untuk setiap indikator pada Level III (Perilaku). Klik untuk melihat atau menyembunyikan.',
            ],
            4 => [
                'judul' => 'Level IV — Hasil',
                'deskripsi' => 'Dampak pelatihan terhadap layanan dan kinerja sekolah.',
                'rentang' => range(39, 43),
                'rubrik_judul' => 'Rubrik Penilaian Level IV — Hasil',
                'rubrik_ket' => 'Makna skor 1–4 untuk setiap indikator pada Level IV (Hasil). Klik untuk melihat atau menyembunyikan.',
            ],
        ];

        /*
         * Rubrik per level. Setiap baris: [No, Indikator, Skor 4, Skor 3, Skor 2, Skor 1].
         */
        $rubrik = [
            1 => [
                [1, 'Relevansi materi', 'Seluruh materi sangat sesuai dengan tugas dan kebutuhan kerja saya.', 'Sebagian besar materi sesuai dengan tugas dan kebutuhan kerja saya.', 'Hanya sebagian kecil materi yang sesuai dengan tugas saya.', 'Materi tidak sesuai dengan tugas dan kebutuhan kerja saya.'],
                [2, 'Kelengkapan dan keruntutan', 'Cakupan materi lengkap, runtut, dan seluruhnya mudah diikuti.', 'Cakupan lengkap dan runtut; sebagian kecil perlu penjelasan tambahan.', 'Cakupan kurang lengkap atau urutan sering membingungkan.', 'Cakupan tidak lengkap dan sulit diikuti.'],
                [3, 'Kemutakhiran materi', 'Seluruh materi sesuai ketentuan dan perkembangan terbaru.', 'Sebagian besar materi sesuai; sedikit bagian perlu diperbarui.', 'Banyak bagian materi yang sudah tidak sesuai ketentuan terbaru.', 'Materi tidak sesuai ketentuan dan perkembangan terbaru.'],
                [4, 'Keterterapan materi', 'Seluruh materi dilengkapi contoh/praktik dan dapat langsung diterapkan di sekolah.', 'Sebagian besar materi dapat langsung diterapkan di sekolah.', 'Hanya sebagian kecil materi yang dapat diterapkan.', 'Materi tidak dapat diterapkan di sekolah.'],
                [5, 'Bahan pendukung', 'Modul, tayangan, dan contoh dokumen lengkap, jelas, dan sangat membantu.', 'Bahan pendukung lengkap dan cukup membantu.', 'Bahan pendukung kurang lengkap atau kurang jelas.', 'Bahan pendukung tidak tersedia atau tidak membantu.'],
                [6, 'Penguasaan materi', 'Sangat menguasai materi; jawaban selalu tepat dan disertai contoh nyata.', 'Menguasai materi; sebagian besar jawaban tepat.', 'Kurang menguasai materi; jawaban sering kurang tepat.', 'Tidak menguasai materi.'],
                [7, 'Kejelasan penyampaian', 'Penyampaian selalu jelas, sistematis, dan mudah dipahami.', 'Umumnya jelas; sesekali perlu pengulangan.', 'Sering kurang jelas atau tidak sistematis.', 'Penyampaian tidak jelas dan sulit dipahami.'],
                [8, 'Metode dan media', 'Metode dan media bervariasi dan membuat saya terlibat aktif sepanjang kegiatan.', 'Sebagian besar metode dan media membuat saya terlibat.', 'Metode kurang bervariasi; keterlibatan saya rendah.', 'Metode monoton dan tidak melibatkan peserta.'],
                [9, 'Interaksi dan umpan balik', 'Selalu terbuka terhadap pertanyaan, mendorong diskusi, dan memberi umpan balik bermakna.', 'Umumnya terbuka terhadap pertanyaan dan memberi umpan balik.', 'Kurang responsif terhadap pertanyaan dan diskusi.', 'Tidak responsif terhadap pertanyaan peserta.'],
                [10, 'Sikap dan pengelolaan waktu', 'Sangat ramah dan santun; waktu dikelola tepat sesuai porsi materi.', 'Ramah dan santun; waktu umumnya terkelola baik.', 'Kurang ramah atau kurang disiplin waktu.', 'Tidak ramah dan tidak disiplin waktu.'],
                [11, 'Informasi kegiatan', 'Informasi (undangan, jadwal, bahan) lengkap, jelas, dan selalu tepat waktu.', 'Informasi lengkap dan jelas; sesekali terlambat.', 'Informasi kurang lengkap atau kurang jelas.', 'Informasi tidak jelas atau tidak saya terima.'],
                [12, 'Alokasi waktu dan jadwal', 'Alokasi waktu sangat memadai dan jadwal selalu ditaati.', 'Alokasi waktu memadai; ada sedikit penyesuaian jadwal.', 'Alokasi waktu kurang memadai; jadwal sering bergeser.', 'Alokasi waktu tidak memadai dan jadwal tidak terkendali.'],
                [13, 'Tempat, sarana, dan konsumsi', 'Seluruhnya sangat mendukung kelancaran kegiatan.', 'Mendukung kegiatan dengan sedikit kekurangan.', 'Kurang mendukung kelancaran kegiatan.', 'Tidak mendukung kegiatan.'],
                [14, 'Pelayanan panitia', 'Panitia selalu ramah, sigap, dan membantu kebutuhan peserta.', 'Panitia umumnya ramah dan membantu.', 'Panitia kurang tanggap terhadap kebutuhan peserta.', 'Panitia tidak melayani dengan baik.'],
                [15, 'Kepuasan umum', 'Sangat puas dan bersedia merekomendasikan pelatihan kepada rekan.', 'Puas terhadap penyelenggaraan pelatihan.', 'Kurang puas; banyak hal perlu diperbaiki.', 'Tidak puas terhadap penyelenggaraan pelatihan.'],
            ],
            2 => [
                [16, 'Pengelolaan data – Pengetahuan', 'Mampu menjelaskan jenis data sekolah dan alur pengelolaannya secara lengkap dan benar disertai contoh.', 'Mampu menjelaskan sebagian besar jenis data sekolah dan alur pengelolaannya dengan benar.', 'Baru memahami sebagian kecil jenis data sekolah dan alur pengelolaannya; masih memerlukan bimbingan.', 'Belum memahami jenis data sekolah dan alur pengelolaannya.'],
                [17, 'Pengelolaan data – Keterampilan', 'Mampu mempraktikkan input, verifikasi, dan pemutakhiran data sekolah sesuai ketentuan secara mandiri, tepat, dan sesuai ketentuan.', 'Mampu mempraktikkan input, verifikasi, dan pemutakhiran data sekolah sesuai ketentuan sesuai ketentuan dengan sedikit bantuan.', 'Baru mampu mempraktikkan sebagian langkah input, verifikasi, dan pemutakhiran data sekolah sesuai ketentuan; masih memerlukan bantuan.', 'Belum mampu mempraktikkan input, verifikasi, dan pemutakhiran data sekolah sesuai ketentuan.'],
                [18, 'Pengelolaan data – Sikap', 'Selalu menunjukkan ketelitian dan tanggung jawab dalam menjaga keakuratan data dalam bekerja.', 'Sering menunjukkan ketelitian dan tanggung jawab dalam menjaga keakuratan data dalam bekerja.', 'Kadang-kadang menunjukkan ketelitian dan tanggung jawab dalam menjaga keakuratan data; belum konsisten.', 'Belum menunjukkan ketelitian dan tanggung jawab dalam menjaga keakuratan data.'],
                [19, 'Layanan administrasi – Pengetahuan', 'Mampu menjelaskan prosedur persuratan, pengarsipan, dan pelayanan warga sekolah secara lengkap dan benar disertai contoh.', 'Mampu menjelaskan sebagian besar prosedur persuratan, pengarsipan, dan pelayanan warga sekolah dengan benar.', 'Baru memahami sebagian kecil prosedur persuratan, pengarsipan, dan pelayanan warga sekolah; masih memerlukan bimbingan.', 'Belum memahami prosedur persuratan, pengarsipan, dan pelayanan warga sekolah.'],
                [20, 'Layanan administrasi – Keterampilan', 'Mampu mempraktikkan penyusunan surat, pengelolaan arsip, dan pelayanan sesuai prosedur secara mandiri, tepat, dan sesuai ketentuan.', 'Mampu mempraktikkan penyusunan surat, pengelolaan arsip, dan pelayanan sesuai prosedur sesuai ketentuan dengan sedikit bantuan.', 'Baru mampu mempraktikkan sebagian langkah penyusunan surat, pengelolaan arsip, dan pelayanan sesuai prosedur; masih memerlukan bantuan.', 'Belum mampu mempraktikkan penyusunan surat, pengelolaan arsip, dan pelayanan sesuai prosedur.'],
                [21, 'Layanan administrasi – Sikap', 'Selalu menunjukkan keramahan, ketertiban, dan ketanggapan dalam melayani dalam bekerja.', 'Sering menunjukkan keramahan, ketertiban, dan ketanggapan dalam melayani dalam bekerja.', 'Kadang-kadang menunjukkan keramahan, ketertiban, dan ketanggapan dalam melayani; belum konsisten.', 'Belum menunjukkan keramahan, ketertiban, dan ketanggapan dalam melayani.'],
                [22, 'Administrasi keuangan – Pengetahuan', 'Mampu menjelaskan ketentuan administrasi keuangan dan pelaporan sekolah secara lengkap dan benar disertai contoh.', 'Mampu menjelaskan sebagian besar ketentuan administrasi keuangan dan pelaporan sekolah dengan benar.', 'Baru memahami sebagian kecil ketentuan administrasi keuangan dan pelaporan sekolah; masih memerlukan bimbingan.', 'Belum memahami ketentuan administrasi keuangan dan pelaporan sekolah.'],
                [23, 'Administrasi keuangan – Keterampilan', 'Mampu mempraktikkan penyusunan pembukuan, bukti transaksi, dan laporan keuangan secara mandiri, tepat, dan sesuai ketentuan.', 'Mampu mempraktikkan penyusunan pembukuan, bukti transaksi, dan laporan keuangan sesuai ketentuan dengan sedikit bantuan.', 'Baru mampu mempraktikkan sebagian langkah penyusunan pembukuan, bukti transaksi, dan laporan keuangan; masih memerlukan bantuan.', 'Belum mampu mempraktikkan penyusunan pembukuan, bukti transaksi, dan laporan keuangan.'],
                [24, 'Administrasi keuangan – Sikap', 'Selalu menunjukkan kejujuran, transparansi, dan akuntabilitas dalam administrasi keuangan dalam bekerja.', 'Sering menunjukkan kejujuran, transparansi, dan akuntabilitas dalam administrasi keuangan dalam bekerja.', 'Kadang-kadang menunjukkan kejujuran, transparansi, dan akuntabilitas dalam administrasi keuangan; belum konsisten.', 'Belum menunjukkan kejujuran, transparansi, dan akuntabilitas dalam administrasi keuangan.'],
                [25, 'Kolaborasi dan jejaring – Pengetahuan', 'Mampu menjelaskan peran dan manfaat kolaborasi serta jejaring kerja secara lengkap dan benar disertai contoh.', 'Mampu menjelaskan sebagian besar peran dan manfaat kolaborasi serta jejaring kerja dengan benar.', 'Baru memahami sebagian kecil peran dan manfaat kolaborasi serta jejaring kerja; masih memerlukan bimbingan.', 'Belum memahami peran dan manfaat kolaborasi serta jejaring kerja.'],
                [26, 'Kolaborasi dan jejaring – Keterampilan', 'Mampu mempraktikkan komunikasi, koordinasi, dan pembangunan jejaring kerja secara mandiri, tepat, dan sesuai ketentuan.', 'Mampu mempraktikkan komunikasi, koordinasi, dan pembangunan jejaring kerja sesuai ketentuan dengan sedikit bantuan.', 'Baru mampu mempraktikkan sebagian langkah komunikasi, koordinasi, dan pembangunan jejaring kerja; masih memerlukan bantuan.', 'Belum mampu mempraktikkan komunikasi, koordinasi, dan pembangunan jejaring kerja.'],
                [27, 'Kolaborasi dan jejaring – Sikap', 'Selalu menunjukkan keterbukaan, sikap menghargai, dan kemauan bekerja sama dalam bekerja.', 'Sering menunjukkan keterbukaan, sikap menghargai, dan kemauan bekerja sama dalam bekerja.', 'Kadang-kadang menunjukkan keterbukaan, sikap menghargai, dan kemauan bekerja sama; belum konsisten.', 'Belum menunjukkan keterbukaan, sikap menghargai, dan kemauan bekerja sama.'],
                [28, 'Growth mindset – Pengetahuan', 'Mampu menjelaskan konsep growth mindset dan perbedaannya dengan fixed mindset secara lengkap dan benar disertai contoh.', 'Mampu menjelaskan sebagian besar konsep growth mindset dan perbedaannya dengan fixed mindset dengan benar.', 'Baru memahami sebagian kecil konsep growth mindset dan perbedaannya dengan fixed mindset; masih memerlukan bimbingan.', 'Belum memahami konsep growth mindset dan perbedaannya dengan fixed mindset.'],
                [29, 'Growth mindset – Keterampilan', 'Mampu mempraktikkan perumusan tujuan pengembangan diri dan strategi menghadapi tantangan secara mandiri, tepat, dan sesuai ketentuan.', 'Mampu mempraktikkan perumusan tujuan pengembangan diri dan strategi menghadapi tantangan sesuai ketentuan dengan sedikit bantuan.', 'Baru mampu mempraktikkan sebagian langkah perumusan tujuan pengembangan diri dan strategi menghadapi tantangan; masih memerlukan bantuan.', 'Belum mampu mempraktikkan perumusan tujuan pengembangan diri dan strategi menghadapi tantangan.'],
                [30, 'Growth mindset – Sikap', 'Selalu menunjukkan pandangan terhadap tantangan dan kesalahan sebagai peluang belajar dalam bekerja.', 'Sering menunjukkan pandangan terhadap tantangan dan kesalahan sebagai peluang belajar dalam bekerja.', 'Kadang-kadang menunjukkan pandangan terhadap tantangan dan kesalahan sebagai peluang belajar; belum konsisten.', 'Belum menunjukkan pandangan terhadap tantangan dan kesalahan sebagai peluang belajar.'],
                [31, 'Profesionalisme – Pengetahuan', 'Mampu menjelaskan peran, etika, dan standar kinerja tenaga kependidikan secara lengkap dan benar disertai contoh.', 'Mampu menjelaskan sebagian besar peran, etika, dan standar kinerja tenaga kependidikan dengan benar.', 'Baru memahami sebagian kecil peran, etika, dan standar kinerja tenaga kependidikan; masih memerlukan bimbingan.', 'Belum memahami peran, etika, dan standar kinerja tenaga kependidikan.'],
                [32, 'Profesionalisme – Keterampilan', 'Mampu mempraktikkan pengaturan waktu, prioritas kerja, dan pemanfaatan teknologi secara profesional secara mandiri, tepat, dan sesuai ketentuan.', 'Mampu mempraktikkan pengaturan waktu, prioritas kerja, dan pemanfaatan teknologi secara profesional sesuai ketentuan dengan sedikit bantuan.', 'Baru mampu mempraktikkan sebagian langkah pengaturan waktu, prioritas kerja, dan pemanfaatan teknologi secara profesional; masih memerlukan bantuan.', 'Belum mampu mempraktikkan pengaturan waktu, prioritas kerja, dan pemanfaatan teknologi secara profesional.'],
                [33, 'Profesionalisme – Sikap', 'Selalu menunjukkan komitmen pada integritas, disiplin, tanggung jawab, dan kerahasiaan data dalam bekerja.', 'Sering menunjukkan komitmen pada integritas, disiplin, tanggung jawab, dan kerahasiaan data dalam bekerja.', 'Kadang-kadang menunjukkan komitmen pada integritas, disiplin, tanggung jawab, dan kerahasiaan data; belum konsisten.', 'Belum menunjukkan komitmen pada integritas, disiplin, tanggung jawab, dan kerahasiaan data.'],
            ],
            3 => [
                [34, 'Pengelolaan data', 'Selalu memperbarui dan memverifikasi data sekolah secara berkala dan telah menjadi kebiasaan kerja.', 'Sering memperbarui dan memverifikasi data sekolah secara berkala; sesekali masih terlewat.', 'Kadang-kadang memperbarui dan memverifikasi data sekolah secara berkala; belum konsisten.', 'Belum memperbarui dan memverifikasi data sekolah secara berkala setelah mengikuti pelatihan.'],
                [35, 'Layanan administrasi', 'Selalu melayani kebutuhan administrasi warga sekolah dengan cepat, tertib, dan ramah dan telah menjadi kebiasaan kerja.', 'Sering melayani kebutuhan administrasi warga sekolah dengan cepat, tertib, dan ramah; sesekali masih terlewat.', 'Kadang-kadang melayani kebutuhan administrasi warga sekolah dengan cepat, tertib, dan ramah; belum konsisten.', 'Belum melayani kebutuhan administrasi warga sekolah dengan cepat, tertib, dan ramah setelah mengikuti pelatihan.'],
                [36, 'Dokumen dan laporan', 'Selalu menyusun dokumen administrasi dan laporan tepat waktu dan sesuai format dan telah menjadi kebiasaan kerja.', 'Sering menyusun dokumen administrasi dan laporan tepat waktu dan sesuai format; sesekali masih terlewat.', 'Kadang-kadang menyusun dokumen administrasi dan laporan tepat waktu dan sesuai format; belum konsisten.', 'Belum menyusun dokumen administrasi dan laporan tepat waktu dan sesuai format setelah mengikuti pelatihan.'],
                [37, 'Kolaborasi', 'Selalu berkolaborasi aktif dengan kepala sekolah, guru, rekan, dan pihak luar dan telah menjadi kebiasaan kerja.', 'Sering berkolaborasi aktif dengan kepala sekolah, guru, rekan, dan pihak luar; sesekali masih terlewat.', 'Kadang-kadang berkolaborasi aktif dengan kepala sekolah, guru, rekan, dan pihak luar; belum konsisten.', 'Belum berkolaborasi aktif dengan kepala sekolah, guru, rekan, dan pihak luar setelah mengikuti pelatihan.'],
                [38, 'Teknologi dan keamanan data', 'Selalu memanfaatkan teknologi dan menjaga keamanan serta kerahasiaan data sekolah dan telah menjadi kebiasaan kerja.', 'Sering memanfaatkan teknologi dan menjaga keamanan serta kerahasiaan data sekolah; sesekali masih terlewat.', 'Kadang-kadang memanfaatkan teknologi dan menjaga keamanan serta kerahasiaan data sekolah; belum konsisten.', 'Belum memanfaatkan teknologi dan menjaga keamanan serta kerahasiaan data sekolah setelah mengikuti pelatihan.'],
            ],
            4 => [
                [39, 'Kualitas data', 'Keakuratan, kelengkapan, dan kemutakhiran data sekolah meningkat sangat jelas dan didukung bukti/dokumen.', 'Keakuratan, kelengkapan, dan kemutakhiran data sekolah meningkat dan dapat diamati.', 'Keakuratan, kelengkapan, dan kemutakhiran data sekolah meningkat sedikit atau belum merata.', 'Keakuratan, kelengkapan, dan kemutakhiran data sekolah belum berubah atau justru menurun.'],
                [40, 'Kecepatan layanan', 'Kecepatan layanan administrasi dan berkurangnya keluhan layanan meningkat sangat jelas dan didukung bukti/dokumen.', 'Kecepatan layanan administrasi dan berkurangnya keluhan layanan meningkat dan dapat diamati.', 'Kecepatan layanan administrasi dan berkurangnya keluhan layanan meningkat sedikit atau belum merata.', 'Kecepatan layanan administrasi dan berkurangnya keluhan layanan belum berubah atau justru menurun.'],
                [41, 'Mutu laporan', 'Mutu laporan administrasi dan keuangan (berkurangnya kesalahan dan temuan) meningkat sangat jelas dan didukung bukti/dokumen.', 'Mutu laporan administrasi dan keuangan (berkurangnya kesalahan dan temuan) meningkat dan dapat diamati.', 'Mutu laporan administrasi dan keuangan (berkurangnya kesalahan dan temuan) meningkat sedikit atau belum merata.', 'Mutu laporan administrasi dan keuangan (berkurangnya kesalahan dan temuan) belum berubah atau justru menurun.'],
                [42, 'Kerja sama tim', 'Kerja sama tim dan koordinasi antarwarga sekolah meningkat sangat jelas dan didukung bukti/dokumen.', 'Kerja sama tim dan koordinasi antarwarga sekolah meningkat dan dapat diamati.', 'Kerja sama tim dan koordinasi antarwarga sekolah meningkat sedikit atau belum merata.', 'Kerja sama tim dan koordinasi antarwarga sekolah belum berubah atau justru menurun.'],
                [43, 'Kinerja sekolah', 'Mutu layanan dan kinerja sekolah secara keseluruhan meningkat sangat jelas dan didukung bukti/dokumen.', 'Mutu layanan dan kinerja sekolah secara keseluruhan meningkat dan dapat diamati.', 'Mutu layanan dan kinerja sekolah secara keseluruhan meningkat sedikit atau belum merata.', 'Mutu layanan dan kinerja sekolah secara keseluruhan belum berubah atau justru menurun.'],
            ],
        ];

        // Warna per level (sama dengan create BCKS)
        $levelPalette = [
            1 => ['badge' => 'background:#dbeafe;color:#1d4ed8'],
            2 => ['badge' => 'background:#ede9fe;color:#6d28d9'],
            3 => ['badge' => 'background:#d1fae5;color:#047857'],
            4 => ['badge' => 'background:#fef3c7;color:#b45309'],
        ];
    @endphp

    <style>
        /* ===================== TOKEN WARNA (sama dengan create BCKS) ===================== */
        :root {
            --p-50: #eff4ff;
            --p-100: #dbe7fe;
            --p-200: #bfd4fb;
            --p-500: #3b82f6;
            --p-600: #2563eb;
            --p-700: #1d4ed8;
            --p-800: #1e40af;
            --accent: #f5b82e;
            --ink: #0f1b3d;
            --muted: #64748b;
            --line: #e6ebf5;
        }

        .d-wrap {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .d-form {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .d-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
        }

        [data-level-section][hidden] {
            display: none;
        }

        .d-card-h {
            font-size: 16px;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -.01em;
        }

        .d-card-s {
            margin-top: 2px;
            font-size: 12.5px;
            color: var(--muted);
        }

        .d-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            padding: 20px 20px 14px;
        }

        /* --- judul halaman --- */
        .d-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        @media (max-width: 640px) {
            .d-title-row {
                flex-direction: column;
            }
        }

        .d-h1 {
            font-size: 28px;
            font-weight: 400;
            letter-spacing: -.02em;
            color: var(--ink);
            line-height: 1.2;
        }

        .d-h1 b {
            font-weight: 700;
        }

        .d-crumb {
            margin-top: 4px;
            font-size: 12.5px;
            color: var(--muted);
        }

        .d-crumb a {
            color: inherit;
            transition: color .2s;
        }

        .d-crumb a:hover {
            color: var(--p-600);
        }

        .d-desc {
            margin-top: 10px;
            max-width: 640px;
            font-size: 13px;
            line-height: 1.7;
            color: #475569;
        }

        /* --- tombol pastel (warna mengikuti tile) --- */
        .d-pbtn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-shrink: 0;
            height: 46px;
            padding: 0 18px;
            border-radius: 14px;
            background: var(--b-bg);
            border: 1px solid var(--b-line);
            color: var(--b-ink);
            font-family: inherit;
            font-size: 13.5px;
            font-weight: 700;
            cursor: pointer;
            white-space: nowrap;
            transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
        }

        .d-pbtn:hover {
            transform: translateY(-1px);
            filter: brightness(.97);
            box-shadow: 0 12px 22px -14px var(--b-glow);
        }

        .d-pbtn svg {
            flex-shrink: 0;
            transition: transform .3s ease;
        }

        .d-pbtn.back:hover svg {
            transform: translateX(-3px);
        }

        .b-blue {
            --b-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%);
            --b-line: #c6d8fb;
            --b-ink: #1d4ed8;
            --b-glow: rgba(37, 99, 235, .7);
        }

        .b-mint {
            --b-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%);
            --b-line: #bfe8d4;
            --b-ink: #047857;
            --b-glow: rgba(5, 150, 105, .7);
        }

        .d-foot {
            display: flex;
            justify-content: flex-end;
        }

        /* --- info instrumen + progres --- */
        .d-info-card {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 1024px) {
            .d-info-card {
                grid-template-columns: minmax(0, 1fr) 280px;
            }
        }

        .d-info-main {
            padding: 22px;
            border-left: 4px solid var(--p-600);
        }

        .d-info-head {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .d-info-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: var(--p-50);
            color: var(--p-600);
        }

        .d-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 18px;
            padding: 12px 14px;
            border: 1px dashed var(--p-200);
            border-radius: 14px;
            background: #f5f8ff;
            font-size: 12.5px;
            line-height: 1.7;
            color: #475569;
        }

        .d-note b.t {
            display: block;
            font-weight: 700;
            color: var(--p-700);
        }

        .d-prog {
            padding: 22px;
            border-top: 1px solid var(--line);
            background: #f9fbff;
        }

        @media (min-width: 1024px) {
            .d-prog {
                border-top: 0;
                border-left: 1px solid var(--line);
            }
        }

        .d-prog-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .d-prog-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
        }

        .d-prog-pct {
            font-size: 12px;
            font-weight: 800;
            color: var(--p-600);
        }

        .d-bar {
            height: 8px;
            margin-top: 10px;
            overflow: hidden;
            border-radius: 9999px;
            background: #e6ebf5;
        }

        .d-bar>div {
            height: 100%;
            border-radius: 9999px;
            background: var(--p-600);
            transition: width .3s ease;
        }

        .d-prog-val {
            font-size: 14px;
            font-weight: 800;
            color: var(--ink);
        }

        .d-prog-sep {
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid var(--line);
        }

        /* --- notifikasi error --- */
        .d-error {
            padding: 16px 20px;
            border-radius: 16px;
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
        }

        .d-error b {
            font-size: 13px;
            font-weight: 700;
        }

        .d-error ul {
            margin: 8px 0 0 18px;
            list-style: disc;
            font-size: 12.5px;
            line-height: 1.8;
        }

        /* --- form --- */
        .d-form-grid {
            display: grid;
            gap: 18px;
            padding: 6px 20px 22px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-form-grid.c2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .d-label {
            display: block;
            margin-bottom: 8px;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--ink);
        }

        .d-label i {
            color: #e11d48;
            font-style: normal;
        }

        .d-label small {
            font-size: 12px;
            font-weight: 500;
            color: #94a3b8;
        }

        .d-field {
            width: 100%;
            height: 44px;
            padding: 0 14px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #fff;
            color: #334155;
            font-family: inherit;
            font-size: 13px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .d-field::placeholder {
            color: #94a3b8;
        }

        .d-field:focus {
            border-color: var(--p-500);
            box-shadow: 0 0 0 4px var(--p-100);
        }

        .d-err {
            margin-top: 6px;
            font-size: 12px;
            color: #e11d48;
        }

        /* --- badge --- */
        .d-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 700;
            text-align: center;
            white-space: nowrap;
        }

        /* --- tabel --- */
        .d-table {
            width: 100%;
            border-collapse: collapse;
        }

        .d-table th {
            padding: 12px 16px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid var(--line);
        }

        .d-table th.center {
            text-align: center;
        }

        .d-table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--line);
            vertical-align: middle;
        }

        .d-table tbody tr.d-data {
            transition: background .2s;
        }

        .d-table tbody tr.d-data:hover {
            background: #f7f9ff;
        }

        .d-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .d-table .txt {
            font-size: 12.5px;
            font-weight: 600;
            color: #475569;
            white-space: nowrap;
            text-align: center;
        }

        .d-table .q {
            font-size: 13px;
            line-height: 1.7;
            color: #334155;
        }

        .d-radio {
            width: 20px;
            height: 20px;
            margin: 0;
            cursor: pointer;
            accent-color: var(--p-600);
        }

        .d-radio:focus-visible {
            outline: 3px solid var(--p-100);
            outline-offset: 2px;
        }

        .d-table-note {
            padding: 12px 20px;
            border-top: 1px solid var(--line);
            font-size: 12px;
            color: #94a3b8;
        }

        /* --- rubrik (dapat dibuka/ditutup seperti semula) --- */
        .d-rubrik {
            border-top: 1px solid var(--line);
            background: #f9fbff;
        }

        .d-rubrik>summary {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            padding: 20px;
            cursor: pointer;
            list-style: none;
        }

        .d-rubrik>summary::-webkit-details-marker {
            display: none;
        }

        .d-rubrik .d-chev {
            flex-shrink: 0;
            margin-top: 2px;
            color: #94a3b8;
            transition: transform .25s ease;
        }

        .d-rubrik[open] .d-chev {
            transform: rotate(180deg);
        }

        .d-rubrik-body {
            padding: 0 20px 20px;
        }

        .d-rubrik-box {
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #fff;
        }

        .d-rubrik-box .d-table td {
            vertical-align: top;
            padding: 12px 16px;
        }

        .d-rubrik-box .kat {
            font-size: 13px;
            font-weight: 700;
            color: #334155;
        }

        .d-rubrik-box .krit {
            font-size: 12.5px;
            line-height: 1.7;
            color: #475569;
        }

        .d-skor-chip {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 28px;
            height: 28px;
            padding: 0 6px;
            border-radius: 9px;
            background: var(--p-50);
            color: var(--p-700);
            font-size: 12px;
            font-weight: 800;
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Instrumen Monev <b>TENDIK</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('instrumen.index') }}">Instrumen</a>
                        &nbsp;›&nbsp; TENDIK Instrumen
                    </p>
                    <p class="d-desc">Formulir Monitoring dan Evaluasi TENDIK.</p>
                </div>

                {{-- Kembali --}}
                <a href="{{ route('instrumen.index') }}" class="d-pbtn b-blue back">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </section>

        {{-- ================= INFORMASI INSTRUMEN & PROGRES ================= --}}
        <div class="d-card">
            <div class="d-info-card">

                {{-- Informasi instrumen --}}
                <div class="d-info-main">
                    <div class="d-info-head">
                        <div class="d-info-ico">
                            <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>

                        <div style="min-width:0">
                            <h2 class="d-card-h">Instrumen Monitoring dan Evaluasi Tenaga Kependidikan</h2>
                            <p class="d-card-s" style="line-height:1.7">
                                Instrumen ini digunakan untuk mengevaluasi efektivitas pelatihan dan dampak penerapan
                                kompetensi Tenaga Kependidikan (TENDIK).
                            </p>
                        </div>
                    </div>

                    <div class="d-note">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            style="flex-shrink:0;margin-top:3px;color:var(--p-600)">
                            <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>

                        <div>
                            <b class="t">Petunjuk pengisian</b>
                            Pilih satu jawaban yang paling sesuai dengan pendapat atau kondisi Anda untuk setiap
                            pernyataan:
                            <strong>1</strong> Sangat Tidak Setuju (STS),
                            <strong>2</strong> Tidak Setuju (TS),
                            <strong>3</strong> Setuju (S),
                            <strong>4</strong> Sangat Setuju (SS).
                            Pastikan seluruh 43 butir pernyataan telah diisi.
                        </div>
                    </div>
                </div>

                {{-- Progres pengisian --}}
                <div class="d-prog">
                    <div class="d-prog-row">
                        <span class="d-prog-label">Progres pengisian</span>
                        <span id="tendik-progress-percent" class="d-prog-pct">0%</span>
                    </div>

                    <div class="d-bar">
                        <div id="tendik-progress-bar" style="width: 0%"></div>
                    </div>

                    <div class="d-prog-row" style="margin-top:10px">
                        <span id="tendik-progress-text" class="d-prog-val">0 / 43 butir</span>
                        <span class="d-prog-label" style="font-weight:500">Penilaian</span>
                    </div>

                    <div class="d-prog-sep">
                        <p class="d-prog-label">Skor sementara</p>
                        <p id="tendik-score-text" class="d-prog-val" style="margin-top:4px">Belum ada penilaian</p>
                    </div>
                </div>

            </div>
        </div>

        {{-- ================= VALIDATION ERROR ================= --}}
        @if ($errors->any())
            <div class="d-error">
                <b>Periksa kembali isian berikut:</b>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ================= FORM UTAMA ================= --}}
        <form action="{{ route('tendik.store') }}" method="POST" class="d-form">

            @csrf

            {{-- A. IDENTITAS PETUGAS MONEV --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas Petugas Monev</h2>
                        <p class="d-card-s">Masukkan identitas petugas yang melakukan monitoring dan evaluasi.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">

                    {{-- Nama Petugas Monev --}}
                    <div>
                        <label for="nama_petugas_monev" class="d-label">Nama Petugas Monev <i>*</i></label>
                        <input id="nama_petugas_monev" name="nama_petugas_monev" value="{{ old('nama_petugas_monev') }}"
                            required class="d-field">
                        @error('nama_petugas_monev')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Instansi Petugas --}}
                    <div>
                        <label for="instansi_petugas" class="d-label">Instansi Petugas <i>*</i></label>
                        <input id="instansi_petugas" name="instansi_petugas" value="{{ old('instansi_petugas') }}" required
                            class="d-field">
                        @error('instansi_petugas')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Lokasi Monev --}}
                    <div>
                        <label for="lokasi_monev" class="d-label">Lokasi Monev <i>*</i></label>
                        <input id="lokasi_monev" name="lokasi_monev" value="{{ old('lokasi_monev') }}"
                            placeholder="Masukkan lokasi Monev" required class="d-field">
                        @error('lokasi_monev')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Pelaksanaan --}}
                    <div>
                        <label for="tanggal_pengisian" class="d-label">Tanggal Pelaksanaan <i>*</i></label>
                        <input id="tanggal_pengisian" type="date" name="tanggal_pengisian"
                            value="{{ old('tanggal_pengisian', now()->format('Y-m-d')) }}" required class="d-field">
                        @error('tanggal_pengisian')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </section>

            {{-- B. IDENTITAS RESPONDEN --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Identitas Responden</h2>
                        <p class="d-card-s">Tanda bintang (*) menunjukkan kolom wajib diisi.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">
                    <div>
                        <label for="nama_responden" class="d-label">Nama Responden <i>*</i></label>
                        <input id="nama_responden" name="nama_responden" value="{{ old('nama_responden') }}" required
                            class="d-field">
                        @error('nama_responden')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jabatan_responden" class="d-label">Jabatan <i>*</i></label>
                        <select id="jabatan_responden" name="jabatan_responden" required class="d-field">
                            <option value="">Pilih jabatan</option>
                            <option value="Tendik" @selected(old('jabatan_responden') === 'Tendik')>Tendik</option>
                            <option value="Operator" @selected(old('jabatan_responden') === 'Operator')>Operator</option>
                            <option value="Bendahara" @selected(old('jabatan_responden') === 'Bendahara')>Bendahara</option>
                            <option value="Kepala Sekolah" @selected(old('jabatan_responden') === 'Kepala Sekolah')>Kepala
                                Sekolah</option>
                            <option value="Rekan Sejawat/Guru" @selected(old('jabatan_responden') === 'Rekan Sejawat/Guru')>
                                Rekan Sejawat/Guru</option>
                        </select>
                        @error('jabatan_responden')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="jabatan-lainnya-wrap">
                        <label for="jabatan_lainnya" class="d-label">Jabatan Lainnya
                            <small>(jika memilih Lainnya)</small></label>
                        <input id="jabatan_lainnya" name="jabatan_lainnya" value="{{ old('jabatan_lainnya') }}"
                            class="d-field">
                        @error('jabatan_lainnya')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="satuan_pendidikan" class="d-label">Satuan Pendidikan <i>*</i></label>
                        <input id="satuan_pendidikan" name="satuan_pendidikan" value="{{ old('satuan_pendidikan') }}"
                            required class="d-field">
                        @error('satuan_pendidikan')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="masa_kerja" class="d-label">Masa Kerja (tahun) <i>*</i></label>
                        <input id="masa_kerja" type="number" min="0" max="100" name="masa_kerja"
                            value="{{ old('masa_kerja') }}" required class="d-field">
                        @error('masa_kerja')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nama_pelatihan" class="d-label">Nama Kegiatan/Pelatihan <i>*</i></label>
                        <input id="nama_pelatihan" name="nama_pelatihan" value="{{ old('nama_pelatihan') }}" required
                            class="d-field">
                        @error('nama_pelatihan')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_pengisian" class="d-label">Tanggal Pengisian <i>*</i></label>
                        <input id="tanggal_pengisian" type="date" name="tanggal_pengisian"
                            value="{{ old('tanggal_pengisian', now()->format('Y-m-d')) }}" required class="d-field">
                        @error('tanggal_pengisian')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- ================= LEVEL I - IV ================= --}}
            @foreach ($levels as $nomorLevel => $level)
                @php
                    $palet = $levelPalette[$nomorLevel];
                @endphp

                <section class="d-card" data-level-section="{{ $nomorLevel }}">

                    {{-- Header level --}}
                    <div class="d-card-top">
                        <div>
                            <h2 class="d-card-h">{{ $level['judul'] }}</h2>
                            <p class="d-card-s">{{ $level['deskripsi'] }}</p>
                        </div>

                        <span class="d-badge" style="{{ $palet['badge'] }}">{{ count($level['rentang']) }} indikator</span>
                    </div>

                    {{-- Tabel indikator --}}
                    <div style="overflow-x:auto">
                        <table class="d-table" style="min-width:900px">
                            <thead>
                                <tr>
                                    <th class="center" style="width:80px">No</th>
                                    <th>Pertanyaan / Indikator</th>
                                    @for ($nilai = 1; $nilai <= 4; $nilai++)
                                        <th class="center" style="width:80px">{{ $nilai }}</th>
                                    @endfor
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($level['rentang'] as $nomor)
                                    <tr class="d-data">
                                        <td class="txt">{{ $nomor }}</td>

                                        <td class="q">
                                            {{ $pertanyaan[$nomor] }}
                                            <span style="color:#e11d48">*</span>
                                            @error('jawaban_' . $nomor)
                                                <p class="d-err">{{ $message }}</p>
                                            @enderror
                                        </td>

                                        @for ($nilai = 1; $nilai <= 4; $nilai++)
                                            <td style="text-align:center">
                                                <input type="radio" name="jawaban_{{ $nomor }}" value="{{ $nilai }}" @checked((string) old('jawaban_' . $nomor) === (string) $nilai) required class="d-radio"
                                                    aria-label="Skor {{ $nilai }} untuk butir {{ $nomor }}">
                                            </td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <p class="d-table-note">Pilih satu skor untuk setiap indikator.</p>

                    {{-- Rubrik penilaian level --}}
                    <details class="d-rubrik">
                        <summary>
                            <div style="display:flex;align-items:flex-start;gap:10px">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    style="flex-shrink:0;margin-top:2px;color:var(--p-600)">
                                    <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                                </svg>

                                <div>
                                    <h3 class="d-card-h" style="font-size:14px">{{ $level['rubrik_judul'] }}</h3>
                                    <p class="d-card-s" style="line-height:1.7">{{ $level['rubrik_ket'] }}</p>
                                </div>
                            </div>

                            <svg class="d-chev" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>

                        <div class="d-rubrik-body">
                            <div class="d-rubrik-box">
                                <table class="d-table" style="min-width:960px">
                                    <thead>
                                        <tr>
                                            <th class="center" style="width:64px">No</th>
                                            <th style="width:176px">Indikator</th>
                                            <th>Skor 4 (Sangat Baik)</th>
                                            <th>Skor 3 (Baik)</th>
                                            <th>Skor 2 (Cukup)</th>
                                            <th>Skor 1 (Kurang)</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($rubrik[$nomorLevel] as $baris)
                                            <tr>
                                                <td style="text-align:center">
                                                    <span class="d-skor-chip">{{ $baris[0] }}</span>
                                                </td>

                                                <td class="kat">{{ $baris[1] }}</td>

                                                <td class="krit">{{ $baris[2] }}</td>
                                                <td class="krit">{{ $baris[3] }}</td>
                                                <td class="krit">{{ $baris[4] }}</td>
                                                <td class="krit">{{ $baris[5] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </details>

                </section>
            @endforeach

            {{-- ================= TOMBOL SIMPAN ================= --}}
            <div class="d-foot">
                <button type="submit" class="d-pbtn b-mint">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                        <path d="M17 21v-8H7v8M7 3v5h8" />
                    </svg>
                    Simpan Pengisian
                </button>
            </div>

        </form>

    </div>

    {{-- ================= JAVASCRIPT (tidak diubah) ================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const jabatan = document.getElementById('jabatan_responden');
            const lainnyaWrap = document.getElementById('jabatan-lainnya-wrap');
            const lainnyaInput = document.getElementById('jabatan_lainnya');

            const levelSections = document.querySelectorAll('[data-level-section]');

            function updateLevelJabatan() {
                if (!jabatan) return;

                const isTendik = ['Tendik', 'Operator', 'Bendahara'].includes(jabatan.value);

                levelSections.forEach(function (section) {
                    const level = Number(section.dataset.levelSection);
                    const tampil = isTendik || (level === 3 || level === 4);

                    section.hidden = !tampil;

                    section.querySelectorAll('input[type="radio"]').forEach(function (radio) {
                        radio.disabled = !tampil;

                        if (!tampil) {
                            radio.checked = false;
                        }
                    });
                });

                if (lainnyaWrap) {
                    lainnyaWrap.style.display = 'none';
                }

                if (lainnyaInput) {
                    lainnyaInput.required = false;
                    lainnyaInput.value = '';
                }

                updateTendikProgress();
            }

            function updateTendikProgress() {
                const radioAktif = Array.from(
                    document.querySelectorAll(
                        'input[type="radio"][name^="jawaban_"]:not(:disabled)'
                    )
                );

                const namaIndikator = new Set(
                    radioAktif.map(function (radio) {
                        return radio.name;
                    })
                );

                const totalIndikator = namaIndikator.size;

                const checked = radioAktif.filter(function (radio) {
                    return radio.checked;
                });

                const jumlahDiisi = checked.length;
                const totalSkor = checked.reduce(function (total, radio) {
                    return total + Number(radio.value);
                }, 0);

                const persen = totalIndikator > 0
                    ? Math.round((jumlahDiisi / totalIndikator) * 100)
                    : 0;

                const progressBar = document.getElementById('tendik-progress-bar');
                const progressPercent = document.getElementById('tendik-progress-percent');
                const progressText = document.getElementById('tendik-progress-text');
                const scoreText = document.getElementById('tendik-score-text');

                if (progressBar) {
                    progressBar.style.width = persen + '%';
                }

                if (progressPercent) {
                    progressPercent.textContent = persen + '%';
                }

                if (progressText) {
                    progressText.textContent =
                        jumlahDiisi + ' / ' + totalIndikator + ' butir';
                }

                if (scoreText) {
                    if (jumlahDiisi === 0) {
                        scoreText.textContent = 'Belum ada penilaian';
                    } else {
                        scoreText.textContent =
                            totalSkor + ' / ' + (totalIndikator * 4) + ' poin';
                    }
                }
            }

            document.querySelectorAll(
                'input[type="radio"][name^="jawaban_"]'
            ).forEach(function (radio) {
                radio.addEventListener('change', updateTendikProgress);
            });

            if (jabatan) {
                jabatan.addEventListener('change', updateLevelJabatan);
            }

            updateLevelJabatan();
        });
    </script>

@endsection