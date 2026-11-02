@extends('layouts.app')

@section('title', 'Edit Pengisian PKGSD MBI')
@section('page-title', 'Edit Pengisian PKGSD MBI')

@section('content')

    @php
        // Data instrumen diambil dari file INSTRUMEN_MONITORING_DAN_EVALUASI.docx
        $levelData = json_decode(<<<'PKGSD_JSON'
                {"1": {"indikator": [{"no": 1, "indikator": "Kesesuaian tujuan, struktur, dan materi pelatihan dengan kebutuhan guru SD dalam mengajar Bahasa Inggris.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 2, "indikator": "Kesesuain bahan ajar dengan struktur program", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 3, "indikator": "Kesesuaian alokasi materi dengan bobot materi", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 4, "indikator": "Materi mendukung pengajaran Bahasa Inggris sesuai fase/kelas, kebutuhan murid, dan konteks sekolah", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 5, "indikator": "Manfaat materi pelatihan dalam meningkatkan kompetensi peserta", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 6, "indikator": "Kesiapan dan ketersediaan sarana kegiatan [audio visual, LCD/laptop, papan putih, pelantang, spidol, penghapus].", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 7, "indikator": "Kenyamanan ruang kegiatan [ventilasi udara/AC, pencahayaan].", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 8, "indikator": "Kebersihan ruang kelas.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 9, "indikator": "Ketersediaan sarana ibadah.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 10, "indikator": "Ketersediaan akses internet", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 11, "indikator": "Fasilitator memfasilitasi dan mendampingi proses pembelajaran peserta.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 12, "indikator": "Fasilitator menggunakan bahasa yang menghargai dan menghormati di dalam berkomunikasi dengan peserta.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 13, "indikator": "Fasilitator memulai dan mengakhiri pembelajaran tepat waktu.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 14, "indikator": "Fasilitator mampu menyampaikan materi dengan jelas dan tepat, sehingga peserta dapat memahami pembelajaran dengan baik.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 15, "indikator": "Kemudahan dalam mengakses LMS Pembelajaran", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 16, "indikator": "Kemudahan dalam membaca materi/video yang ada di LMS", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 17, "indikator": "Kemudahan dalam mengikuti alur LMS", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 18, "indikator": "Kemudahan dalam pembelajaran di LMS", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 19, "indikator": "Kemudahan dalam berdiskusi di LMS", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 20, "indikator": "Kemudahan dalam mengumpulkan tugas di LMS", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 21, "indikator": "Kelengkapan dokumen/kit bahan kegiatan [materi, LMS, ATK]", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 22, "indikator": "Kualitas tampilan bahan tayang kegiatan.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 23, "indikator": "Kemudahan penggunaan bahan tayang, modul, dan sumber belajar", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 24, "indikator": "Ketersediaan ilustrasi dan contoh pada bahan pembelajaran kegiatan.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 25, "indikator": "Kesesuaian alokasi waktu pelaksanaan kegiatan dengan tujuan dan sasaran program kegiatan.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 26, "indikator": "Ketepatan alokasi waktu untuk menyelesaikan setiap tagihan pembelajaran.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 27, "indikator": "Kecukupan menu yang mendukung pemenuhan gizi.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 28, "indikator": "Variasi hidangan/konsumsi.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}, {"no": 29, "indikator": "Ketepatan waktu penyediaan konsumsi.", "rubrik": ["Kurang", "Cukup", "Baik", "Sangat Baik"]}], "kelompok": {"1": "Program dan Materi", "6": "Sarana dan Prasarana Penunjang Kegiatan", "11": "Fasilitator", "15": "Akses LMS", "21": "Bahan Kegiatan", "25": "Jangka Waktu Pelaksanaan Kegiatan", "27": "Layanan Menu"}, "label": "LEVEL 1 – REACTION", "deskripsi": "Nilai respons terhadap program dan pelaksanaan pelatihan. Skor 1–4."}, "2": {"indikator": [{"no": 1, "indikator": "Pemahaman capaian dan tujuan pembelajaran Bahasa Inggris", "rubrik": ["Belum dapat menjelaskan tujuan/capaian pembelajaran yang relevan.", "Menjelaskan secara umum, tetapi tujuan belum spesifik atau belum sesuai kelas/fase.", "Menetapkan tujuan yang relevan dengan kelas/fase dan keterampilan berbahasa yang dituju.", "Tujuan spesifik, terukur, sesuai kebutuhan murid, serta mengintegrasikan konteks yang dekat dengan kehidupan mereka."]}, {"no": 2, "indikator": "Pengembangan keterampilan menyimak (listening)", "rubrik": ["Tidak mampu memilih/merancang aktivitas menyimak yang sesuai.", "Aktivitas menyimak ada tetapi instruksi, sumber audio, atau tindak lanjut kurang jelas.", "Merancang aktivitas menyimak dengan instruksi, sumber yang sesuai, dan tugas pemahaman.", "Menggunakan tahapan pra-menyimak, saat menyimak, dan pasca-menyimak serta strategi untuk tingkat kemampuan berbeda."]}, {"no": 3, "indikator": "Pengembangan keterampilan berbicara (speaking)", "rubrik": ["Tidak merancang kesempatan murid berbicara.", "Kesempatan berbicara terbatas pada pengulangan bersama atau jawaban satu kata.", "Menyediakan praktik berpasangan/kelompok dengan ungkapan dan konteks yang sesuai.", "Menyediakan interaksi bermakna, pemodelan, dukungan ungkapan, serta kesempatan berbicara yang merata dan bertahap."]}, {"no": 4, "indikator": "Pengembangan keterampilan membaca (reading)", "rubrik": ["Aktivitas tidak sesuai kemampuan baca atau tujuan.", "Aktivitas didominasi membaca/menyalin tanpa strategi pemahaman yang jelas.", "Memilih teks sesuai tingkat murid dan menyertakan pertanyaan pemahaman.", "Menggunakan strategi sebelum, selama, dan setelah membaca serta dukungan kosakata dan pemahaman."]}, {"no": 5, "indikator": "Pengembangan keterampilan menulis (writing)", "rubrik": ["Tidak menunjukkan tahapan atau contoh penulisan.", "Tugas menulis diberikan tanpa contoh atau bantuan yang memadai.", "Memberi model, kosakata/kerangka, dan kesempatan menulis sesuai tingkat murid.", "Merancang tahapan dari model ke tulisan mandiri, dengan umpan balik dan revisi sederhana."]}, {"no": 6, "indikator": "Media dan sumber belajar", "rubrik": ["Merancang media yang tidak sesuai tujuan/tidak menggunakan media", "Merancang media yang tidak mendukung aktivitas inti", "Merancang media/audio/gambar/kartu/objek mendukung pemahaman dan praktik berbahasa.", "Memilih atau membuat media yang tepat, inklusif, mudah diakses, dan mengaktifkan murid."]}, {"no": 7, "indikator": "Pemahaman terkait prinsip pembelajaran Bahasa Inggris yang sesuai untuk siswa SD.", "rubrik": ["Tidak mampu menjelaskan/menggambarkan prinsip pembelajaran bahasa inggris yang sesuai untuk siswa SD", "Menjelaskan prinsip pembelajaran bahasa inggris namun tidak sesuai dengan siswa SD", "Mampu menjelaskan prinsip pembelajaran bahasa inggris yang sesuai dengan siswa SD", "Mampu menjelaskan prinsip pembelajaran bahasa inggris yang sesuai dengan siswa SD secara spesifik."]}, {"no": 8, "indikator": "Penggunaan ungkapan Bahasa Inggris sederhana dalam kegiatan wawancara", "rubrik": ["Belum mampu menggunakan ungkapan bahasa inggris sederhana ketika wawancara", "Menggunakan Bahasa Inggris secara terbatas tanpa dukungan pemahaman yang konsisten.", "Menggunakan ungkapan bahasa inggris sederhana, model pelafalan, gerak, visual, dan/atau terjemahan seperlunya.", "Bahasa inggris konsisten, jelas, bertahap, disertai visual/gestur."]}, {"no": 9, "indikator": "Penyusunan modul ajar atau rencana pembelajaran Bahasa Inggris.", "rubrik": ["Tidak menyusun modul ajar atau rencana pembelajaran bahasa inggris", "Menyusun modul ajar atau rencana pembelajaran bahasa inggris namun tidak runut", "Menyusun modul ajar atau rencana pembelajaran bahasa inggris namun belum terlihat media dan kegiatan yang menunjang peningkatan kemampuan bahasa inggris siswa", "Modul ajar atau rencana pembelajaran bahasa inggris yang disusun sudah lengkap dan dapat menunjang peningkatan kemampuan bahasa inggris siswa."]}, {"no": 10, "indikator": "merancang aktivitas interaktif, seperti permainan bahasa, lagu, dialog, dan bermain peran.", "rubrik": ["Tidak mampu merancang aktivitas interaktif seperti permainan bahasa, lagu, dialog, dan bermain peran.", "Mampu merancang aktivitas interaktif namun tidak sesuai dengan tujuan pembelajaran", "Mampu merancang aktifitas interaktif yang sesuai dengan tujuan namun masih monoton", "Mampu merancang aktivitas interaktif yang beragam dan sesuai dengan tujuan pembelajaran"]}], "kelompok": {}, "label": "LEVEL 2 — LEARNING: Pengetahuan dan Keterampilan yang Dipelajari", "deskripsi": "Penilai melakukan wawancara dengan guru setelah pelatihan, lalu menilai setiap indikator dengan rubrik 1–4."}, "3": {"indikator": [{"no": 1, "indikator": "Guru menyampaikan tujuan dan alur pembelajaran", "rubrik": ["Tujuan disampaikan/diarahkan dan kegiatan tidak terkait dengan tujuan.", "Tujuan atau alur ada tetapi tidak jelas bagi murid.", "Kegiatan runtut dan mengarah pada tujuan Bahasa Inggris.", "Tujuan, kegiatan, dan penutup saling terhubung; guru mengecek pencapaian tujuan."]}, {"no": 2, "indikator": "Guru menggunakan konteks nyata yang dekat dengan kehidupan murid.", "rubrik": ["Pembelajaran hanya memakai angka dan simbol tanpa konteks.", "Konteks digunakan, tetapi tidak dikenal murid atau tidak diperlukan untuk memahami soal.", "Konteks dikenal murid dan digunakan dalam kegiatan inti.", "Konteks dekat dengan kehidupan murid, digunakan sepanjang pembelajaran, dan murid menyebutkan contoh dari pengalaman mereka sendiri."]}, {"no": 3, "indikator": "Guru mengajukan pertanyaan pemantik yang mendorong murid berpikir.", "rubrik": ["Guru tidak mengajukan pertanyaan yang mendorong murid berpikir.", "Hampir semua pertanyaan guru bersifat tertutup (jawaban singkat benar/salah).", "Guru mengajukan beberapa pertanyaan terbuka, tetapi sebagian besar pertanyaan lainnya tertutup.", "Sebagian besar pertanyaan guru terbuka, dan murid memberi jawaban lebih dari satu kata atau menyertakan alasan."]}, {"no": 4, "indikator": "Guru membangun rasa ingin tahu murid.", "rubrik": ["Tidak ada murid yang bertanya, menebak, atau mencoba atas inisiatif sendiri; murid menunggu instruksi.", "Kurang dari separuh murid bertanya, menebak, atau mencoba atas inisiatif sendiri.", "Separuh hingga tiga perempat murid bertanya, menebak, atau mencoba atas inisiatif sendiri.", "Hampir semua murid (lebih dari tiga perempat) bertanya, menebak, atau mencoba atas inisiatif sendiri tanpa harus diminta berulang kali."]}, {"no": 5, "indikator": "Guru membangun konsep secara bertahap dari pengalaman konkret.", "rubrik": ["Guru langsung memberikan rumus, aturan, atau cara penyelesaian, lalu murid berlatih.", "Guru menjelaskan konsep tahap demi tahap, tetapi tanpa benda atau gambar sehingga urutannya melompat ke simbol.", "Guru menyajikan konsep dari benda atau pengalaman konkret ke simbol dengan urutan runtut, tetapi murid lebih banyak menerima penjelasan.", "Murid membangun konsep melalui pengalaman konkret, gambar/representasi, lalu simbol, dan hubungan antartahap diungkapkan murid atau dimunculkan lewat pertanyaan guru."]}, {"no": 6, "indikator": "Guru menghubungkan konsep baru dengan konsep atau pengalaman sebelumnya.", "rubrik": ["Guru tidak menghubungkan konsep dengan pembelajaran atau pengalaman sebelumnya.", "Guru menyebut keterkaitan sekilas (misalnya “kemarin kita sudah belajar”) tanpa memakainya dalam kegiatan.", "Guru menghubungkan konsep baru dengan satu konsep atau pengalaman sebelumnya secara spesifik dan memakainya dalam kegiatan.", "Guru dan murid menghubungkan konsep baru dengan beberapa konsep atau konteks lain, dan murid dapat menyebutkan keterkaitannya."]}, {"no": 7, "indikator": "Guru menggunakan media atau alat bantu untuk membantu murid memahami konsep.", "rubrik": ["Tidak ada media atau alat bantu.", "Media ada, tetapi hanya dipakai guru sebagai peraga atau tidak berkaitan dengan konsep.", "Media dipakai murid dan membantu mereka mengerjakan tugas.", "Murid memanipulasi media sendiri, dan media membantu mereka menjelaskan atau menemukan konsep."]}, {"no": 8, "indikator": "Guru menyisipkan penggunaan bahasa inggris sederhana.", "rubrik": ["Guru hampir tidak menggunakan Bahasa Inggris saat konteks memungkinkan.", "Ungkapan Bahasa Inggris digunakan sesekali, tetapi tidak konsisten atau sulit dipahami murid.", "Guru menggunakan ungkapan kelas sederhana dengan pelafalan dan dukungan yang sesuai.", "Guru menggunakan Bahasa Inggris secara konsisten dan bertahap, memanfaatkan gestur/visual serta mengecek pemahaman."]}, {"no": 9, "indikator": "Pemodelan bahasa dan pelafalan", "rubrik": ["Tidak memberi model sebelum murid diminta melakukan tugas.", "Model diberikan terbatas atau tidak jelas.", "Guru memberi contoh kosakata, ungkapan, pelafalan, atau struktur yang dibutuhkan.", "Guru memberi model jelas, memecah contoh bila perlu, lalu memberi kesempatan murid menirukan dan menggunakan secara mandiri."]}, {"no": 10, "indikator": "Siswa terlibat aktif dalam kegiatan menyimak (listening)", "rubrik": ["Tidak ada aktivitas menyimak yang relevan.", "Aktivitas menyimak singkat tanpa tujuan atau tindak lanjut jelas.", "Murid menyimak instruksi, cerita, dialog, atau audio dan menunjukkan pemahaman.", "Aktivitas menyimak bertahap; guru mengulang/menyesuaikan dukungan dan memeriksa pemahaman beragam murid."]}, {"no": 11, "indikator": "Siswa terlibat aktif dalam kegiatan berbicara (speaking)", "rubrik": ["Murid tidak diberi kesempatan berbicara selain menirukan serentak.", "Hanya sebagian kecil murid berbicara atau respons didominasi murid tertentu.", "Murid berlatih berbicara melalui tanya jawab, pasangan, permainan peran, atau kelompok.", "Lebih dari tiga perempat murid memperoleh kesempatan berbicara bermakna dan guru memantau pemerataan partisipasi."]}, {"no": 12, "indikator": "Siswa terlibat aktif dalam kegiatan membaca (reading)", "rubrik": ["Tidak ada kegiatan membaca yang sesuai tujuan.", "Membaca terbatas pada menirukan bunyi tanpa memeriksa pemahaman.", "Murid membaca kata/kalimat/teks sesuai tingkat dan menjawab pertanyaan pemahaman.", "Guru membimbing strategi membaca dan memberi dukungan kosakata serta tindak lanjut berdasarkan respons murid."]}, {"no": 13, "indikator": "Siswa diberikan kesempatan untuk menulis (writing)", "rubrik": ["Tidak ada kesempatan menulis sesuai tujuan.", "Murid menyalin tanpa memahami fungsi atau produk yang diharapkan.", "Murid menulis kata/kalimat/teks pendek sesuai tingkat dengan contoh atau kerangka.", "Murid menyusun tulisan bertahap, memperoleh umpan balik, dan memperbaiki hasil sesuai kemampuan."]}, {"no": 14, "indikator": "Aktivitas murid sesuai dengan tujuan pembelajaran.", "rubrik": ["Aktivitas yang dilakukan murid tidak mengarah pada tujuan pembelajaran.", "Sebagian aktivitas mengarah pada tujuan, tetapi aktivitas inti melenceng.", "Seluruh aktivitas mengarah pada tujuan pembelajaran.", "Seluruh aktivitas mengarah pada tujuan pembelajaran, dan guru memeriksa (melalui pertanyaan atau hasil kerja) apakah tujuan tercapai."]}, {"no": 15, "indikator": "Suasana belajar terasa menggembirakan bagi murid (tampak dari ekspresi dan perilaku murid).", "rubrik": ["Sebagian besar murid tampak pasif, tegang, atau tidak tertarik (misalnya diam, menunduk, atau melamun).", "Beberapa murid tampak senang pada bagian tertentu (permainan atau lagu), tetapi kembali pasif saat mengerjakan konsep.", "Sebagian besar murid tampak senang dan bersemangat (tersenyum, tertawa, atau bersuara antusias) selama sebagian besar kegiatan.", "Hampir semua murid tampak senang dan bersemangat sepanjang pembelajaran, termasuk saat mengerjakan tugas matematika (bukan hanya saat selingan)."]}, {"no": 16, "indikator": "Guru memberi ruang bagi beragam jawaban dan cara penyelesaian murid.", "rubrik": ["Guru mengabaikan jawaban murid atau langsung menyalahkannya.", "Guru hanya menerima satu jawaban atau satu cara yang dianggap benar.", "Guru menerima dan menanggapi beberapa jawaban atau cara yang berbeda.", "Guru mengundang jawaban dan cara yang berbeda, menampilkan beberapa di antaranya, dan membandingkannya bersama murid."]}, {"no": 17, "indikator": "Guru mengajukan pertanyaan lanjutan (probing) untuk menggali cara berpikir murid.", "rubrik": ["Guru tidak mengajukan pertanyaan lanjutan setelah murid menjawab.", "Guru mengajukan pertanyaan lanjutan 1–2 kali selama pembelajaran.", "Guru mengajukan pertanyaan lanjutan 3–4 kali, kepada murid yang berbeda.", "Guru mengajukan pertanyaan lanjutan 5 kali atau lebih, bertingkat (cara, alasan, lalu pengembangan), kepada murid yang berbeda-beda."]}, {"no": 18, "indikator": "Guru menanggapi jawaban murid secara membangun.", "rubrik": ["Guru langsung mengoreksi atau memberi jawaban benar ketika murid keliru.", "Guru memberi tanggapan umum (pujian atau “salah”) tanpa membimbing murid.", "Guru membimbing murid memperbaiki jawabannya dengan pertanyaan penuntun.", "Guru membimbing murid memperbaiki jawabannya dan memanfaatkan jawaban keliru sebagai bahan belajar bagi seluruh kelas."]}, {"no": 19, "indikator": "Guru mengakomodasi perbedaan kemampuan dan kebutuhan murid (diferensiasi).", "rubrik": ["Seluruh murid mengerjakan tugas yang sama dengan bantuan yang sama.", "Guru membantu murid tertentu hanya jika murid meminta.", "Guru secara sengaja memberi bantuan atau tantangan berbeda kepada satu kelompok murid (yang perlu bantuan atau yang cepat selesai).", "Guru secara sengaja menyesuaikan tugas, media, atau bantuan bagi murid yang perlu bantuan maupun yang perlu tantangan."]}, {"no": 20, "indikator": "Murid melakukan refleksi pembelajaran.", "rubrik": ["Tidak ada kegiatan refleksi.", "Hanya guru yang merangkum atau menilai pembelajaran.", "Kurang dari separuh murid menyampaikan apa yang dipelajari atau dirasakan.", "Sebagian besar murid menyampaikan (lisan, tulisan, atau gambar) apa yang dipelajari, bagaimana caranya, dan perasaannya."]}, {"no": 21, "indikator": "Guru mengapresiasi proses belajar murid, bukan hanya hasil.", "rubrik": ["Tidak ada apresiasi.", "Apresiasi bersifat umum (misalnya “bagus”) atau hanya untuk jawaban yang benar.", "Guru mengapresiasi usaha atau cara berpikir murid secara spesifik kepada beberapa murid.", "Guru mengapresiasi usaha dan cara berpikir murid secara spesifik kepada sedikitnya lima murid yang berbeda, termasuk murid yang belum berhasil."]}, {"no": 22, "indikator": "Guru menutup pembelajaran dengan menyimpulkan bersama murid.", "rubrik": ["Pembelajaran berakhir tanpa penutup (misalnya waktu habis).", "Guru menyampaikan kesimpulan sendiri.", "Guru menyusun kesimpulan bersama murid melalui tanya jawab.", "Guru menyusun kesimpulan bersama murid dan mengaitkannya dengan pembelajaran berikutnya atau kehidupan sehari-hari murid."]}], "kelompok": {"1": "Tahap 1: Gali dan Eksplorasi", "5": "Tahap 2: Muat Konten", "10": "Tahap 3: Buat Aktivitas", "16": "Tahap 4: Ikuti Pemikiran Murid", "20": "Tahap 5: Rayakan dan Akhiri"}, "label": "LEVEL 3 — BEHAVIOR: Penerapan Hasil Pelatihan di Kelas (Observasi Pembelajaran)", "deskripsi": "Observasi penerapan hasil pelatihan di kelas. Skor 3–4 wajib disertai bukti. Pilih TD bila indikator tidak ada kesempatan diamati dan tuliskan alasannya."}, "4": {"indikator": [{"no": 1, "indikator": "Guru menerapkan strategi hasil pelatihan", "rubrik": ["Tidak ada bukti penerapan setelah pelatihan.", "Menerapkan satu strategi pada satu kesempatan.", "Menerapkan beberapa strategi pada 2–3 kesempatan dan terdokumentasi.", "Menerapkan strategi secara konsisten pada 4 kesempatan atau lebih; ada bukti perangkat dan refleksi."]}, {"no": 2, "indikator": "Guru mengembangkan perangkat ajar", "rubrik": ["Tidak membuat/menyesuaikan perangkat ajar berdasarkan pelatihan.", "Perangkat sebagian besar menyalin contoh tanpa penyesuaian nyata.", "Perangkat disesuaikan dengan kelas, tujuan, dan kebutuhan murid.", "Membuat/mengadaptasi perangkat untuk beberapa topik, dengan asesmen dan tindak lanjut berbasis bukti."]}, {"no": 3, "indikator": "Guru berbagi praktik dengan rekan", "rubrik": ["Tidak ada kegiatan berbagi.", "Berbagi informal tanpa contoh atau dokumentasi.", "Berbagi praktik dalam KKG/komunitas belajar/rapat guru.", "Berbagi disertai demonstrasi, bahan ajar, atau observasi sejawat dan tindak lanjut."]}, {"no": 4, "indikator": "Keberanian menggunakan Bahasa Inggris", "rubrik": ["Tidak tampak perubahan dibanding kondisi awal.", "Kurang dari 50% murid yang sebelumnya pasif mulai mencoba menggunakan Bahasa Inggris.", "50–75% murid yang sebelumnya pasif mulai mencoba menggunakan Bahasa Inggris.", "Lebih dari 75% murid yang sebelumnya pasif mulai mencoba ungkapan Bahasa Inggris, termasuk saat belum yakin."]}, {"no": 5, "indikator": "Pemahaman kosakata dan ungkapan", "rubrik": ["Tidak ada bukti peningkatan dari kondisi awal.", "Kurang dari 50% murid menunjukkan peningkatan pada tugas/cek pemahaman.", "50–75% murid menunjukkan peningkatan pada tugas/cek pemahaman.", "Lebih dari 75% murid menunjukkan peningkatan yang terverifikasi melalui asesmen atau hasil kerja."]}, {"no": 6, "indikator": "Keterampilan menyimak dan merespons", "rubrik": ["Tidak ada bukti peningkatan kemampuan memahami instruksi/dialog sederhana.", "Kurang dari 50% murid menunjukkan peningkatan pemahaman/ respons.", "50–75% murid menunjukkan peningkatan pemahaman/ respons.", "Lebih dari 75% murid menunjukkan peningkatan, dibanding asesmen atau contoh kerja awal."]}, {"no": 7, "indikator": "Keterampilan berbicara/interaksi", "rubrik": ["Tidak ada bukti peningkatan berbicara atau interaksi.", "Kurang dari 50% murid meningkat dalam penggunaan kata/ungkapan lisan.", "50–75% murid meningkat dalam penggunaan ungkapan/percakapan sesuai tujuan.", "Lebih dari 75% murid meningkat dan mampu menggunakan ungkapan dalam konteks tugas/percakapan."]}, {"no": 8, "indikator": "Keterampilan membaca/menulis sesuai target", "rubrik": ["Tidak ada bukti perubahan pada tugas membaca/menulis yang diajarkan.", "Kurang dari 50% murid menunjukkan peningkatan pada tugas terkait.", "50–75% murid menunjukkan peningkatan pada tugas terkait.", "Lebih dari 75% murid menunjukkan peningkatan berdasarkan rubrik/hasil kerja yang dibandingkan."]}, {"no": 9, "indikator": "Motivasi dan sikap terhadap Bahasa Inggris", "rubrik": ["Tidak ada perubahan atau murid semakin menghindari kegiatan.", "Kurang dari 50% murid menunjukkan tanda minat/kepercayaan diri meningkat.", "50–75% murid menunjukkan minat, antusiasme, atau kesediaan mencoba yang meningkat.", "Lebih dari 75% murid menunjukkan minat/kepercayaan diri yang meningkat secara konsisten dan didukung catatan."]}, {"no": 10, "indikator": "Kolaborasi guru dalam pembelajaran Bahasa Inggris", "rubrik": ["Tidak ada diskusi/kolaborasi terkait pembelajaran Bahasa Inggris.", "Ada satu kali diskusi informal tanpa tindak lanjut.", "Ada dua kali atau lebih diskusi/berbagi bahan dan strategi pembelajaran.", "Kolaborasi terjadwal dan terdokumentasi; perangkat atau praktik diperbaiki bersama."]}, {"no": 11, "indikator": "Dukungan kepala sekolah/komunitas belajar", "rubrik": ["Tidak ada dukungan yang teridentifikasi.", "Dukungan terbatas pada persetujuan umum.", "Ada dukungan konkret seperti waktu kolaborasi, supervisi, atau akses media.", "Dukungan berkelanjutan, ditindaklanjuti, dan dimanfaatkan untuk memperbaiki pembelajaran."]}, {"no": 12, "indikator": "Pemanfaatan hasil asesmen untuk perbaikan", "rubrik": ["Hasil asesmen tidak dianalisis atau digunakan.", "Hasil asesmen dicatat tetapi tindak lanjut belum jelas.", "Guru menggunakan hasil asesmen untuk menentukan penguatan/pengayaan.", "Data awal dan lanjutan dibandingkan; keputusan pembelajaran dan perbaikannya terdokumentasi."]}], "kelompok": {"1": "A. Keberlanjutan Praktik Guru | Responden: guru (diverifikasi kepala sekolah/pengawas)", "4": "B. Perubahan pada Murid | Responden: guru (dengan bukti hasil kerja/catatan), dapat dicek oleh kepala sekolah/pengawas | Bandingkan dengan kondisi murid sebelum guru menerapkan PKGSD MBI", "10": "C. Perubahan pada Budaya Sekolah | Responden: kepala sekolah/pengawas"}, "label": "LEVEL 4 — RESULTS: Perubahan pada Guru, Murid, dan Budaya Sekolah", "deskripsi": "Bukti perubahan pada praktik guru, murid, dan budaya sekolah. Skor 3–4 wajib disertai bukti."}}
                PKGSD_JSON, true);

        $jabatan = old('jabatan_penilai', $pkgsdMbi->jabatan_penilai ?? 'Peserta PKGSD MBI');

        $identityFields = [
            ['nama_guru', 'Nama Guru', 'text', true, 'Masukkan nama guru'],
            ['nama_sekolah', 'Nama Sekolah', 'text', true, 'Masukkan nama sekolah'],
            ['kelas_fase', 'Kelas / Fase', 'text', false, 'Contoh: Kelas IV / Fase B'],
            ['topik_materi', 'Topik / Materi', 'text', false, 'Masukkan topik atau materi'],
        ];

        // Warna per level (sama dengan halaman BCKS)
        $levelPalette = [
            1 => ['badge' => 'background:#dbeafe;color:#1d4ed8', 'row' => '#eff4ff'],
            2 => ['badge' => 'background:#ede9fe;color:#6d28d9', 'row' => '#f5f1ff'],
            3 => ['badge' => 'background:#d1fae5;color:#047857', 'row' => '#eefaf4'],
            4 => ['badge' => 'background:#fef3c7;color:#b45309', 'row' => '#fffaea'],
        ];
    @endphp

    <style>
        /* ===================== TOKEN WARNA (sama dengan BCKS) ===================== */
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

        [data-pkgsd-level][hidden] {
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

        /* --- tombol pastel --- */
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
            text-decoration: none;
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

        .b-slate {
            --b-bg: linear-gradient(160deg, #f6f8fc 0%, #e6ebf5 100%);
            --b-line: #d9e0ee;
            --b-ink: #475569;
            --b-glow: rgba(71, 85, 105, .6);
        }

        .d-foot {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            flex-wrap: wrap;
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

        .d-note ul {
            margin: 6px 0 0 16px;
            list-style: disc;
        }

        .d-note li+li {
            margin-top: 3px;
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

            .d-form-grid.c3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .d-form-grid.c4 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .d-form-grid .span2 {
                grid-column: 1 / -1;
            }
        }

        @media (min-width: 1024px) {
            .d-form-grid.c4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
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

        textarea.d-field {
            height: auto;
            padding: 11px 14px;
            line-height: 1.6;
            resize: vertical;
        }

        .d-field::placeholder {
            color: #94a3b8;
        }

        .d-field:focus {
            border-color: var(--p-500);
            box-shadow: 0 0 0 4px var(--p-100);
        }

        .d-field:disabled {
            background: #f8fafc;
            color: #94a3b8;
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

        /* --- keterangan skor level 1 --- */
        .d-legend {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 0 20px 16px;
        }

        .d-legend span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #f9fbff;
            font-size: 12px;
            color: #475569;
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

        .d-table td.d-group-cell {
            padding: 11px 16px;
            font-size: 12.5px;
            font-weight: 700;
            color: var(--ink);
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

        /* --- indikator level 2 sampai 4 (kartu rubrik) --- */
        .d-group-bar {
            padding: 11px 20px;
            font-size: 12.5px;
            font-weight: 700;
            color: var(--ink);
            border-top: 1px solid var(--line);
        }

        .d-item {
            padding: 20px;
            border-top: 1px solid var(--line);
        }

        .d-group-bar+.d-item {
            border-top: 0;
        }

        .d-item:first-child {
            border-top: 0;
        }

        .d-item-no {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: #94a3b8;
        }

        .d-item-q {
            margin-top: 4px;
            font-size: 13.5px;
            font-weight: 600;
            line-height: 1.7;
            color: #334155;
        }

        .d-opts {
            display: grid;
            gap: 10px;
            margin-top: 14px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-opts {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .d-opts .span2 {
                grid-column: 1 / -1;
            }
        }

        .d-opt {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #fff;
            cursor: pointer;
            transition: border-color .2s, background .2s;
        }

        .d-opt:hover {
            border-color: var(--p-200);
            background: #f7f9ff;
        }

        .d-opt:has(input:checked) {
            border-color: var(--p-500);
            background: var(--p-50);
            box-shadow: 0 0 0 3px var(--p-100);
        }

        .d-opt input {
            margin-top: 3px;
        }

        .d-opt-skor {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            margin-bottom: 4px;
            border-radius: 8px;
            background: var(--p-50);
            color: var(--p-700);
            font-size: 11.5px;
            font-weight: 800;
        }

        .d-opt:has(input:checked) .d-opt-skor {
            background: var(--p-600);
            color: #fff;
        }

        .d-opt-txt {
            font-size: 12.5px;
            line-height: 1.7;
            color: #475569;
        }

        .d-opt.td {
            border-style: dashed;
        }

        .d-opt.td:hover {
            border-color: #fcd34d;
            background: #fffaea;
        }

        .d-opt.td:has(input:checked) {
            border-color: var(--accent);
            background: #fffaea;
            box-shadow: 0 0 0 3px #fef3c7;
        }

        .d-opt.td .d-opt-skor {
            background: #fef3c7;
            color: #b45309;
            width: auto;
            padding: 0 8px;
        }

        .d-opt.td:has(input:checked) .d-opt-skor {
            background: var(--accent);
            color: #fff;
        }

        .d-opt.td input {
            accent-color: #d97706;
        }

        .d-opt input {
            accent-color: var(--p-600);
        }

        .d-evid {
            display: grid;
            gap: 14px;
            margin-top: 14px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-evid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .d-evid .d-label {
            font-size: 12px;
            margin-bottom: 6px;
        }

        .d-evid [hidden] {
            display: none;
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Edit Instrumen Monev <b>PKGSD MBI</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('instrumen.index') }}">Instrumen</a>
                        &nbsp;›&nbsp; Edit PKGSD MBI Instrumen
                    </p>
                    <p class="d-desc">
                        Perbarui biodata, identitas pemonev, dan penilaian yang sudah tersimpan.
                    </p>
                </div>

                {{-- Kembali --}}
                <a href="{{ route('pkgsd-mbi.show', $pkgsdMbi) }}" class="d-pbtn b-blue back">
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
                            <h2 class="d-card-h">Instrumen Monitoring dan Evaluasi PKGSD MBI</h2>
                            <p class="d-card-s" style="line-height:1.7">
                                Instrumen ini digunakan untuk mengevaluasi efektivitas pelatihan dan dampak penerapan
                                pembelajaran Bahasa Inggris oleh guru SD.
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
                            <ul>
                                <li>Pilih skor yang deskripsinya paling sesuai dengan bukti, bukan kesan umum. Jika ragu
                                    antara dua skor, pilih yang lebih rendah.</li>
                                <li>Skor 3 dan 4 sah hanya jika disertai bukti. Tanpa bukti, skor diturunkan menjadi paling
                                    tinggi 2.</li>
                                <li>Setiap indikator dinilai berdasarkan deskripsinya sendiri, bukan karena indikator lain
                                    bernilai baik.</li>
                                <li>Proporsi murid: kurang dari separuh = &lt;50%; separuh hingga tiga perempat = 50–75%;
                                    hampir semua / lebih dari tiga perempat = &gt;75%.</li>
                                <li>Kode TD (Level 3) dipakai bila indikator tidak ada kesempatan diamati. Alasan TD tidak
                                    wajib diisi. TD tidak dihitung dalam rerata. Skor 1 hanya jika perilaku tidak muncul
                                    padahal ada kesempatan.</li>
                                <li>Peserta mengisi Level 1–4. Rekan sejawat dan atasan mengisi Level 3–4.</li>
                            </ul>
                            <p style="margin-top:8px;font-size:12px;color:var(--muted)">
                                Kategori rerata: 3,50–4,00 Sangat Baik; 2,75–3,49 Baik; 2,00–2,74 Cukup;
                                1,00–1,99 Perlu pendampingan intensif.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Progres pengisian --}}
                <div class="d-prog">
                    <div class="d-prog-row">
                        <span class="d-prog-label">Progres pengisian</span>
                        <span id="pkgsd-progress-percent" class="d-prog-pct">0%</span>
                    </div>

                    <div class="d-bar">
                        <div id="pkgsd-progress-bar" style="width: 0%"></div>
                    </div>

                    <div class="d-prog-row" style="margin-top:10px">
                        <span id="pkgsd-progress-text" class="d-prog-val">0 / 0 butir</span>
                        <span class="d-prog-label" style="font-weight:500">Penilaian</span>
                    </div>

                    <div class="d-prog-sep">
                        <p class="d-prog-label">Skor sementara</p>
                        <p id="pkgsd-score-text" class="d-prog-val" style="margin-top:4px">Belum ada penilaian</p>
                    </div>
                </div>

            </div>
        </div>

        {{-- ================= VALIDATION ERROR ================= --}}
        @if ($errors->any())
            <div class="d-error">
                <b>Terdapat kesalahan pada pengisian:</b>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ================= FORM UTAMA ================= --}}
        <form action="{{ route('pkgsd-mbi.update', $pkgsdMbi) }}" method="POST" class="d-form" id="pkgsd-form">

            @csrf
            @method('PUT')

            {{-- A. BIODATA --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Biodata</h2>
                        <p class="d-card-s">Informasi guru dan konteks pembelajaran yang dinilai.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">
                    @foreach ($identityFields as [$name, $label, $type, $required, $placeholder])
                        <div>
                            <label for="{{ $name }}" class="d-label">
                                {{ $label }}
                                @if ($required)
                                    <i>*</i>
                                @endif
                            </label>

                            <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
                                value="{{ old($name, $pkgsdMbi->{$name} ?? '') }}" @required($required)
                                placeholder="{{ $placeholder }}" class="d-field">

                            @error($name)
                                <p class="d-err">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- B. IDENTITAS PEMONEV --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Identitas Pemonev</h2>
                        <p class="d-card-s">Jabatan pemonev menentukan level yang perlu diisi.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">
                    <div>
                        <label for="nama_petugas_monev" class="d-label">Nama Petugas Monev <i>*</i></label>
                        <input id="nama_petugas_monev" name="nama_petugas_monev" type="text" required
                            value="{{ old('nama_petugas_monev', $pkgsdMbi->nama_petugas_monev) }}"
                            placeholder="Masukkan nama petugas" class="d-field">
                        @error('nama_petugas_monev')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jabatan_penilai" class="d-label">Jabatan Pemonev <i>*</i></label>
                        <select id="jabatan_penilai" name="jabatan_penilai" required class="d-field">
                            <option value="">Pilih jabatan</option>
                            <option value="Peserta PKGSD MBI" @selected($jabatan === 'Peserta PKGSD MBI')>Peserta PKGSD MBI
                            </option>
                            <option value="Rekan sejawat" @selected($jabatan === 'Rekan sejawat')>Rekan sejawat</option>
                            <option value="Atasan langsung/Kepala Sekolah" @selected($jabatan === 'Atasan langsung/Kepala Sekolah')>Atasan langsung/Kepala Sekolah</option>
                        </select>
                        @error('jabatan_penilai')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_monev" class="d-label">Tanggal Monev <i>*</i></label>
                        <input id="tanggal_monev" name="tanggal_monev" type="date" required
                            value="{{ old('tanggal_monev', $pkgsdMbi->tanggal_monev?->format('Y-m-d') ?? now()->format('Y-m-d')) }}"
                            class="d-field">
                        @error('tanggal_monev')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sumber_data_bukti" class="d-label">Sumber Data / Bukti</label>
                        <textarea id="sumber_data_bukti" name="sumber_data_bukti" rows="2"
                            placeholder="Tuliskan sumber data atau dokumen pendukung"
                            class="d-field">{{ old('sumber_data_bukti', $pkgsdMbi->sumber_data_bukti) }}</textarea>
                        @error('sumber_data_bukti')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- C. METADATA OBSERVASI (LEVEL 3) --}}
            <section data-pkgsd-level="3" id="pkgsd-observasi-meta" class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">C. Metadata Observasi (Level 3)</h2>
                        <p class="d-card-s">Data pelaksanaan observasi pembelajaran di kelas.</p>
                    </div>
                </div>

                <div class="d-form-grid c4">
                    <div>
                        <label for="tanggal_observasi" class="d-label">Tanggal Observasi</label>
                        <input id="tanggal_observasi" name="tanggal_observasi" type="date"
                            value="{{ old('tanggal_observasi') }}" class="d-field">
                    </div>

                    <div>
                        <label for="durasi_pembelajaran" class="d-label">Durasi Pembelajaran</label>
                        <input id="durasi_pembelajaran" name="durasi_pembelajaran" type="text"
                            value="{{ old('durasi_pembelajaran') }}" placeholder="Contoh: 2 x 35 menit" class="d-field">
                    </div>

                    <div>
                        <label for="jumlah_murid_hadir" class="d-label">Jumlah Murid Hadir</label>
                        <input id="jumlah_murid_hadir" name="jumlah_murid_hadir" type="number" min="0"
                            value="{{ old('jumlah_murid_hadir') }}" class="d-field">
                    </div>

                    <div>
                        <label for="observasi_ke" class="d-label">Observasi Ke-</label>
                        <input id="observasi_ke" name="observasi_ke" type="number" min="1" value="{{ old('observasi_ke') }}"
                            class="d-field">
                    </div>
                </div>
            </section>

            {{-- ================= LEVEL 1 SAMPAI 4 ================= --}}
            @foreach ($levelData as $levelKey => $level)
                @php
                    $palet = $levelPalette[(int) $levelKey] ?? $levelPalette[1];
                    $jumlahIndikatorLevel = count($level['indikator'] ?? []);
                @endphp

                <section data-pkgsd-level="{{ $levelKey }}" class="d-card">

                    {{-- Header level --}}
                    <div class="d-card-top">
                        <div>
                            <h2 class="d-card-h">{{ $level['label'] }}</h2>
                            @if (!empty($level['deskripsi']))
                                <p class="d-card-s" style="line-height:1.7">{{ $level['deskripsi'] }}</p>
                            @endif
                        </div>

                        <span class="d-badge" style="{{ $palet['badge'] }}">{{ $jumlahIndikatorLevel }} indikator</span>
                    </div>

                    @if ((string) $levelKey === '1')

                        {{-- LEVEL 1: FORMAT TABEL --}}
                        <div class="d-legend">
                            <span style="font-weight:700;color:var(--ink);border:0;background:none;padding-left:0">Keterangan
                                skor</span>
                            @foreach (['1' => 'Kurang', '2' => 'Cukup', '3' => 'Baik', '4' => 'Sangat Baik'] as $angka => $labelSkor)
                                <span><strong>{{ $angka }}.</strong> {{ $labelSkor }}</span>
                            @endforeach
                        </div>

                        <div style="overflow-x:auto">
                            <table class="d-table" style="min-width:760px">
                                <thead>
                                    <tr>
                                        <th class="center" style="width:80px">No</th>
                                        <th>Pernyataan / Indikator</th>
                                        @foreach ([1, 2, 3, 4] as $skor)
                                            <th class="center" style="width:80px">{{ $skor }}</th>
                                        @endforeach
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($level['indikator'] as $indikator)
                                        @if (isset($level['kelompok'][(string) $indikator['no']]))
                                            <tr>
                                                <td colspan="6" class="d-group-cell" style="background: {{ $palet['row'] }}">
                                                    {{ $level['kelompok'][(string) $indikator['no']] }}
                                                </td>
                                            </tr>
                                        @endif

                                        <tr class="d-data">
                                            <td class="txt">{{ $indikator['no'] }}</td>
                                            <td class="q">{{ $indikator['indikator'] }}</td>

                                            @foreach ([1, 2, 3, 4] as $skor)
                                                <td style="text-align:center">
                                                    <input type="radio" name="level_1_jawaban[{{ $indikator['no'] }}][skor]"
                                                        value="{{ $skor }}" @checked((string) old("level_1_jawaban.{$indikator['no']}.skor", data_get($pkgsdMbi->level_1_jawaban ?? [], $indikator['no'] . '.skor')) === (string) $skor) class="d-radio"
                                                        title="Skor {{ $skor }} — {{ $indikator['rubrik'][$skor - 1] }}"
                                                        aria-label="Skor {{ $skor }} — {{ $indikator['rubrik'][$skor - 1] }}">
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    @else

                        {{-- LEVEL 2 SAMPAI 4: KARTU DENGAN DESKRIPSI RUBRIK --}}
                        <div>
                            @foreach ($level['indikator'] as $indikator)
                                @php $no = $indikator['no']; @endphp

                                @if (isset($level['kelompok'][(string) $no]))
                                    <div class="d-group-bar" style="background: {{ $palet['row'] }}">
                                        {{ $level['kelompok'][(string) $no] }}
                                    </div>
                                @endif

                                <div class="d-item" data-pkgsd-item>
                                    <div>
                                        <p class="d-item-no">Indikator {{ $no }}</p>
                                        <p class="d-item-q">{{ $indikator['indikator'] }}</p>
                                    </div>

                                    <div class="d-opts">
                                        @foreach ($indikator['rubrik'] as $idx => $rubrik)
                                            <label class="d-opt">
                                                <input type="radio" name="level_{{ $levelKey }}_jawaban[{{ $no }}][skor]"
                                                    value="{{ $idx + 1 }}" @checked((string) old("level_{$levelKey}_jawaban.{$no}.skor", data_get($pkgsdMbi->{"level_{$levelKey}_jawaban"} ?? [], $no . '.skor')) === (string) ($idx + 1)) class="d-radio">
                                                <span>
                                                    <span class="d-opt-skor">{{ $idx + 1 }}</span>
                                                    <span class="d-opt-txt" style="display:block">{{ $rubrik }}</span>
                                                </span>
                                            </label>
                                        @endforeach

                                        @if ((string) $levelKey === '3')
                                            <label class="d-opt td span2">
                                                <input type="radio" name="level_3_jawaban[{{ $no }}][skor]" value="TD"
                                                    @checked(old("level_3_jawaban.{$no}.skor", data_get($pkgsdMbi->level_3_jawaban ?? [], $no . '.skor')) === 'TD') class="d-radio">
                                                <span>
                                                    <span class="d-opt-skor">TD</span>
                                                    <span class="d-opt-txt" style="display:block">
                                                        Tidak ada kesempatan diamati (tidak dihitung dalam rerata; alasan bersifat
                                                        opsional).
                                                    </span>
                                                </span>
                                            </label>
                                        @endif
                                    </div>

                                    {{-- Bukti --}}
                                    @if (in_array((string) $levelKey, ['3', '4']))
                                        <div class="d-evid">
                                            <div>
                                                <label class="d-label">
                                                    {{ $levelKey === '3' ? 'Bukti / catatan observasi' : 'Bukti yang dilampirkan' }}
                                                </label>

                                                <textarea data-pkgsd-evidence="{{ $levelKey }}-{{ $no }}"
                                                    name="level_{{ $levelKey }}_jawaban[{{ $no }}][bukti]" rows="2"
                                                    placeholder="{{ $levelKey === '3' ? 'Catatan hasil observasi (wajib untuk skor 3–4)' : 'RPP, jurnal, foto, hasil kerja murid, notulen, atau catatan supervisi (wajib untuk skor 3–4)' }}"
                                                    class="d-field">{{ old("level_{$levelKey}_jawaban.{$no}.bukti", data_get($pkgsdMbi->{"level_{$levelKey}_jawaban"} ?? [], $no . '.bukti')) }}</textarea>
                                                @error("level_{$levelKey}_jawaban.{$no}.bukti")
                                                    <p class="d-err">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            @if ((string) $levelKey === '3')
                                                <div class="td-reason" data-reason-for="{{ $no }}" hidden>
                                                    <label class="d-label">Alasan TD (opsional)</label>

                                                    <textarea name="level_3_jawaban[{{ $no }}][alasan_td]" rows="2"
                                                        placeholder="Jelaskan mengapa indikator tidak dapat diamati"
                                                        class="d-field">{{ old("level_3_jawaban.{$no}.alasan_td", data_get($pkgsdMbi->level_3_jawaban ?? [], $no . '.alasan_td')) }}</textarea>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                    @endif
                </section>
            @endforeach

            {{-- ================= TOMBOL AKSI ================= --}}
            <div class="d-foot">
                <button type="submit" class="d-pbtn b-mint">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                        <path d="M17 21v-8H7v8M7 3v5h8" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

    {{-- ================= JAVASCRIPT PROGRES ================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const role = document.getElementById('jabatan_penilai');
            const form = document.getElementById('pkgsd-form');
            const levelCards = document.querySelectorAll('[data-pkgsd-level]');

            function updateForm() {
                const allLevels = role.value === 'Peserta PKGSD MBI';

                levelCards.forEach(card => {
                    const level = card.dataset.pkgsdLevel;
                    const active = allLevels || level === '3' || level === '4';

                    card.hidden = !active;

                    card.querySelectorAll('input, textarea, select').forEach(el => {
                        el.disabled = !active;

                        if (!active && el.type === 'radio') {
                            el.checked = false;
                        }
                    });
                });

                updateTD();
                updateProgress();
            }

            function updateTD() {
                // Bukti wajib ketika skor Level 3 atau Level 4 adalah 3/4.
                ['3', '4'].forEach(level => {
                    document.querySelectorAll('[data-pkgsd-level="' + level + '"] [data-pkgsd-item]').forEach(item => {
                        const checkedScore = item.querySelector('input[type="radio"][name*="[skor]"]:checked');
                        const evidence = item.querySelector('[data-pkgsd-evidence]');
                        if (evidence) {
                            const needsEvidence = !!checkedScore && ['3', '4'].includes(checkedScore.value);
                            evidence.required = needsEvidence;
                            evidence.setAttribute('aria-required', needsEvidence ? 'true' : 'false');
                        }
                    });
                });

                document.querySelectorAll('.td-reason').forEach(box => {
                    const nomor = box.dataset.reasonFor;
                    const card = box.closest('[data-pkgsd-level]');
                    const checked = form.querySelector(
                        'input[type="radio"][name="level_3_jawaban[' + nomor + '][skor]"]:checked'
                    );
                    const show = !!checked && checked.value === 'TD' && !card.hidden;
                    const textarea = box.querySelector('textarea');
                    box.hidden = !show;
                    textarea.disabled = !show;
                    textarea.required = false;
                });
            }

            function updateProgress() {
                const activeRadios = [...form.querySelectorAll('input[type="radio"][name*="_jawaban"]')]
                    .filter(el => !el.disabled);

                const names = [...new Set(activeRadios.map(el => el.name))];
                const checked = names.filter(name =>
                    form.querySelector('input[type="radio"][name="' + CSS.escape(name) + '"]:checked')
                );

                let totalScore = 0;
                let scoreCount = 0;

                checked.forEach(name => {
                    const el = form.querySelector('input[type="radio"][name="' + CSS.escape(name) + '"]:checked');

                    if (el.value !== 'TD') {
                        totalScore += Number(el.value);
                        scoreCount++;
                    }
                });

                const percent = names.length ? Math.round(checked.length / names.length * 100) : 0;

                document.getElementById('pkgsd-progress-percent').textContent = percent + '%';
                document.getElementById('pkgsd-progress-bar').style.width = percent + '%';
                document.getElementById('pkgsd-progress-text').textContent = checked.length + ' / ' + names.length + ' butir';
                document.getElementById('pkgsd-score-text').textContent = scoreCount
                    ? totalScore + ' poin dari ' + scoreCount + ' indikator berskor'
                    : 'Belum ada penilaian';
            }

            role.addEventListener('change', updateForm);

            form.querySelectorAll('input[type="radio"]').forEach(el => {
                el.addEventListener('change', function () {
                    updateTD();
                    updateProgress();
                });
            });

            updateForm();
        });
    </script>

@endsection