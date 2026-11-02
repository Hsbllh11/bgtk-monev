@extends('layouts.app')

@section('title', 'Hasil Pengisian PKGSD MBI')
@section('page-title', 'Hasil Pengisian PKGSD MBI')

@section('content')
    @php
        /*
        |--------------------------------------------------------------------------
        | Konfigurasi instrumen
        |--------------------------------------------------------------------------
        */

        // Data instrumen ditanam langsung di halaman ini agar tidak bergantung pada config.
        $instrumen = json_decode(<<<'PKGSD_JSON'
        {"1": {"indikator": [{"no": 1, "indikator": "Kesesuaian tujuan, struktur, dan materi pelatihan dengan kebutuhan guru SD dalam mengajar Bahasa Inggris.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 2, "indikator": "Kesesuain bahan ajar dengan struktur program", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 3, "indikator": "Kesesuaian alokasi materi dengan bobot materi", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 4, "indikator": "Materi mendukung pengajaran Bahasa Inggris sesuai fase/kelas, kebutuhan murid, dan konteks sekolah", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 5, "indikator": "Manfaat materi pelatihan dalam meningkatkan kompetensi peserta", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 6, "indikator": "Kesiapan dan ketersediaan sarana kegiatan (audio visual, LCD/laptop, papan putih, pelantang, spidol, penghapus).", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 7, "indikator": "Kenyamanan ruang kegiatan (ventilasi udara/AC, pencahayaan).", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 8, "indikator": "Kebersihan ruang kelas.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 9, "indikator": "Ketersediaan sarana ibadah.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 10, "indikator": "Ketersediaan akses internet", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 11, "indikator": "Fasilitator memfasilitasi dan mendampingi proses pembelajaran peserta.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 12, "indikator": "Fasilitator menggunakan bahasa yang menghargai dan menghormati di dalam berkomunikasi dengan peserta.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 13, "indikator": "Fasilitator memulai dan mengakhiri pembelajaran tepat waktu.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 14, "indikator": "Fasilitator mampu menyampaikan materi dengan jelas dan tepat, sehingga peserta dapat memahami pembelajaran dengan baik.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 15, "indikator": "Kemudahan dalam mengakses LMS Pembelajaran", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 16, "indikator": "Kemudahan dalam membaca materi/video yang ada di LMS", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 17, "indikator": "Kemudahan dalam mengikuti alur LMS", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 18, "indikator": "Kemudahan dalam pembelajaran di LMS", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 19, "indikator": "Kemudahan dalam berdiskusi di LMS", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 20, "indikator": "Kemudahan dalam mengumpulkan tugas di LMS", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 21, "indikator": "Kelengkapan dokumen/kit bahan kegiatan (materi, LMS, ATK)", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 22, "indikator": "Kualitas tampilan bahan tayang kegiatan.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 23, "indikator": "Kemudahan penggunaan bahan tayang, modul, dan sumber belajar", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 24, "indikator": "Ketersediaan ilustrasi dan contoh pada bahan pembelajaran kegiatan.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 25, "indikator": "Kesesuaian alokasi waktu pelaksanaan kegiatan dengan tujuan dan sasaran program kegiatan.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 26, "indikator": "Ketepatan alokasi waktu untuk menyelesaikan setiap tagihan pembelajaran.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 27, "indikator": "Kecukupan menu yang mendukung pemenuhan gizi.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 28, "indikator": "Variasi hidangan/konsumsi.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 29, "indikator": "Ketepatan waktu penyediaan konsumsi.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}], "kelompok": {"1": "Program dan Materi", "6": "Sarana dan Prasarana Penunjang Kegiatan", "11": "Fasilitator", "15": "Akses LMS", "21": "Bahan Kegiatan", "25": "Jangka Waktu Pelaksanaan Kegiatan", "27": "Layanan Menu"}, "label": "LEVEL 1 – REACTION", "deskripsi": "Nilai respons terhadap program dan pelaksanaan pelatihan. Skor 1–4."}, "2": {"indikator": [{"no": 1, "indikator": "Pemahaman capaian dan tujuan pembelajaran Bahasa Inggris", "rubrik": ["Belum dapat menjelaskan tujuan/capaian pembelajaran yang relevan.", "Menjelaskan secara umum, tetapi tujuan belum spesifik atau belum sesuai kelas/fase.", "Menetapkan tujuan yang relevan dengan kelas/fase dan keterampilan berbahasa yang dituju.", "Tujuan spesifik, terukur, sesuai kebutuhan murid, serta mengintegrasikan konteks yang dekat dengan kehidupan mereka."]}, {"no": 2, "indikator": "Pengembangan keterampilan menyimak (listening)", "rubrik": ["Tidak mampu memilih/merancang aktivitas menyimak yang sesuai.", "Aktivitas menyimak ada tetapi instruksi, sumber audio, atau tindak lanjut kurang jelas.", "Merancang aktivitas menyimak dengan instruksi, sumber yang sesuai, dan tugas pemahaman.", "Menggunakan tahapan pra-menyimak, saat menyimak, dan pasca-menyimak serta strategi untuk tingkat kemampuan berbeda."]}, {"no": 3, "indikator": "Pengembangan keterampilan berbicara (speaking)", "rubrik": ["Tidak merancang kesempatan murid berbicara.", "Kesempatan berbicara terbatas pada pengulangan bersama atau jawaban satu kata.", "Menyediakan praktik berpasangan/kelompok dengan ungkapan dan konteks yang sesuai.", "Menyediakan interaksi bermakna, pemodelan, dukungan ungkapan, serta kesempatan berbicara yang merata dan bertahap."]}, {"no": 4, "indikator": "Pengembangan keterampilan membaca (reading)", "rubrik": ["Aktivitas tidak sesuai kemampuan baca atau tujuan.", "Aktivitas didominasi membaca/menyalin tanpa strategi pemahaman yang jelas.", "Memilih teks sesuai tingkat murid dan menyertakan pertanyaan pemahaman.", "Menggunakan strategi sebelum, selama, dan setelah membaca serta dukungan kosakata dan pemahaman."]}, {"no": 5, "indikator": "Pengembangan keterampilan menulis (writing)", "rubrik": ["Tidak menunjukkan tahapan atau contoh penulisan.", "Tugas menulis diberikan tanpa contoh atau bantuan yang memadai.", "Memberi model, kosakata/kerangka, dan kesempatan menulis sesuai tingkat murid.", "Merancang tahapan dari model ke tulisan mandiri, dengan umpan balik dan revisi sederhana."]}, {"no": 6, "indikator": "Media dan sumber belajar", "rubrik": ["Merancang media yang tidak sesuai tujuan/tidak menggunakan media", "Merancang media yang tidak mendukung aktivitas inti", "Merancang media/audio/gambar/kartu/objek mendukung pemahaman dan praktik berbahasa.", "Memilih atau membuat media yang tepat, inklusif, mudah diakses, dan mengaktifkan murid."]}, {"no": 7, "indikator": "Pemahaman terkait prinsip pembelajaran Bahasa Inggris yang sesuai untuk siswa SD.", "rubrik": ["Tidak mampu menjelaskan/menggambarkan prinsip pembelajaran bahasa inggris yang sesuai untuk siswa SD", "Menjelaskan prinsip pembelajaran bahasa inggris namun tidak sesuai dengan siswa SD", "Mampu menjelaskan prinsip pembelajaran bahasa inggris yang sesuai dengan siswa SD", "Mampu menjelaskan prinsip pembelajaran bahasa inggris yang sesuai dengan siswa SD secara spesifik."]}, {"no": 8, "indikator": "Penggunaan ungkapan Bahasa Inggris sederhana dalam kegiatan wawancara", "rubrik": ["Belum mampu menggunakan ungkapan bahasa inggris sederhana ketika wawancara", "Menggunakan Bahasa Inggris secara terbatas tanpa dukungan pemahaman yang konsisten.", "Menggunakan ungkapan bahasa inggris sederhana, model pelafalan, gerak, visual, dan/atau terjemahan seperlunya.", "Bahasa inggris konsisten, jelas, bertahap, disertai visual/gestur."]}, {"no": 9, "indikator": "Penyusunan modul ajar atau rencana pembelajaran Bahasa Inggris.", "rubrik": ["Tidak menyusun modul ajar atau rencana pembelajaran bahasa inggris", "Menyusun modul ajar atau rencana pembelajaran bahasa inggris namun tidak runut", "Menyusun modul ajar atau rencana pembelajaran bahasa inggris namun belum terlihat media dan kegiatan yang menunjang peningkatan kemampuan bahasa inggris siswa", "Modul ajar atau rencana pembelajaran bahasa inggris yang disusun sudah lengkap dan dapat menunjang peningkatan kemampuan bahasa inggris siswa."]}, {"no": 10, "indikator": "Merancang aktivitas interaktif, seperti permainan bahasa, lagu, dialog, dan bermain peran.", "rubrik": ["Tidak mampu merancang aktivitas interaktif seperti permainan bahasa, lagu, dialog, dan bermain peran.", "Mampu merancang aktivitas interaktif namun tidak sesuai dengan tujuan pembelajaran", "Mampu merancang aktifitas interaktif yang sesuai dengan tujuan namun masih monoton", "Mampu merancang aktivitas interaktif yang beragam dan sesuai dengan tujuan pembelajaran"]}], "kelompok": {}, "label": "LEVEL 2 — LEARNING: Pengetahuan dan Keterampilan yang Dipelajari", "deskripsi": "Penilai melakukan wawancara dengan guru setelah pelatihan, lalu menilai setiap indikator dengan rubrik 1–4."}, "3": {"indikator": [{"no": 1, "indikator": "Guru menyampaikan tujuan dan alur pembelajaran", "rubrik": ["Tujuan disampaikan/diarahkan dan kegiatan tidak terkait dengan tujuan.", "Tujuan atau alur ada tetapi tidak jelas bagi murid.", "Kegiatan runtut dan mengarah pada tujuan Bahasa Inggris.", "Tujuan, kegiatan, dan penutup saling terhubung; guru mengecek pencapaian tujuan."]}, {"no": 2, "indikator": "Guru menggunakan konteks nyata yang dekat dengan kehidupan murid.", "rubrik": ["Pembelajaran hanya memakai angka dan simbol tanpa konteks.", "Konteks digunakan, tetapi tidak dikenal murid atau tidak diperlukan untuk memahami soal.", "Konteks dikenal murid dan digunakan dalam kegiatan inti.", "Konteks dekat dengan kehidupan murid, digunakan sepanjang pembelajaran, dan murid menyebutkan contoh dari pengalaman mereka sendiri."]}, {"no": 3, "indikator": "Guru mengajukan pertanyaan pemantik yang mendorong murid berpikir.", "rubrik": ["Guru tidak mengajukan pertanyaan yang mendorong murid berpikir.", "Hampir semua pertanyaan guru bersifat tertutup (jawaban singkat benar/salah).", "Guru mengajukan beberapa pertanyaan terbuka, tetapi sebagian besar pertanyaan lainnya tertutup.", "Sebagian besar pertanyaan guru terbuka, dan murid memberi jawaban lebih dari satu kata atau menyertakan alasan."]}, {"no": 4, "indikator": "Guru membangun rasa ingin tahu murid.", "rubrik": ["Tidak ada murid yang bertanya, menebak, atau mencoba atas inisiatif sendiri; murid menunggu instruksi.", "Kurang dari separuh murid bertanya, menebak, atau mencoba atas inisiatif sendiri.", "Separuh hingga tiga perempat murid bertanya, menebak, atau mencoba atas inisiatif sendiri.", "Hampir semua murid (lebih dari tiga perempat) bertanya, menebak, atau mencoba atas inisiatif sendiri tanpa harus diminta berulang kali."]}, {"no": 5, "indikator": "Guru membangun konsep secara bertahap dari pengalaman konkret.", "rubrik": ["Guru langsung memberikan rumus, aturan, atau cara penyelesaian, lalu murid berlatih.", "Guru menjelaskan konsep tahap demi tahap, tetapi tanpa benda atau gambar sehingga urutannya melompat ke simbol.", "Guru menyajikan konsep dari benda atau pengalaman konkret ke simbol dengan urutan runtut, tetapi murid lebih banyak menerima penjelasan.", "Murid membangun konsep melalui pengalaman konkret, gambar/representasi, lalu simbol, dan hubungan antartahap diungkapkan murid atau dimunculkan lewat pertanyaan guru."]}, {"no": 6, "indikator": "Guru menghubungkan konsep baru dengan konsep atau pengalaman sebelumnya.", "rubrik": ["Guru tidak menghubungkan konsep dengan pembelajaran atau pengalaman sebelumnya.", "Guru menyebut keterkaitan sekilas (misalnya “kemarin kita sudah belajar”) tanpa memakainya dalam kegiatan.", "Guru menghubungkan konsep baru dengan satu konsep atau pengalaman sebelumnya secara spesifik dan memakainya dalam kegiatan.", "Guru dan murid menghubungkan konsep baru dengan beberapa konsep atau konteks lain, dan murid dapat menyebutkan keterkaitannya."]}, {"no": 7, "indikator": "Guru menggunakan media atau alat bantu untuk membantu murid memahami konsep.", "rubrik": ["Tidak ada media atau alat bantu.", "Media ada, tetapi hanya dipakai guru sebagai peraga atau tidak berkaitan dengan konsep.", "Media dipakai murid dan membantu mereka mengerjakan tugas.", "Murid memanipulasi media sendiri, dan media membantu mereka menjelaskan atau menemukan konsep."]}, {"no": 8, "indikator": "Guru menyisipkan penggunaan bahasa Inggris sederhana.", "rubrik": ["Guru hampir tidak menggunakan Bahasa Inggris saat konteks memungkinkan.", "Ungkapan Bahasa Inggris digunakan sesekali, tetapi tidak konsisten atau sulit dipahami murid.", "Guru menggunakan ungkapan kelas sederhana dengan pelafalan dan dukungan yang sesuai.", "Guru menggunakan Bahasa Inggris secara konsisten dan bertahap, memanfaatkan gestur/visual serta mengecek pemahaman."]}, {"no": 9, "indikator": "Pemodelan bahasa dan pelafalan", "rubrik": ["Tidak memberi model sebelum murid diminta melakukan tugas.", "Model diberikan terbatas atau tidak jelas.", "Guru memberi contoh kosakata, ungkapan, pelafalan, atau struktur yang dibutuhkan.", "Guru memberi model jelas, memecah contoh bila perlu, lalu memberi kesempatan murid menirukan dan menggunakan secara mandiri."]}, {"no": 10, "indikator": "Siswa terlibat aktif dalam kegiatan menyimak (listening)", "rubrik": ["Tidak ada aktivitas menyimak yang relevan.", "Aktivitas menyimak singkat tanpa tujuan atau tindak lanjut jelas.", "Murid menyimak instruksi, cerita, dialog, atau audio dan menunjukkan pemahaman.", "Aktivitas menyimak bertahap; guru mengulang/menyesuaikan dukungan dan memeriksa pemahaman beragam murid."]}, {"no": 11, "indikator": "Siswa terlibat aktif dalam kegiatan berbicara (speaking)", "rubrik": ["Murid tidak diberi kesempatan berbicara selain menirukan serentak.", "Hanya sebagian kecil murid berbicara atau respons didominasi murid tertentu.", "Murid berlatih berbicara melalui tanya jawab, pasangan, permainan peran, atau kelompok.", "Lebih dari tiga perempat murid memperoleh kesempatan berbicara bermakna dan guru memantau pemerataan partisipasi."]}, {"no": 12, "indikator": "Siswa terlibat aktif dalam kegiatan membaca (reading)", "rubrik": ["Tidak ada kegiatan membaca yang sesuai tujuan.", "Membaca terbatas pada menirukan bunyi tanpa memeriksa pemahaman.", "Murid membaca kata/kalimat/teks sesuai tingkat dan menjawab pertanyaan pemahaman.", "Guru membimbing strategi membaca dan memberi dukungan kosakata serta tindak lanjut berdasarkan respons murid."]}, {"no": 13, "indikator": "Siswa diberikan kesempatan untuk menulis (writing)", "rubrik": ["Tidak ada kesempatan menulis sesuai tujuan.", "Murid menyalin tanpa memahami fungsi atau produk yang diharapkan.", "Murid menulis kata/kalimat/teks pendek sesuai tingkat dengan contoh atau kerangka.", "Murid menyusun tulisan bertahap, memperoleh umpan balik, dan memperbaiki hasil sesuai kemampuan."]}, {"no": 14, "indikator": "Aktivitas murid sesuai dengan tujuan pembelajaran.", "rubrik": ["Aktivitas yang dilakukan murid tidak mengarah pada tujuan pembelajaran.", "Sebagian aktivitas mengarah pada tujuan, tetapi aktivitas inti melenceng.", "Seluruh aktivitas mengarah pada tujuan pembelajaran.", "Seluruh aktivitas mengarah pada tujuan pembelajaran, dan guru memeriksa (melalui pertanyaan atau hasil kerja) apakah tujuan tercapai."]}, {"no": 15, "indikator": "Suasana belajar terasa menggembirakan bagi murid (tampak dari ekspresi dan perilaku murid).", "rubrik": ["Sebagian besar murid tampak pasif, tegang, atau tidak tertarik (misalnya diam, menunduk, atau melamun).", "Beberapa murid tampak senang pada bagian tertentu (permainan atau lagu), tetapi kembali pasif saat mengerjakan konsep.", "Sebagian besar murid tampak senang dan bersemangat (tersenyum, tertawa, atau bersuara antusias) selama sebagian besar kegiatan.", "Hampir semua murid tampak senang dan bersemangat sepanjang pembelajaran, termasuk saat mengerjakan tugas matematika (bukan hanya saat selingan)."]}, {"no": 16, "indikator": "Guru memberi ruang bagi beragam jawaban dan cara penyelesaian murid.", "rubrik": ["Guru mengabaikan jawaban murid atau langsung menyalahkannya.", "Guru hanya menerima satu jawaban atau satu cara yang dianggap benar.", "Guru menerima dan menanggapi beberapa jawaban atau cara yang berbeda.", "Guru mengundang jawaban dan cara yang berbeda, menampilkan beberapa di antaranya, dan membandingkannya bersama murid."]}, {"no": 17, "indikator": "Guru mengajukan pertanyaan lanjutan (probing) untuk menggali cara berpikir murid.", "rubrik": ["Guru tidak mengajukan pertanyaan lanjutan setelah murid menjawab.", "Guru mengajukan pertanyaan lanjutan 1–2 kali selama pembelajaran.", "Guru mengajukan pertanyaan lanjutan 3–4 kali, kepada murid yang berbeda.", "Guru mengajukan pertanyaan lanjutan 5 kali atau lebih, bertingkat (cara, alasan, lalu pengembangan), kepada murid yang berbeda-beda."]}, {"no": 18, "indikator": "Guru menanggapi jawaban murid secara membangun.", "rubrik": ["Guru langsung mengoreksi atau memberi jawaban benar ketika murid keliru.", "Guru memberi tanggapan umum (pujian atau “salah”) tanpa membimbing murid.", "Guru membimbing murid memperbaiki jawabannya dengan pertanyaan penuntun.", "Guru membimbing murid memperbaiki jawabannya dan memanfaatkan jawaban keliru sebagai bahan belajar bagi seluruh kelas."]}, {"no": 19, "indikator": "Guru mengakomodasi perbedaan kemampuan dan kebutuhan murid (diferensiasi).", "rubrik": ["Seluruh murid mengerjakan tugas yang sama dengan bantuan yang sama.", "Guru membantu murid tertentu hanya jika murid meminta.", "Guru secara sengaja memberi bantuan atau tantangan berbeda kepada satu kelompok murid (yang perlu bantuan atau yang cepat selesai).", "Guru secara sengaja menyesuaikan tugas, media, atau bantuan bagi murid yang perlu bantuan maupun yang perlu tantangan."]}, {"no": 20, "indikator": "Murid melakukan refleksi pembelajaran.", "rubrik": ["Tidak ada kegiatan refleksi.", "Hanya guru yang merangkum atau menilai pembelajaran.", "Kurang dari separuh murid menyampaikan apa yang dipelajari atau dirasakan.", "Sebagian besar murid menyampaikan (lisan, tulisan, atau gambar) apa yang dipelajari, bagaimana caranya, dan perasaannya."]}, {"no": 21, "indikator": "Guru mengapresiasi proses belajar murid, bukan hanya hasil.", "rubrik": ["Tidak ada apresiasi.", "Apresiasi bersifat umum (misalnya “bagus”) atau hanya untuk jawaban yang benar.", "Guru mengapresiasi usaha atau cara berpikir murid secara spesifik kepada beberapa murid.", "Guru mengapresiasi usaha dan cara berpikir murid secara spesifik kepada sedikitnya lima murid yang berbeda, termasuk murid yang belum berhasil."]}, {"no": 22, "indikator": "Guru menutup pembelajaran dengan menyimpulkan bersama murid.", "rubrik": ["Pembelajaran berakhir tanpa penutup (misalnya waktu habis).", "Guru menyampaikan kesimpulan sendiri.", "Guru menyusun kesimpulan bersama murid melalui tanya jawab.", "Guru menyusun kesimpulan bersama murid dan mengaitkannya dengan pembelajaran berikutnya atau kehidupan sehari-hari murid."]}], "kelompok": {"1": "Tahap 1: Gali dan Eksplorasi", "5": "Tahap 2: Muat Konten", "10": "Tahap 3: Buat Aktivitas", "16": "Tahap 4: Ikuti Pemikiran Murid", "20": "Tahap 5: Rayakan dan Akhiri"}, "label": "LEVEL 3 — BEHAVIOR: Penerapan Hasil Pelatihan di Kelas (Observasi Pembelajaran)", "deskripsi": "Observasi penerapan hasil pelatihan di kelas. Skor 3–4 wajib disertai bukti. Pilih TD bila indikator tidak ada kesempatan diamati dan tuliskan alasannya."}, "4": {"indikator": [{"no": 1, "indikator": "Guru menerapkan strategi hasil pelatihan", "rubrik": ["Tidak ada bukti penerapan setelah pelatihan.", "Menerapkan satu strategi pada satu kesempatan.", "Menerapkan beberapa strategi pada 2–3 kesempatan dan terdokumentasi.", "Menerapkan strategi secara konsisten pada 4 kesempatan atau lebih; ada bukti perangkat dan refleksi."]}, {"no": 2, "indikator": "Guru mengembangkan perangkat ajar", "rubrik": ["Tidak membuat/menyesuaikan perangkat ajar berdasarkan pelatihan.", "Perangkat sebagian besar menyalin contoh tanpa penyesuaian nyata.", "Perangkat disesuaikan dengan kelas, tujuan, dan kebutuhan murid.", "Membuat/mengadaptasi perangkat untuk beberapa topik, dengan asesmen dan tindak lanjut berbasis bukti."]}, {"no": 3, "indikator": "Guru berbagi praktik dengan rekan", "rubrik": ["Tidak ada kegiatan berbagi.", "Berbagi informal tanpa contoh atau dokumentasi.", "Berbagi praktik dalam KKG/komunitas belajar/rapat guru.", "Berbagi disertai demonstrasi, bahan ajar, atau observasi sejawat dan tindak lanjut."]}, {"no": 4, "indikator": "Keberanian menggunakan Bahasa Inggris", "rubrik": ["Tidak tampak perubahan dibanding kondisi awal.", "Kurang dari 50% murid yang sebelumnya pasif mulai mencoba menggunakan Bahasa Inggris.", "50–75% murid yang sebelumnya pasif mulai mencoba menggunakan Bahasa Inggris.", "Lebih dari 75% murid yang sebelumnya pasif mulai mencoba ungkapan Bahasa Inggris, termasuk saat belum yakin."]}, {"no": 5, "indikator": "Pemahaman kosakata dan ungkapan", "rubrik": ["Tidak ada bukti peningkatan dari kondisi awal.", "Kurang dari 50% murid menunjukkan peningkatan pada tugas/cek pemahaman.", "50–75% murid menunjukkan peningkatan pada tugas/cek pemahaman.", "Lebih dari 75% murid menunjukkan peningkatan yang terverifikasi melalui asesmen atau hasil kerja."]}, {"no": 6, "indikator": "Keterampilan menyimak dan merespons", "rubrik": ["Tidak ada bukti peningkatan kemampuan memahami instruksi/dialog sederhana.", "Kurang dari 50% murid menunjukkan peningkatan pemahaman/ respons.", "50–75% murid menunjukkan peningkatan pemahaman/ respons.", "Lebih dari 75% murid menunjukkan peningkatan, dibanding asesmen atau contoh kerja awal."]}, {"no": 7, "indikator": "Keterampilan berbicara/interaksi", "rubrik": ["Tidak ada bukti peningkatan berbicara atau interaksi.", "Kurang dari 50% murid meningkat dalam penggunaan kata/ungkapan lisan.", "50–75% murid meningkat dalam penggunaan ungkapan/percakapan sesuai tujuan.", "Lebih dari 75% murid meningkat dan mampu menggunakan ungkapan dalam konteks tugas/percakapan."]}, {"no": 8, "indikator": "Keterampilan membaca/menulis sesuai target", "rubrik": ["Tidak ada bukti perubahan pada tugas membaca/menulis yang diajarkan.", "Kurang dari 50% murid menunjukkan peningkatan pada tugas terkait.", "50–75% murid menunjukkan peningkatan pada tugas terkait.", "Lebih dari 75% murid menunjukkan peningkatan berdasarkan rubrik/hasil kerja yang dibandingkan."]}, {"no": 9, "indikator": "Motivasi dan sikap terhadap Bahasa Inggris", "rubrik": ["Tidak ada perubahan atau murid semakin menghindari kegiatan.", "Kurang dari 50% murid menunjukkan tanda minat/kepercayaan diri meningkat.", "50–75% murid menunjukkan minat, antusiasme, atau kesediaan mencoba yang meningkat.", "Lebih dari 75% murid menunjukkan minat/kepercayaan diri yang meningkat secara konsisten dan didukung catatan."]}, {"no": 10, "indikator": "Kolaborasi guru dalam pembelajaran Bahasa Inggris", "rubrik": ["Tidak ada diskusi/kolaborasi terkait pembelajaran Bahasa Inggris.", "Ada satu kali diskusi informal tanpa tindak lanjut.", "Ada dua kali atau lebih diskusi/berbagi bahan dan strategi pembelajaran.", "Kolaborasi terjadwal dan terdokumentasi; perangkat atau praktik diperbaiki bersama."]}, {"no": 11, "indikator": "Dukungan kepala sekolah/komunitas belajar", "rubrik": ["Tidak ada dukungan yang teridentifikasi.", "Dukungan terbatas pada persetujuan umum.", "Ada dukungan konkret seperti waktu kolaborasi, supervisi, atau akses media.", "Dukungan berkelanjutan, ditindaklanjuti, dan dimanfaatkan untuk memperbaiki pembelajaran."]}, {"no": 12, "indikator": "Pemanfaatan hasil asesmen untuk perbaikan", "rubrik": ["Hasil asesmen tidak dianalisis atau digunakan.", "Hasil asesmen dicatat tetapi tindak lanjut belum jelas.", "Guru menggunakan hasil asesmen untuk menentukan penguatan/pengayaan.", "Data awal dan lanjutan dibandingkan; keputusan pembelajaran dan perbaikannya terdokumentasi."]}], "kelompok": {"1": "A. Keberlanjutan Praktik Guru | Responden: guru (diverifikasi kepala sekolah/pengawas)", "4": "B. Perubahan pada Murid | Responden: guru (dengan bukti hasil kerja/catatan), dapat dicek oleh kepala sekolah/pengawas | Bandingkan dengan kondisi murid sebelum guru menerapkan PKGSD MBI", "10": "C. Perubahan pada Budaya Sekolah | Responden: kepala sekolah/pengawas"}, "label": "LEVEL 4 — RESULTS: Perubahan pada Guru, Murid, dan Budaya Sekolah", "deskripsi": "Bukti perubahan pada praktik guru, murid, dan budaya sekolah. Skor 3–4 wajib disertai bukti."}}
        PKGSD_JSON, true);

        $levelConfig = [
            1 => [
                'label' => 'Level 1 - Reaction',
                'deskripsi' => 'Respons peserta terhadap program dan pelaksanaan pelatihan.',
                'jumlah' => 29,
                'badge' => 'background:#dbeafe;color:#1d4ed8',
                'bar' => '#2563eb',
                'row' => '#eff4ff',
            ],
            2 => [
                'label' => 'Level 2 - Learning',
                'deskripsi' => 'Pengetahuan dan keterampilan yang dipelajari guru.',
                'jumlah' => 10,
                'badge' => 'background:#ede9fe;color:#6d28d9',
                'bar' => '#7c3aed',
                'row' => '#f5f1ff',
            ],
            3 => [
                'label' => 'Level 3 - Behavior',
                'deskripsi' => 'Penerapan hasil pelatihan di kelas (observasi pembelajaran).',
                'jumlah' => 22,
                'badge' => 'background:#d1fae5;color:#047857',
                'bar' => '#059669',
                'row' => '#eefaf4',
            ],
            4 => [
                'label' => 'Level 4 - Results',
                'deskripsi' => 'Perubahan pada guru, murid, dan budaya sekolah.',
                'jumlah' => 12,
                'badge' => 'background:#fef3c7;color:#b45309',
                'bar' => '#d99a0b',
                'row' => '#fffaea',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Level yang berlaku berdasarkan jabatan pemonev
        |--------------------------------------------------------------------------
        */

        $jabatan = $pkgsdMbi->jabatan_penilai ?? '';
        $levelAktif = $jabatan === 'Peserta PKGSD MBI' ? [1, 2, 3, 4] : [3, 4];

        $jawabanLevel = [
            1 => $pkgsdMbi->level_1_jawaban ?? [],
            2 => $pkgsdMbi->level_2_jawaban ?? [],
            3 => $pkgsdMbi->level_3_jawaban ?? [],
            4 => $pkgsdMbi->level_4_jawaban ?? [],
        ];

        $kategoriDari = function ($rata) {
            return match (true) {
                $rata === null => 'Belum ada skor',
                $rata >= 3.50 => 'Sangat Baik',
                $rata >= 2.75 => 'Baik',
                $rata >= 2.00 => 'Cukup',
                default => 'Perlu pendampingan intensif',
            };
        };

        $kategoriStyle = function ($kategori) {
            return match ($kategori) {
                'Sangat Baik' => 'background:#d1fae5;color:#047857',
                'Baik' => 'background:#dbeafe;color:#1d4ed8',
                'Cukup' => 'background:#fef3c7;color:#b45309',
                'Belum ada skor' => 'background:#f1f5f9;color:#475569',
                default => 'background:#ffe4e6;color:#be123c',
            };
        };

        /*
        |--------------------------------------------------------------------------
        | Penyamaan teks indikator dengan file cetak
        |--------------------------------------------------------------------------
        | - Kurung siku [ ] menjadi kurung biasa ( )
        | - Huruf pertama indikator menjadi kapital
        | - "bahasa inggris" menjadi "bahasa Inggris"
        */

        $samakanTeksIndikator = function (string $teks): string {
            $teks = strtr($teks, [
                '[' => '(',
                ']' => ')',
                'bahasa inggris' => 'bahasa Inggris',
            ]);

            return ucfirst($teks);
        };

        /*
        |--------------------------------------------------------------------------
        | Rekap per level dan keseluruhan
        |--------------------------------------------------------------------------
        */

        $rekap = [];
        $totalSemua = 0;
        $terisiSemua = 0;
        $jumlahIndikatorBerlaku = 0;

        foreach ($levelAktif as $level) {
            $total = 0;
            $terisi = 0;
            $jumlahTD = 0;

            foreach ((array) $jawabanLevel[$level] as $item) {
                $skor = is_array($item) ? ($item['skor'] ?? null) : $item;

                if ($skor === null || $skor === '') {
                    continue;
                }

                if (strtoupper((string) $skor) === 'TD') {
                    $jumlahTD++;
                    continue;
                }

                if (is_numeric($skor) && (int) $skor >= 1 && (int) $skor <= 4) {
                    $total += (int) $skor;
                    $terisi++;
                }
            }

            $rata = $terisi > 0 ? $total / $terisi : null;

            $rekap[$level] = [
                'total' => $total,
                'terisi' => $terisi,
                'td' => $jumlahTD,
                'rata' => $rata,
                'persen' => $rata !== null ? ($rata / 4) * 100 : 0,
                'kategori' => $kategoriDari($rata),
            ];

            $totalSemua += $total;
            $terisiSemua += $terisi;
            $jumlahIndikatorBerlaku += $levelConfig[$level]['jumlah'];
        }

        $rataSemua = $terisiSemua > 0 ? $totalSemua / $terisiSemua : null;
        $kategoriSemua = $kategoriDari($rataSemua);

        $adaMetadataObservasi = filled($pkgsdMbi->tanggal_observasi ?? null)
            || filled($pkgsdMbi->durasi_pembelajaran ?? null)
            || filled($pkgsdMbi->jumlah_murid_hadir ?? null)
            || filled($pkgsdMbi->observasi_ke ?? null);
    @endphp

    <style>
        /* ===================== TOKEN WARNA (sama dengan Data Sekolah) ===================== */
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

        .d-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
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

        .d-pill {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 9px;
            background: var(--p-50);
            color: var(--p-700);
            font-size: 11.5px;
            font-weight: 600;
            white-space: nowrap;
        }

        /* --- judul halaman --- */
        .d-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        @media (max-width: 1023px) {
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
        .d-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

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

        .b-violet {
            --b-bg: linear-gradient(160deg, #f2edff 0%, #e0d6ff 100%);
            --b-line: #d6caf9;
            --b-ink: #6d28d9;
            --b-glow: rgba(124, 58, 237, .7);
        }

        .b-amber {
            --b-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%);
            --b-line: #f6dd9b;
            --b-ink: #b45309;
            --b-glow: rgba(217, 154, 11, .7);
        }

        /* --- tile ringkasan --- */
        .d-tiles {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        @media (max-width: 767px) {
            .d-tiles {
                grid-template-columns: 1fr;
            }
        }

        .d-tile {
            position: relative;
            text-align: center;
            padding: 22px 16px 18px;
            overflow: hidden;
            background: var(--t-bg, var(--p-50));
            border: 1px solid var(--t-line, #dfe8fb);
            border-radius: 18px;
            transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s cubic-bezier(.22, 1, .36, 1);
        }

        .d-tile:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 30px -20px var(--t-glow, rgba(37, 99, 235, .6));
        }

        .d-tile-clip {
            position: absolute;
            left: 12px;
            top: 12px;
            color: var(--t-clip, #a9bde6);
        }

        .d-tile-dot {
            position: absolute;
            right: 14px;
            top: 14px;
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            background: var(--p-600);
            z-index: 1;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .65);
        }

        .d-tile-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            margin: 0 auto 10px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 18px -10px var(--t-glow, rgba(37, 99, 235, .55));
        }

        .d-tile-label {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink);
        }

        .d-tile-val {
            margin-top: 4px;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--ink);
        }

        .d-tile-val small {
            font-size: 15px;
            font-weight: 600;
            color: #7f8cab;
        }

        .d-tile-note {
            margin-top: 6px;
            font-size: 11.5px;
            color: #55637f;
        }

        .t-blue {
            --t-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%);
            --t-line: #c6d8fb;
            --t-glow: rgba(37, 99, 235, .55);
            --t-clip: #8fa9e6;
        }

        .t-mint {
            --t-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%);
            --t-line: #bfe8d4;
            --t-glow: rgba(5, 150, 105, .5);
            --t-clip: #86c9ae;
        }

        .t-amber {
            --t-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%);
            --t-line: #f6dd9b;
            --t-glow: rgba(217, 154, 11, .5);
            --t-clip: #d3b568;
        }

        .d-tile::before,
        .d-tile::after {
            content: '';
            position: absolute;
            z-index: 0;
            border-radius: 9999px;
            pointer-events: none;
        }

        .d-tile::before {
            right: -30px;
            bottom: -42px;
            width: 124px;
            height: 124px;
            background: rgba(255, 255, 255, .38);
        }

        .d-tile::after {
            left: -26px;
            bottom: -46px;
            width: 92px;
            height: 92px;
            background: rgba(255, 255, 255, .24);
        }

        .d-tile>p,
        .d-tile>div,
        .d-tile>.d-tile-ico {
            position: relative;
            z-index: 1;
        }

        /* --- notifikasi sukses --- */
        .d-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 16px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.7;
        }

        /* --- grid info identitas --- */
        .d-info {
            display: grid;
            gap: 18px 32px;
            padding: 6px 20px 22px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {

            .d-info.c2,
            .d-info.c3,
            .d-info.c4 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
            .d-info.c3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .d-info.c4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        .d-info-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
        }

        .d-info-val {
            margin-top: 4px;
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink);
            line-height: 1.5;
        }

        .d-info-span2 {
            grid-column: span 1;
        }

        @media (min-width: 1024px) {
            .d-info.c3 .d-info-span2 {
                grid-column: span 2;
            }
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

        .d-badge.lg {
            padding: 7px 16px;
            border-radius: 10px;
            font-size: 14px;
            white-space: normal;
        }

        /* --- rekap level --- */
        .d-levels {
            display: grid;
            gap: 16px;
            padding: 6px 20px 22px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-levels {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1280px) {
            .d-levels.four {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        .d-level {
            display: flex;
            flex-direction: column;
            padding: 16px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #f9fbff;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .d-level:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 24px -18px rgba(37, 99, 235, .5);
        }

        .d-level-desc {
            flex: 1;
            margin-top: 8px;
            min-height: 38px;
            font-size: 12px;
            line-height: 1.6;
            color: var(--muted);
        }

        .d-level-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 10px;
            margin-top: 14px;
        }

        .d-level-score {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--ink);
        }

        .d-level-score small {
            font-size: 12px;
            font-weight: 600;
            color: #7f8cab;
        }

        .d-level-pct {
            font-size: 12px;
            font-weight: 600;
            color: #475569;
        }

        .d-bar {
            height: 8px;
            margin-top: 10px;
            overflow: hidden;
            border-radius: 9999px;
            background: #e6ebf5;
        }

        .d-bar>span {
            display: block;
            height: 100%;
            border-radius: 9999px;
        }

        .d-level-foot {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
            font-size: 11.5px;
            color: var(--muted);
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
            vertical-align: top;
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
        }

        .d-table .q {
            font-size: 13px;
            line-height: 1.7;
            color: #334155;
        }

        .d-table .rubrik {
            margin-top: 6px;
            font-size: 12px;
            line-height: 1.6;
            color: var(--muted);
        }

        .d-table .rubrik b {
            font-weight: 700;
            color: #475569;
        }

        .d-table .note {
            font-size: 12.5px;
            line-height: 1.7;
            color: #475569;
            white-space: pre-line;
        }

        .d-table .faint {
            font-size: 12px;
            color: #94a3b8;
        }

        .d-table td.d-group-cell {
            padding: 11px 16px;
        }

        .d-group-t {
            font-size: 12.5px;
            font-weight: 700;
            color: var(--ink);
        }

        .d-group-n {
            margin-top: 2px;
            font-size: 11.5px;
            font-weight: 500;
            color: #475569;
        }

        .d-td-box {
            padding: 10px 12px;
            border: 1px solid #f6dd9b;
            border-radius: 12px;
            background: #fff9e6;
        }

        .d-td-box b {
            display: block;
            font-size: 11.5px;
            font-weight: 700;
            color: #b45309;
        }

        .d-td-box p {
            margin-top: 4px;
            font-size: 12.5px;
            line-height: 1.6;
            color: #78350f;
            white-space: pre-line;
        }

        .d-score {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 34px;
            padding: 0 6px;
            border-radius: 11px;
            background: var(--p-600);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
        }

        .d-score.td {
            background: #f59e0b;
        }

        /* --- cetak --- */
        @media print {

            body {
                background: white !important;
            }

            aside,
            nav,
            header,
            .no-print {
                display: none !important;
            }

            .d-wrap {
                gap: 16px !important;
            }

            .d-card,
            .d-tile {
                break-inside: avoid;
                box-shadow: none !important;
            }

            .d-tile:hover,
            .d-level:hover {
                transform: none !important;
                box-shadow: none !important;
            }

            .d-table {
                min-width: 0 !important;
                font-size: 10px !important;
            }

            .d-table th,
            .d-table td {
                padding: 6px !important;
            }

            @page {
                size: A4;
                margin: 12mm;
            }
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Hasil Pengisian <b>PKGSD MBI</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('pkgsd-mbi.index') }}">PKGSD MBI</a>
                        &nbsp;›&nbsp; Hasil Pengisian
                    </p>
                    <p class="d-desc">
                        Detail hasil pengisian instrumen monitoring dan evaluasi PKGSD MBI dengan Model Kirkpatrick.
                    </p>
                </div>

                <div class="no-print d-actions">

                    {{-- Kembali --}}
                    <a href="{{ route('instrumen.index') }}" class="d-pbtn b-blue back">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Kembali
                    </a>

                    {{-- Cetak Hasil --}}
                    <a href="{{ route('pkgsd-mbi.cetak', $pkgsdMbi) }}" target="_blank" class="d-pbtn b-mint">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                            <path d="M6 14h12v7H6z" />
                        </svg>
                        Cetak Hasil
                    </a>

                    {{-- Gabung PDF --}}
                    <a href="{{ route('cetak-gabungan.index', ['pilih' => ['pkgsd-' . $pkgsdMbi->id]]) }}"
                        class="d-pbtn b-violet">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 3h7l5 5v9a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2z" />
                            <path d="M16 3v5h5" />
                            <path d="M17 21H6a2 2 0 01-2-2V9" />
                        </svg>
                        Gabung PDF
                    </a>

                    {{-- Edit Data --}}
                    <a href="{{ route('pkgsd-mbi.edit', $pkgsdMbi) }}" class="d-pbtn b-amber">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Data
                    </a>

                </div>
            </div>
        </section>

        {{-- ================= NOTIFIKASI ================= --}}
        @if (session('success'))
            <div class="d-alert">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px">
                    <path d="M5 13l4 4L19 7" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- ================= RINGKASAN HASIL ================= --}}
        <div class="d-tiles">

            {{-- Indikator Dinilai --}}
            <div class="d-tile t-blue">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot"></span>
                <span class="d-tile-ico" style="color:var(--p-600)">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 11l3 3L22 4" />
                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                    </svg>
                </span>
                <p class="d-tile-label">Indikator Dinilai</p>
                <p class="d-tile-val">{{ $terisiSemua }}<small> / {{ $jumlahIndikatorBerlaku }}</small></p>
                <p class="d-tile-note">Total skor {{ $totalSemua }} dari indikator berskor 1-4 sesuai jabatan pemonev</p>
            </div>

            {{-- Rerata Keseluruhan --}}
            <div class="d-tile t-mint">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:#10b981"></span>
                <span class="d-tile-ico" style="color:#059669">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18" />
                        <path d="M7 15l4-4 3 3 5-6" />
                    </svg>
                </span>
                <p class="d-tile-label">Rerata Keseluruhan</p>
                <p class="d-tile-val">
                    {{ $rataSemua !== null ? number_format($rataSemua, 2, ',', '.') : '-' }}<small> / 4</small>
                </p>
                <p class="d-tile-note">TD dan indikator yang belum dinilai tidak dihitung dalam rerata</p>
            </div>

            {{-- Kategori --}}
            <div class="d-tile t-amber">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:var(--accent)"></span>
                <span class="d-tile-ico" style="color:#d99a0b">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg>
                </span>
                <p class="d-tile-label">Kategori</p>
                <div style="margin-top:8px">
                    <span class="d-badge lg" style="{{ $kategoriStyle($kategoriSemua) }}">{{ $kategoriSemua }}</span>
                </div>
                <p class="d-tile-note">Berdasarkan rerata keseluruhan indikator</p>
            </div>

        </div>

        {{-- ================= A. BIODATA ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">A. Biodata</h2>
                    <p class="d-card-s">Informasi guru dan konteks pembelajaran yang dinilai.</p>
                </div>
            </div>

            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Guru</p>
                    <p class="d-info-val">{{ $pkgsdMbi->nama_guru ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Nama Sekolah</p>
                    <p class="d-info-val">{{ $pkgsdMbi->nama_sekolah ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Kelas / Fase</p>
                    <p class="d-info-val">{{ $pkgsdMbi->kelas_fase ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Topik / Materi</p>
                    <p class="d-info-val">{{ $pkgsdMbi->topik_materi ?: '-' }}</p>
                </div>
            </div>
        </section>

        {{-- ================= B. IDENTITAS PEMONEV ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">B. Identitas Pemonev</h2>
                    <p class="d-card-s">Identitas petugas, jabatan, dan tanggal monitoring.</p>
                </div>
            </div>

            <div class="d-info c3">
                <div>
                    <p class="d-info-label">Nama Petugas Monev</p>
                    <p class="d-info-val">{{ $pkgsdMbi->nama_petugas_monev ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Jabatan Pemonev</p>
                    <p class="d-info-val">{{ $jabatan ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Tanggal Monev</p>
                    <p class="d-info-val">{{ $pkgsdMbi->tanggal_monev?->format('d/m/Y') ?? '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Status Pengisian</p>
                    <div style="margin-top:6px">
                        <span class="d-badge" style="background:#d1fae5;color:#047857">
                            {{ $pkgsdMbi->status ?: '-' }}
                        </span>
                    </div>
                </div>

                <div class="d-info-span2">
                    <p class="d-info-label">Sumber Data / Bukti</p>
                    <p class="d-info-val" style="white-space:pre-line">{{ $pkgsdMbi->sumber_data_bukti ?: '-' }}</p>
                </div>
            </div>
        </section>

        {{-- ================= C. METADATA OBSERVASI ================= --}}
        @if ($adaMetadataObservasi)
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">C. Metadata Observasi (Level 3)</h2>
                        <p class="d-card-s">Informasi pelaksanaan observasi pembelajaran.</p>
                    </div>
                </div>

                <div class="d-info c4">
                    <div>
                        <p class="d-info-label">Tanggal Observasi</p>
                        <p class="d-info-val">
                            {{ filled($pkgsdMbi->tanggal_observasi ?? null)
                ? \Illuminate\Support\Carbon::parse($pkgsdMbi->tanggal_observasi)->format('d/m/Y')
                : '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="d-info-label">Durasi Pembelajaran</p>
                        <p class="d-info-val">{{ $pkgsdMbi->durasi_pembelajaran ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="d-info-label">Jumlah Murid Hadir</p>
                        <p class="d-info-val">{{ $pkgsdMbi->jumlah_murid_hadir ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="d-info-label">Observasi Ke-</p>
                        <p class="d-info-val">{{ $pkgsdMbi->observasi_ke ?: '-' }}</p>
                    </div>
                </div>
            </section>
        @endif

        {{-- ================= REKAP PER LEVEL ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">Rekapitulasi Berdasarkan Level</h2>
                    <p class="d-card-s">Ringkasan skor untuk level evaluasi yang berlaku bagi pemonev.</p>
                </div>

                <span class="d-pill">{{ count($levelAktif) }} level</span>
            </div>

            <div class="d-levels {{ count($levelAktif) === 4 ? 'four' : '' }}">
                @foreach ($levelAktif as $level)
                    @php
                        $config = $levelConfig[$level];
                        $r = $rekap[$level];
                    @endphp

                    <div class="d-level">
                        <div>
                            <span class="d-badge" style="{{ $config['badge'] }}">{{ $config['label'] }}</span>
                        </div>

                        <p class="d-level-desc">{{ $config['deskripsi'] }}</p>

                        <div class="d-level-row">
                            <div class="d-level-score">
                                {{ $r['rata'] !== null ? number_format($r['rata'], 2, ',', '.') : '-' }}<small> / 4</small>
                            </div>

                            <span class="d-level-pct">{{ $r['terisi'] }} / {{ $config['jumlah'] }} butir</span>
                        </div>

                        <div class="d-bar">
                            <span style="width: {{ min($r['persen'], 100) }}%;background: {{ $config['bar'] }}"></span>
                        </div>

                        <div class="d-level-foot">
                            <span class="d-badge" style="{{ $kategoriStyle($r['kategori']) }}">{{ $r['kategori'] }}</span>

                            @if ($level === 3 && $r['td'] > 0)
                                <span>TD: {{ $r['td'] }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ================= DETAIL INDIKATOR PER LEVEL ================= --}}
        @foreach ($levelAktif as $level)
            @php
                $config = $levelConfig[$level];
                $dataLevel = $instrumen[$level] ?? [];
                $indikatorList = collect($dataLevel['indikator'] ?? [])->keyBy('no');
                $kelompok = $dataLevel['kelompok'] ?? [];
                $jawaban = (array) $jawabanLevel[$level];
                $punyaBukti = in_array($level, [3, 4], true);
                $jumlahKolom = $punyaBukti ? 4 : 3;
            @endphp

            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Detail Penilaian {{ $config['label'] }}</h2>
                        <p class="d-card-s">
                            {{ $config['jumlah'] }} indikator: skor{{ $punyaBukti ? ', bukti, dan catatan' : '' }}
                            setiap indikator.
                        </p>
                    </div>

                    <span class="d-pill">{{ $rekap[$level]['terisi'] }} dari {{ $config['jumlah'] }} terisi</span>
                </div>

                <div style="overflow-x:auto">
                    <table class="d-table" style="min-width: {{ $punyaBukti ? '900px' : '700px' }}">
                        <thead>
                            <tr>
                                <th style="width:70px">No</th>
                                <th>Indikator</th>
                                @if ($punyaBukti)
                                    <th>Bukti / Catatan</th>
                                @endif
                                <th class="center" style="width:110px">Skor</th>
                            </tr>
                        </thead>

                        <tbody>
                            @for ($nomor = 1; $nomor <= $config['jumlah']; $nomor++)
                                @php
                                    $item = $jawaban[$nomor] ?? [];
                                    $item = is_array($item) ? $item : ['skor' => $item];

                                    $skor = $item['skor'] ?? null;
                                    $skorAda = $skor !== null && $skor !== '';
                                    $isTD = $skorAda && strtoupper((string) $skor) === 'TD';

                                    $bukti = $item['bukti'] ?? '';
                                    $alasanTd = $item['alasan_td'] ?? '';

                                    $indikator = $indikatorList->get($nomor);
                                    $teksIndikator = $samakanTeksIndikator(
                                        $indikator['indikator'] ?? 'Indikator ' . $nomor
                                    );

                                    $deskripsiSkor = null;
                                    if ($indikator && $skorAda && !$isTD && is_numeric($skor)) {
                                        $deskripsiSkor = $indikator['rubrik'][(int) $skor - 1] ?? null;
                                    }

                                    $headerKelompok = $kelompok[$nomor] ?? ($kelompok[(string) $nomor] ?? null);
                                    $bagianKelompok = $headerKelompok ? explode(' | ', $headerKelompok) : [];
                                @endphp

                                @if ($headerKelompok)
                                    <tr>
                                        <td colspan="{{ $jumlahKolom }}" class="d-group-cell"
                                            style="background: {{ $config['row'] }}">
                                            <p class="d-group-t">{{ $bagianKelompok[0] }}</p>
                                            @foreach (array_slice($bagianKelompok, 1) as $catatanKelompok)
                                                <p class="d-group-n">{{ $catatanKelompok }}</p>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif

                                <tr class="d-data">
                                    <td class="txt">{{ $nomor }}</td>

                                    <td class="q">
                                        {{ $teksIndikator }}

                                        @if ($deskripsiSkor)
                                            <p class="rubrik">
                                                <b>Skor {{ $skor }}:</b>
                                                {{ $deskripsiSkor }}
                                            </p>
                                        @endif
                                    </td>

                                    @if ($punyaBukti)
                                        <td>
                                            @if (filled($bukti))
                                                <p class="note">{{ $bukti }}</p>
                                            @endif

                                            @if ($level === 3 && $isTD)
                                                <div class="d-td-box" @if (filled($bukti)) style="margin-top:8px" @endif>
                                                    <b>Alasan TD</b>
                                                    <p>{{ filled($alasanTd) ? $alasanTd : '-' }}</p>
                                                </div>
                                            @endif

                                            @if (!filled($bukti) && !($level === 3 && $isTD))
                                                <span class="faint">-</span>
                                            @endif
                                        </td>
                                    @endif

                                    <td style="text-align:center">
                                        @if ($skorAda)
                                            <span class="d-score {{ $isTD ? 'td' : '' }}">
                                                {{ strtoupper((string) $skor) }}
                                            </span>
                                        @else
                                            <span class="faint">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </section>
        @endforeach

    </div>

@endsection