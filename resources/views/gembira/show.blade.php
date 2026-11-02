@extends('layouts.app')

@section('title', 'Detail Matematika GEMBIRA')
@section('page-title', 'Detail Matematika GEMBIRA')

@section('content')
    @php
        /*
        |--------------------------------------------------------------------------
        | Data instrumen (sama dengan form create/edit)
        |--------------------------------------------------------------------------
        */
        $levelData = json_decode(<<<'GEMBIRA_JSON'
                        {"1":{"label":"LEVEL 1 – REACTION","deskripsi":"","indikator":[{"no":1,"indikator":"Kesesuaian program kegiatan dengan tujuan pelatihan","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":2,"indikator":"Kesesuain bahan ajar dengan struktur program","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":3,"indikator":"Kesesuaian alokasi materi dengan bobot materi","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":4,"indikator":"Relevansi materi dengan kebutuhan peserta  pelatihan dalam mendukung pelaksanaan tugas pendidik","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":5,"indikator":"Manfaat materi pelatihan dalam meningkatkan kompetensi peserta","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":6,"indikator":"Kesiapan dan ketersediaan sarana kegiatan [audio visual, LCD/laptop, papan putih, pelantang, spidol, penghapus].","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":7,"indikator":"Kenyamanan ruang kegiatan [ventilasi udara/AC, pencahayaan].","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":8,"indikator":"Kebersihan ruang kelas.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":9,"indikator":"Ketersediaan sarana ibadah.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":10,"indikator":"Ketersediaan akses internet","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":11,"indikator":"Fasilitator memfasilitasi dan mendampingi proses pembelajaran peserta.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":12,"indikator":"Fasilitator  menggunakan bahasa yang menghargai dan menghormati di dalam berkomunikasi dengan peserta.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":13,"indikator":"Fasilitator  memulai dan mengakhiri pembelajaran tepat waktu.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":14,"indikator":"Fasilitator   mampu menyampaikan materi dengan jelas dan tepat, sehingga peserta dapat memahami pembelajaran dengan baik.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":15,"indikator":"Kemudahan dalam mengakses LMS Pembelajaran","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":16,"indikator":"Kemudahan dalam membaca materi/video yang ada di LMS","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":17,"indikator":"Kemudahan dalam mengikuti alur LMS","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":18,"indikator":"Kemudahan dalam pembelajaran di LMS","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":19,"indikator":"Kemudahan dalam berdiskusi di LMS","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":20,"indikator":"Kemudahan dalam mengumpulkan tugas di LMS","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":21,"indikator":"Kelengkapan dokumen/kit bahan kegiatan [materi, LMS, ATK]","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":22,"indikator":"Kualitas tampilan bahan tayang kegiatan.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":23,"indikator":"Keterbacaan materi dan bahan tayang kegiatan.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":24,"indikator":"Ketersediaan ilustrasi dan contoh pada bahan pembelajaran kegiatan.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":25,"indikator":"Kesesuaian alokasi waktu pelaksanaan kegiatan dengan tujuan dan sasaran program kegiatan.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":26,"indikator":"Ketepatan alokasi waktu untuk menyelesaikan setiap tagihan pembelajaran.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":27,"indikator":"Kecukupan menu yang mendukung pemenuhan gizi.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":28,"indikator":"Variasi hidangan/konsumsi.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]},{"no":29,"indikator":"Ketepatan waktu penyediaan konsumsi.","rubrik":["Kurang","Cukup","Baik","Sangat Baik"]}],"kelompok":{"1":"Program dan Materi","6":"Sarana dan Prasarana Penunjang Kegiatan","11":"Fasilitator","15":"Akses LMS","21":"Bahan Kegiatan","25":"Jangka Waktu Pelaksanaan Kegiatan","27":"Layanan Menu"}},"2":{"label":"LEVEL 2 — LEARNING: Kemampuan Guru Merancang Pembelajaran (Review RPP)","deskripsi":"Penilai membaca RPP yang disusun guru setelah mengikuti kegiatan, lalu menilai setiap indikator dengan rubrik 1–4. Kolom Bukti diisi nomor halaman atau kutipan singkat dari RPP.","indikator":[{"no":1,"indikator":"RPP memuat kegiatan yang menggali pengetahuan dan pengalaman awal murid sebelum konsep baru diperkenalkan.","rubrik":["Tidak ada kegiatan menggali pengetahuan awal; pembelajaran langsung dimulai dengan materi baru.","Ada kegiatan pembuka, tetapi bersifat umum (misalnya “apakah kalian masih ingat pelajaran kemarin?”) dan tidak menggali kemampuan matematika yang relevan.","Ada kegiatan yang menggali pengetahuan awal yang relevan dengan konsep, menggunakan satu cara (pertanyaan atau aktivitas konkret).","Ada kegiatan menggali pengetahuan awal dengan lebih dari satu cara (pertanyaan dan aktivitas konkret) serta rencana tindak lanjut jika pengetahuan awal murid berbeda-beda."]},{"no":2,"indikator":"RPP menggunakan konteks nyata yang dekat dengan kehidupan murid.","rubrik":["Tidak ada konteks; soal dan kegiatan hanya berupa angka atau simbol.","Ada konteks, tetapi jauh dari pengalaman murid atau hanya berfungsi sebagai hiasan cerita yang tidak diperlukan untuk memahami konsep.","Ada konteks nyata yang relevan dengan pengalaman murid dan digunakan dalam kegiatan inti.","Konteks sangat dekat dengan kehidupan murid (termasuk lingkungan atau budaya setempat), digunakan sepanjang pembelajaran, dan menjadi dasar murid membangun konsep."]},{"no":3,"indikator":"RPP memuat pertanyaan pemantik yang dituliskan dengan jelas.","rubrik":["Tidak ada pertanyaan pemantik.","Pertanyaan pemantik ada, tetapi tertutup (jawabannya benar/salah atau satu kata) sehingga tidak mendorong murid berpikir.","Ada pertanyaan pemantik terbuka yang relevan dengan tujuan pembelajaran, tetapi belum disertai perkiraan jawaban murid atau pertanyaan lanjutan.","Ada pertanyaan pemantik terbuka yang relevan, disertai perkiraan jawaban murid dan pertanyaan lanjutan untuk memperdalam berpikir."]},{"no":4,"indikator":"RPP memuat kegiatan pembuka yang dirancang untuk memunculkan rasa ingin tahu murid.","rubrik":["Tidak ada kegiatan yang dirancang memancing rasa ingin tahu; pembuka hanya berupa penyampaian tujuan atau materi.","Ada pembuka yang menarik (cerita, benda, atau gambar), tetapi tidak berkaitan dengan konsep yang akan dipelajari.","Ada pembuka (cerita, benda, masalah, atau teka-teki) yang berkaitan dengan konsep dan memancing murid untuk bertanya atau menebak.","Pembuka berkaitan erat dengan konsep, memancing murid bertanya atau menebak, dan terhubung langsung ke kegiatan berikutnya sehingga rasa ingin tahu dipertahankan."]},{"no":5,"indikator":"RPP menyajikan konsep secara bertahap, dari pengalaman konkret ke gambar/representasi, lalu ke simbol.","rubrik":["Konsep langsung diberikan dalam bentuk rumus, aturan, atau simbol tanpa langkah membangun konsep.","Ada penyajian bertahap, tetapi urutannya kurang runtut atau langsung melompat ke simbol tanpa pengalaman konkret.","Urutan runtut dari pengalaman konkret ke simbol, tetapi hubungan antartahap belum dijelaskan.","Urutan runtut dari konkret ke gambar/representasi lalu ke simbol, dengan hubungan antartahap dituliskan jelas (misalnya melalui pertanyaan penghubung)."]},{"no":6,"indikator":"RPP menghubungkan konsep baru dengan konsep atau pengalaman yang sudah dimiliki murid.","rubrik":["Tidak ada keterkaitan dengan konsep atau pengalaman sebelumnya.","Keterkaitan disebutkan secara umum (misalnya “mengingat kembali”) tanpa menyebut konsep yang spesifik.","Keterkaitan dengan satu konsep atau pengalaman sebelumnya disebutkan secara spesifik.","Keterkaitan dengan konsep sebelumnya dan konteks lain dituliskan secara spesifik dan digunakan dalam kegiatan (misalnya murid diminta menghubungkan)."]},{"no":7,"indikator":"RPP memuat media atau alat bantu yang membantu murid memahami konsep.","rubrik":["Tidak ada media atau alat bantu.","Media disebutkan, tetapi hanya untuk menarik perhatian atau tanpa penjelasan cara penggunaannya.","Media dijelaskan cara penggunaannya dan relevan dengan konsep.","Media dijelaskan cara penggunaannya, dapat dimanipulasi langsung oleh murid, dan jelas membantu membangun konsep."]},{"no":8,"indikator":"RPP menekankan pemahaman konsep, bukan hafalan atau prosedur semata.","rubrik":["Kegiatan hanya meminta murid menghafal fakta, rumus, atau prosedur.","Sebagian besar kegiatan berupa hafalan atau latihan prosedur; pemahaman hanya disinggung.","Kegiatan seimbang antara prosedur dan pemahaman, dengan pertanyaan “mengapa” atau “bagaimana” pada sebagian kegiatan.","Kegiatan utama meminta murid menjelaskan alasan, membandingkan, atau menunjukkan konsep dengan cara sendiri; prosedur muncul sebagai hasil pemahaman."]},{"no":9,"indikator":"Konsep, contoh, dan istilah matematika dalam RPP benar.","rubrik":["Ada kesalahan konsep matematika yang dapat menimbulkan miskonsepsi pada murid.","Ada ketidaktepatan kecil pada istilah, contoh, atau notasi, tetapi tidak menimbulkan miskonsepsi mendasar.","Konsep, contoh, istilah, dan notasi benar dan sesuai dengan fase murid.","Konsep, contoh, istilah, dan notasi benar dan sesuai dengan fase murid, serta RPP mengantisipasi miskonsepsi yang mungkin muncul."]},{"no":10,"indikator":"RPP memuat aktivitas yang membuat murid terlibat aktif (melakukan, mengamati, berbicara, atau membuat sesuatu).","rubrik":["Murid hanya mendengarkan dan mencatat.","Murid terlibat aktif hanya pada sebagian kecil kegiatan (misalnya menjawab pertanyaan guru).","Murid terlibat aktif pada kegiatan inti dengan melakukan sesuatu (menyusun, mengukur, menggambar, atau berdiskusi).","Murid terlibat aktif pada hampir seluruh kegiatan, dan peran guru direncanakan sebagai fasilitator, bukan penyampai utama."]},{"no":11,"indikator":"RPP memuat aktivitas yang mengajak murid mengeksplorasi, mencoba, atau menemukan sendiri.","rubrik":["Tidak ada eksplorasi; murid hanya mengerjakan latihan soal.","Eksplorasi sangat terbatas; langkah dan jawaban sudah ditentukan guru.","Ada kegiatan yang meminta murid mencoba atau menemukan pola/ide dengan panduan guru.","Ada tantangan terbuka yang meminta murid mencoba, membandingkan cara, dan menemukan sendiri ide atau pola dengan panduan seperlunya."]},{"no":12,"indikator":"RPP memuat aktivitas yang mendorong kerja sama murid.","rubrik":["Seluruh kegiatan dikerjakan secara individu.","Ada kerja kelompok, tetapi tugas dapat dikerjakan oleh satu orang dan tidak ada pembagian peran.","Ada kerja berpasangan atau kelompok dengan tugas yang memerlukan kerja sama.","Ada kerja kelompok dengan peran atau tugas yang jelas, dan murid berbagi serta membandingkan hasil dengan kelompok lain."]},{"no":13,"indikator":"RPP memuat aktivitas yang melatih penalaran matematis murid (menduga, menjelaskan, membandingkan, atau memberi alasan).","rubrik":["Tidak ada kegiatan yang meminta alasan atau penjelasan; murid hanya diminta jawaban akhir.","Penalaran hanya muncul sebagai pertanyaan “mengapa?” singkat tanpa kegiatan khusus.","Ada kegiatan yang meminta murid menjelaskan atau membandingkan cara penyelesaian.","Ada kegiatan yang meminta murid menduga, menjelaskan, dan membenarkan idenya menggunakan benda, gambar, atau kata-kata."]},{"no":14,"indikator":"Tugas dan aktivitas dalam RPP sesuai dengan tujuan pembelajaran.","rubrik":["Sebagian besar tugas tidak berkaitan dengan tujuan pembelajaran.","Sebagian tugas berkaitan dengan tujuan, tetapi ada tugas inti yang tidak mengarah ke tujuan.","Seluruh tugas berkaitan dengan tujuan, tetapi belum jelas bagaimana hasil tugas menunjukkan tujuan tercapai.","Seluruh tugas berkaitan dengan tujuan, dan ada indikator atau penjelasan bagaimana hasil tugas menunjukkan tujuan tercapai."]},{"no":15,"indikator":"RPP memuat unsur yang dirancang membuat belajar terasa menggembirakan (misalnya permainan, lagu, gerak, cerita, atau tantangan).","rubrik":["Tidak ada unsur yang dirancang untuk membuat belajar menyenangkan.","Ada unsur menyenangkan (misalnya permainan atau lagu), tetapi terpisah dari konsep dan hanya berfungsi sebagai selingan.","Ada unsur menyenangkan yang terkait langsung dengan konsep dan tujuan pembelajaran.","Unsur menyenangkan terintegrasi pada beberapa tahap dan menjadi sarana murid memahami konsep."]},{"no":16,"indikator":"RPP memberi ruang bagi beragam jawaban dan cara penyelesaian murid.","rubrik":["Hanya ada satu jawaban dan satu cara penyelesaian yang dianggap benar.","Kemungkinan jawaban lain disebutkan, tetapi tidak ada rencana cara menanggapinya.","RPP menyatakan murid boleh memakai cara berbeda dan mencantumkan cara menanggapinya.","RPP mencantumkan perkiraan beberapa cara atau jawaban murid (termasuk yang keliru) beserta rencana guru menanggapi masing-masing."]},{"no":17,"indikator":"RPP memuat pertanyaan lanjutan (probing) untuk menggali cara berpikir murid.","rubrik":["Tidak ada pertanyaan lanjutan.","Ada pertanyaan lanjutan yang bersifat umum (misalnya “mengapa?”) tanpa dituliskan secara konkret.","Ada beberapa pertanyaan lanjutan yang dituliskan dan relevan dengan konsep.","Ada rangkaian pertanyaan lanjutan bertingkat (cara, alasan, lalu pengembangan) yang dikaitkan dengan perkiraan jawaban murid."]},{"no":18,"indikator":"RPP merencanakan tanggapan guru yang membangun terhadap jawaban murid.","rubrik":["Tidak ada rencana tanggapan; jawaban murid langsung dinilai benar atau salah.","Tanggapan terbatas pada pujian atau koreksi langsung.","Ada rencana tanggapan yang membimbing murid memperbaiki sendiri jawabannya (misalnya pertanyaan penuntun).","Ada rencana tanggapan yang membimbing murid dan memanfaatkan jawaban keliru sebagai bahan belajar bersama."]},{"no":19,"indikator":"RPP memuat rencana diferensiasi bagi murid dengan kemampuan atau kebutuhan berbeda.","rubrik":["Tidak ada rencana diferensiasi.","Diferensiasi hanya disebut secara umum (misalnya “disesuaikan dengan kebutuhan murid”) tanpa uraian.","Ada rencana konkret untuk satu kelompok murid (yang perlu bantuan atau yang perlu tantangan).","Ada rencana konkret bagi murid yang perlu bantuan maupun yang perlu tantangan, termasuk perbedaan tugas, media, atau dukungan."]},{"no":20,"indikator":"RPP memuat kegiatan refleksi bagi murid.","rubrik":["Tidak ada kegiatan refleksi.","Refleksi dilakukan oleh guru (guru merangkum) tanpa melibatkan murid.","Ada refleksi dengan pertanyaan bagi murid (misalnya “apa yang kamu pelajari?”), tetapi bersifat umum.","Ada refleksi dengan pertanyaan spesifik yang mengajak murid menyadari apa yang dipelajari, bagaimana caranya, dan perasaannya, serta direncanakan bagaimana guru memakai hasilnya."]},{"no":21,"indikator":"RPP memuat penguatan konsep matematika di akhir pembelajaran.","rubrik":["Tidak ada penguatan konsep.","Penguatan berupa pengulangan rumus atau ringkasan guru tanpa kaitan dengan pengalaman murid.","Penguatan menegaskan konsep utama dengan merujuk pada hasil kegiatan murid.","Penguatan menegaskan konsep utama, merujuk pada hasil penemuan murid, dan meluruskan kemungkinan miskonsepsi."]},{"no":22,"indikator":"RPP memuat bentuk apresiasi terhadap proses belajar murid, bukan hanya hasil.","rubrik":["Tidak ada apresiasi.","Apresiasi bersifat umum (misalnya tepuk tangan untuk semua) atau hanya untuk jawaban yang benar.","Apresiasi ditujukan pada usaha atau cara berpikir murid.","Apresiasi ditujukan secara spesifik pada usaha dan cara berpikir murid, dengan bentuk beragam (lisan, tulisan, atau simbol) dan direncanakan untuk semua murid."]},{"no":23,"indikator":"RPP memuat penutup yang menyimpulkan pembelajaran bersama murid.","rubrik":["Tidak ada penutup.","Penutup berupa kesimpulan yang disampaikan sendiri oleh guru.","Penutup memuat kesimpulan yang disusun bersama murid (guru bertanya, murid menyimpulkan).","Penutup memuat kesimpulan yang disusun bersama murid dan mengaitkannya dengan pembelajaran berikutnya atau kehidupan sehari-hari."]}],"kelompok":{"1":"Tahap 1: Gali dan Eksplorasi","5":"Tahap 2: Muat Konten","10":"Tahap 3: Buat Aktivitas","16":"Tahap 4: Ikuti Pemikiran Murid","20":"Tahap 5: Rayakan dan Akhiri"}},"3":{"label":"LEVEL 3 — BEHAVIOR: Penerapan GEMBIRA di Kelas (Observasi Pembelajaran)","deskripsi":"","indikator":[{"no":1,"indikator":"Guru menggali pengetahuan dan pengalaman awal murid sebelum memperkenalkan konsep baru.","rubrik":["Guru langsung menyampaikan materi baru tanpa menanyakan atau mengamati pengetahuan awal murid.","Guru mengajukan satu atau dua pertanyaan umum (misalnya “masih ingat?”) lalu melanjutkan tanpa memakai jawaban murid.","Guru mengajukan beberapa pertanyaan atau memberi aktivitas yang menggali pengetahuan awal yang relevan, dan mendengarkan jawaban murid.","Guru menggali pengetahuan awal dengan lebih dari satu cara (pertanyaan dan aktivitas konkret) dan menyesuaikan kegiatan berikutnya berdasarkan jawaban murid."]},{"no":2,"indikator":"Guru menggunakan konteks nyata yang dekat dengan kehidupan murid.","rubrik":["Pembelajaran hanya memakai angka dan simbol tanpa konteks.","Konteks digunakan, tetapi tidak dikenal murid atau tidak diperlukan untuk memahami soal.","Konteks dikenal murid dan digunakan dalam kegiatan inti.","Konteks dekat dengan kehidupan murid, digunakan sepanjang pembelajaran, dan murid menyebutkan contoh dari pengalaman mereka sendiri."]},{"no":3,"indikator":"Guru mengajukan pertanyaan pemantik yang mendorong murid berpikir.","rubrik":["Guru tidak mengajukan pertanyaan yang mendorong murid berpikir.","Hampir semua pertanyaan guru bersifat tertutup (jawaban singkat benar/salah).","Guru mengajukan beberapa pertanyaan terbuka, tetapi sebagian besar pertanyaan lainnya tertutup.","Sebagian besar pertanyaan guru terbuka, dan murid memberi jawaban lebih dari satu kata atau menyertakan alasan."]},{"no":4,"indikator":"Guru membangun rasa ingin tahu murid.","rubrik":["Tidak ada murid yang bertanya, menebak, atau mencoba atas inisiatif sendiri; murid menunggu instruksi.","Kurang dari separuh murid bertanya, menebak, atau mencoba atas inisiatif sendiri.","Separuh hingga tiga perempat murid bertanya, menebak, atau mencoba atas inisiatif sendiri.","Hampir semua murid (lebih dari tiga perempat) bertanya, menebak, atau mencoba atas inisiatif sendiri tanpa harus diminta berulang kali."]},{"no":5,"indikator":"Guru membangun konsep secara bertahap dari pengalaman konkret.","rubrik":["Guru langsung memberikan rumus, aturan, atau cara penyelesaian, lalu murid berlatih.","Guru menjelaskan konsep tahap demi tahap, tetapi tanpa benda atau gambar sehingga urutannya melompat ke simbol.","Guru menyajikan konsep dari benda atau pengalaman konkret ke simbol dengan urutan runtut, tetapi murid lebih banyak menerima penjelasan.","Murid membangun konsep melalui pengalaman konkret, gambar/representasi, lalu simbol, dan hubungan antartahap diungkapkan murid atau dimunculkan lewat pertanyaan guru."]},{"no":6,"indikator":"Guru menghubungkan konsep baru dengan konsep atau pengalaman sebelumnya.","rubrik":["Guru tidak menghubungkan konsep dengan pembelajaran atau pengalaman sebelumnya.","Guru menyebut keterkaitan sekilas (misalnya “kemarin kita sudah belajar”) tanpa memakainya dalam kegiatan.","Guru menghubungkan konsep baru dengan satu konsep atau pengalaman sebelumnya secara spesifik dan memakainya dalam kegiatan.","Guru dan murid menghubungkan konsep baru dengan beberapa konsep atau konteks lain, dan murid dapat menyebutkan keterkaitannya."]},{"no":7,"indikator":"Guru menggunakan media atau alat bantu untuk membantu murid memahami konsep.","rubrik":["Tidak ada media atau alat bantu.","Media ada, tetapi hanya dipakai guru sebagai peraga atau tidak berkaitan dengan konsep.","Media dipakai murid dan membantu mereka mengerjakan tugas.","Murid memanipulasi media sendiri, dan media membantu mereka menjelaskan atau menemukan konsep."]},{"no":8,"indikator":"Guru menekankan pemahaman konsep, bukan hafalan atau prosedur semata.","rubrik":["Kegiatan didominasi menghafal fakta atau rumus dan mengulang prosedur.","Sebagian besar kegiatan berupa prosedur; pertanyaan “mengapa” hampir tidak muncul.","Kegiatan seimbang antara prosedur dan pemahaman; beberapa kali murid diminta menjelaskan alasan.","Sebagian besar kegiatan meminta murid menjelaskan, membandingkan, atau menunjukkan konsep dengan cara sendiri."]},{"no":9,"indikator":"Guru menyampaikan konsep matematika dengan benar.","rubrik":["Guru menyampaikan atau membenarkan konsep yang keliru sehingga berpotensi menimbulkan miskonsepsi.","Ada ketidaktepatan kecil pada istilah atau contoh yang tidak dikoreksi.","Konsep, istilah, dan contoh yang disampaikan guru benar.","Konsep, istilah, dan contoh benar, dan guru mengenali serta meluruskan miskonsepsi murid yang muncul."]},{"no":10,"indikator":"Murid terlibat aktif dalam kegiatan pembelajaran (melakukan, berbicara, atau membuat sesuatu).","rubrik":["Hampir sepanjang waktu murid hanya mendengarkan atau menyalin.","Kurang dari separuh murid terlibat aktif pada kegiatan inti.","Separuh hingga tiga perempat murid terlibat aktif pada kegiatan inti.","Hampir semua murid (lebih dari tiga perempat) terlibat aktif pada hampir seluruh kegiatan inti."]},{"no":11,"indikator":"Aktivitas mengajak murid mengeksplorasi, mencoba, atau menemukan sendiri.","rubrik":["Aktivitas berupa latihan soal rutin dengan langkah yang sudah ditentukan.","Ada sedikit kesempatan mencoba, tetapi langkah dan jawaban sudah diarahkan guru.","Murid mencoba dan menemukan pola atau ide dengan bimbingan guru.","Murid menyelidiki masalah terbuka, mencoba lebih dari satu cara, dan menemukan sendiri ide atau pola dengan bimbingan seperlunya."]},{"no":12,"indikator":"Murid bekerja sama dalam menyelesaikan tugas.","rubrik":["Murid bekerja sendiri sepanjang pembelajaran.","Murid duduk berkelompok, tetapi bekerja sendiri-sendiri atau hanya satu murid yang mengerjakan.","Sebagian besar murid saling berbicara dan berbagi untuk menyelesaikan tugas bersama.","Hampir semua murid berperan dalam kelompok (membagi tugas dan saling menjelaskan), dan kelompok membandingkan hasil."]},{"no":13,"indikator":"Kegiatan melatih penalaran matematis murid.","rubrik":["Murid hanya menyebut jawaban akhir.","Beberapa murid memberi alasan sederhana setelah diminta guru, tetapi tidak dikembangkan.","Sebagian besar murid yang ditanya dapat menjelaskan cara atau alasannya dengan kata-kata, gambar, atau benda.","Murid menduga, menjelaskan, dan membenarkan idenya, serta menanggapi ide teman."]},{"no":14,"indikator":"Aktivitas murid sesuai dengan tujuan pembelajaran.","rubrik":["Aktivitas yang dilakukan murid tidak mengarah pada tujuan pembelajaran.","Sebagian aktivitas mengarah pada tujuan, tetapi aktivitas inti melenceng.","Seluruh aktivitas mengarah pada tujuan pembelajaran.","Seluruh aktivitas mengarah pada tujuan pembelajaran, dan guru memeriksa (melalui pertanyaan atau hasil kerja) apakah tujuan tercapai."]},{"no":15,"indikator":"Suasana belajar terasa menggembirakan bagi murid (tampak dari ekspresi dan perilaku murid).","rubrik":["Sebagian besar murid tampak pasif, tegang, atau tidak tertarik (misalnya diam, menunduk, atau melamun).","Beberapa murid tampak senang pada bagian tertentu (permainan atau lagu), tetapi kembali pasif saat mengerjakan konsep.","Sebagian besar murid tampak senang dan bersemangat (tersenyum, tertawa, atau bersuara antusias) selama sebagian besar kegiatan.","Hampir semua murid tampak senang dan bersemangat sepanjang pembelajaran, termasuk saat mengerjakan tugas matematika (bukan hanya saat selingan)."]},{"no":16,"indikator":"Guru memberi ruang bagi beragam jawaban dan cara penyelesaian murid.","rubrik":["Guru mengabaikan jawaban murid atau langsung menyalahkannya.","Guru hanya menerima satu jawaban atau satu cara yang dianggap benar.","Guru menerima dan menanggapi beberapa jawaban atau cara yang berbeda.","Guru mengundang jawaban dan cara yang berbeda, menampilkan beberapa di antaranya, dan membandingkannya bersama murid."]},{"no":17,"indikator":"Guru mengajukan pertanyaan lanjutan (probing) untuk menggali cara berpikir murid.","rubrik":["Guru tidak mengajukan pertanyaan lanjutan setelah murid menjawab.","Guru mengajukan pertanyaan lanjutan 1–2 kali selama pembelajaran.","Guru mengajukan pertanyaan lanjutan 3–4 kali, kepada murid yang berbeda.","Guru mengajukan pertanyaan lanjutan 5 kali atau lebih, bertingkat (cara, alasan, lalu pengembangan), kepada murid yang berbeda-beda."]},{"no":18,"indikator":"Guru menanggapi jawaban murid secara membangun.","rubrik":["Guru langsung mengoreksi atau memberi jawaban benar ketika murid keliru.","Guru memberi tanggapan umum (pujian atau “salah”) tanpa membimbing murid.","Guru membimbing murid memperbaiki jawabannya dengan pertanyaan penuntun.","Guru membimbing murid memperbaiki jawabannya dan memanfaatkan jawaban keliru sebagai bahan belajar bagi seluruh kelas."]},{"no":19,"indikator":"Guru mengakomodasi perbedaan kemampuan dan kebutuhan murid (diferensiasi).","rubrik":["Seluruh murid mengerjakan tugas yang sama dengan bantuan yang sama.","Guru membantu murid tertentu hanya jika murid meminta.","Guru secara sengaja memberi bantuan atau tantangan berbeda kepada satu kelompok murid (yang perlu bantuan atau yang cepat selesai).","Guru secara sengaja menyesuaikan tugas, media, atau bantuan bagi murid yang perlu bantuan maupun yang perlu tantangan."]},{"no":20,"indikator":"Murid melakukan refleksi pembelajaran.","rubrik":["Tidak ada kegiatan refleksi.","Hanya guru yang merangkum atau menilai pembelajaran.","Kurang dari separuh murid menyampaikan apa yang dipelajari atau dirasakan.","Sebagian besar murid menyampaikan (lisan, tulisan, atau gambar) apa yang dipelajari, bagaimana caranya, dan perasaannya."]},{"no":21,"indikator":"Guru memperkuat konsep matematika di akhir pembelajaran.","rubrik":["Guru tidak menegaskan konsep utama.","Guru mengulang rumus atau ringkasan tanpa mengaitkannya dengan kegiatan murid.","Guru menegaskan konsep utama dengan merujuk pada hasil kerja murid.","Guru menegaskan konsep utama dengan merujuk pada hasil kerja murid, meluruskan miskonsepsi yang muncul, dan murid dapat menyebutkan konsep utama dengan kata-katanya sendiri."]},{"no":22,"indikator":"Guru mengapresiasi proses belajar murid, bukan hanya hasil.","rubrik":["Tidak ada apresiasi.","Apresiasi bersifat umum (misalnya “bagus”) atau hanya untuk jawaban yang benar.","Guru mengapresiasi usaha atau cara berpikir murid secara spesifik kepada beberapa murid.","Guru mengapresiasi usaha dan cara berpikir murid secara spesifik kepada sedikitnya lima murid yang berbeda, termasuk murid yang belum berhasil."]},{"no":23,"indikator":"Guru menutup pembelajaran dengan menyimpulkan bersama murid.","rubrik":["Pembelajaran berakhir tanpa penutup (misalnya waktu habis).","Guru menyampaikan kesimpulan sendiri.","Guru menyusun kesimpulan bersama murid melalui tanya jawab.","Guru menyusun kesimpulan bersama murid dan mengaitkannya dengan pembelajaran berikutnya atau kehidupan sehari-hari murid."]}],"kelompok":{"1":"Tahap 1: Gali dan Eksplorasi","5":"Tahap 2: Muat Konten","10":"Tahap 3: Buat Aktivitas","16":"Tahap 4: Ikuti Pemikiran Murid","20":"Tahap 5: Rayakan dan Akhiri"}},"4":{"label":"LEVEL 4 — RESULTS: Perubahan pada Guru, Murid, dan Budaya Sekolah","deskripsi":"","indikator":[{"no":1,"indikator":"Guru menerapkan alur pembelajaran GEMBIRA di kelasnya setelah mengikuti kegiatan.","rubrik":["Guru tidak pernah menerapkan alur GEMBIRA dalam pembelajaran.","Guru menerapkan alur GEMBIRA sebanyak 1 kali.","Guru menerapkan alur GEMBIRA sebanyak 2–3 kali.","Guru menerapkan alur GEMBIRA sebanyak 4 kali atau lebih, atau pada sebagian besar pertemuan matematika."]},{"no":2,"indikator":"Guru menyusun sendiri perangkat pembelajaran bernuansa GEMBIRA.","rubrik":["Guru tidak menyusun perangkat pembelajaran bernuansa GEMBIRA.","Guru menyusun perangkat dengan menyalin hampir seluruhnya dari contoh pelatihan.","Guru menyusun perangkat sendiri dengan menyesuaikan contoh pelatihan untuk kelas dan murid yang diajarnya.","Guru menyusun perangkat sendiri untuk materi baru yang tidak ada dalam contoh pelatihan."]},{"no":3,"indikator":"Guru membagikan praktik GEMBIRA kepada guru lain.","rubrik":["Guru tidak pernah membagikan praktik GEMBIRA kepada guru lain.","Guru bercerita tentang praktik GEMBIRA kepada rekan secara informal.","Guru membagikan praktik GEMBIRA dalam satu forum (misalnya KKG atau rapat guru).","Guru membagikan praktik GEMBIRA dalam forum dan memperagakannya kepada rekan (misalnya kelas terbuka atau saling mengamati)."]},{"no":4,"indikator":"Kemampuan numerasi murid: menyelesaikan masalah matematika kontekstual.","rubrik":["Tidak ada murid yang kini mampu menyelesaikan masalah matematika kontekstual (cerita sehari-hari atau benda nyata) yang sebelumnya sulit mereka selesaikan (tidak ada perubahan dibandingkan sebelumnya).","Kurang dari separuh murid kini mampu menyelesaikan masalah matematika kontekstual (cerita sehari-hari atau benda nyata) yang sebelumnya sulit mereka selesaikan.","Separuh hingga tiga perempat murid kini mampu menyelesaikan masalah matematika kontekstual (cerita sehari-hari atau benda nyata) yang sebelumnya sulit mereka selesaikan.","Lebih dari tiga perempat murid kini mampu menyelesaikan masalah matematika kontekstual (cerita sehari-hari atau benda nyata) yang sebelumnya sulit mereka selesaikan."]},{"no":5,"indikator":"Keaktifan murid dalam pembelajaran matematika.","rubrik":["Tidak ada murid yang kini terlibat aktif dalam pembelajaran matematika (mencoba, bertanya, menjawab, atau mengerjakan tugas tanpa harus selalu diminta) (tidak ada perubahan dibandingkan sebelumnya).","Kurang dari separuh murid kini terlibat aktif dalam pembelajaran matematika (mencoba, bertanya, menjawab, atau mengerjakan tugas tanpa harus selalu diminta).","Separuh hingga tiga perempat murid kini terlibat aktif dalam pembelajaran matematika (mencoba, bertanya, menjawab, atau mengerjakan tugas tanpa harus selalu diminta).","Lebih dari tiga perempat murid kini terlibat aktif dalam pembelajaran matematika (mencoba, bertanya, menjawab, atau mengerjakan tugas tanpa harus selalu diminta)."]},{"no":6,"indikator":"Keberanian murid menyampaikan pendapat.","rubrik":["Tidak ada murid yang kini berani menyampaikan pendapat atau jawabannya di depan teman, termasuk ketika belum yakin benar (tidak ada perubahan dibandingkan sebelumnya).","Kurang dari separuh murid kini berani menyampaikan pendapat atau jawabannya di depan teman, termasuk ketika belum yakin benar.","Separuh hingga tiga perempat murid kini berani menyampaikan pendapat atau jawabannya di depan teman, termasuk ketika belum yakin benar.","Lebih dari tiga perempat murid kini berani menyampaikan pendapat atau jawabannya di depan teman, termasuk ketika belum yakin benar."]},{"no":7,"indikator":"Kemampuan murid menjelaskan cara berpikirnya.","rubrik":["Tidak ada murid yang kini mampu menjelaskan cara berpikirnya dengan kata-kata, gambar, atau benda (tidak ada perubahan dibandingkan sebelumnya).","Kurang dari separuh murid kini mampu menjelaskan cara berpikirnya dengan kata-kata, gambar, atau benda.","Separuh hingga tiga perempat murid kini mampu menjelaskan cara berpikirnya dengan kata-kata, gambar, atau benda.","Lebih dari tiga perempat murid kini mampu menjelaskan cara berpikirnya dengan kata-kata, gambar, atau benda."]},{"no":8,"indikator":"Minat murid terhadap pembelajaran matematika.","rubrik":["Tidak ada murid yang kini menunjukkan minat yang lebih tinggi pada matematika (tampak senang, meminta kegiatan matematika lagi, atau tidak menghindarinya) (tidak ada perubahan dibandingkan sebelumnya).","Kurang dari separuh murid kini menunjukkan minat yang lebih tinggi pada matematika (tampak senang, meminta kegiatan matematika lagi, atau tidak menghindarinya).","Separuh hingga tiga perempat murid kini menunjukkan minat yang lebih tinggi pada matematika (tampak senang, meminta kegiatan matematika lagi, atau tidak menghindarinya).","Lebih dari tiga perempat murid kini menunjukkan minat yang lebih tinggi pada matematika (tampak senang, meminta kegiatan matematika lagi, atau tidak menghindarinya)."]},{"no":9,"indikator":"Guru di sekolah berdiskusi atau merencanakan pembelajaran matematika bersama (KKG, komunitas belajar, atau diskusi terjadwal).","rubrik":["Tidak ada pertemuan guru yang membahas pembelajaran matematika.","Ada 1 kali pertemuan yang membahas pembelajaran matematika.","Ada 2 kali pertemuan yang membahas pembelajaran matematika.","Ada 3 kali pertemuan atau lebih (sekitar sebulan sekali) dan terdapat daftar hadir atau catatan hasil pertemuan."]},{"no":10,"indikator":"Guru terbiasa melakukan refleksi pembelajaran.","rubrik":["Guru tidak melakukan refleksi pembelajaran.","Guru sesekali melakukan refleksi, secara individu, dan tidak terdokumentasi.","Guru melakukan refleksi secara rutin (sedikitnya sebulan sekali) dan terdokumentasi (jurnal atau catatan).","Guru melakukan refleksi secara rutin dan terdokumentasi, serta ada contoh hasil refleksi yang dipakai memperbaiki pembelajaran berikutnya."]},{"no":11,"indikator":"Pembelajaran berbasis numerasi dan berpusat pada murid mulai diterapkan oleh guru lain di sekolah.","rubrik":["Tidak ada guru di sekolah yang menerapkan pembelajaran berbasis numerasi dan berpusat pada murid.","Hanya guru peserta kegiatan yang menerapkannya.","Guru peserta dan sedikitnya satu guru lain (bukan peserta) menerapkannya.","Guru peserta dan lebih dari separuh guru kelas/matematika lain di sekolah menerapkannya, tampak pada catatan supervisi atau perangkat ajar."]}],"kelompok":{"1":"A. Keberlanjutan Praktik Guru │ Responden: guru (diverifikasi kepala sekolah/pengawas)","4":"B. Perubahan pada Murid │ Responden: guru (dengan bukti hasil kerja/catatan), dapat dicek oleh kepala sekolah/pengawas │ Bandingkan dengan kondisi murid sebelum guru menerapkan GEMBIRA","9":"C. Perubahan pada Budaya Sekolah │ Responden: kepala sekolah/pengawas"}}}
                        GEMBIRA_JSON, true);

        $levelLabel = [
            1 => 'Level 1 - Reaction',
            2 => 'Level 2 - Learning',
            3 => 'Level 3 - Behavior',
            4 => 'Level 4 - Results',
        ];

        // Warna per level (sama dengan halaman BCKS dan BK)
        $levelStyles = [
            1 => ['badge' => 'background:#dbeafe;color:#1d4ed8', 'bar' => '#2563eb', 'row' => '#eff4ff'],
            2 => ['badge' => 'background:#ede9fe;color:#6d28d9', 'bar' => '#7c3aed', 'row' => '#f5f1ff'],
            3 => ['badge' => 'background:#d1fae5;color:#047857', 'bar' => '#059669', 'row' => '#eefaf4'],
            4 => ['badge' => 'background:#fef3c7;color:#b45309', 'bar' => '#d99a0b', 'row' => '#fffaea'],
        ];

        // Deskripsi level diambil dari judul instrumen (bagian setelah titik dua), bila ada.
        $levelDeskripsi = [];
        foreach ($levelLabel as $lv => $teks) {
            $judulPanjang = $levelData[(string) $lv]['label'] ?? '';
            $levelDeskripsi[$lv] = str_contains($judulPanjang, ': ')
                ? \Illuminate\Support\Str::after($judulPanjang, ': ')
                : '';
        }

        /*
        |--------------------------------------------------------------------------
        | Level yang berlaku berdasarkan jabatan penilai
        |--------------------------------------------------------------------------
        | Peserta Matematika GEMBIRA : Level 1, 2, 3, 4
        | Penilai lainnya            : Level 3 dan 4
        */
        $jabatanPenilai = $gembira->jabatan_penilai;
        $isPeserta = blank($jabatanPenilai) || $jabatanPenilai === 'Peserta Matematika GEMBIRA';
        $levelAktif = $isPeserta ? [1, 2, 3, 4] : [3, 4];

        /*
        |--------------------------------------------------------------------------
        | Rekap jawaban per level
        |--------------------------------------------------------------------------
        */
        $rekap = [];

        foreach ($levelAktif as $lv) {
            $raw = $gembira->{'level_' . $lv . '_jawaban'} ?? [];

            if (is_string($raw)) {
                $raw = json_decode($raw, true);
            }

            $raw = is_array($raw) ? $raw : [];

            $daftarIndikator = $levelData[(string) $lv]['indikator'] ?? [];
            $skorLevel = 0;
            $terisi = 0;
            $jumlahTd = 0;
            $baris = [];

            foreach ($daftarIndikator as $ind) {
                $item = $raw[$ind['no']] ?? $raw['indikator_' . $ind['no']] ?? null;

                if (is_array($item)) {
                    $nilai = $item['skor'] ?? $item['jawaban'] ?? null;
                    $bukti = $item['bukti'] ?? $item['catatan'] ?? null;
                    $alasan = $item['alasan_td'] ?? null;
                } else {
                    $nilai = $item;
                    $bukti = null;
                    $alasan = null;
                }

                $isTd = $nilai === 'TD';

                if ($isTd) {
                    $jumlahTd++;
                } elseif (is_numeric($nilai)) {
                    $skorLevel += (int) $nilai;
                    $terisi++;
                }

                $baris[$ind['no']] = [
                    'nilai' => $nilai,
                    'bukti' => $bukti,
                    'alasan' => $alasan,
                    'isTd' => $isTd,
                ];
            }

            $jumlahIndikator = count($daftarIndikator);
            $maksimum = ($jumlahIndikator - $jumlahTd) * 4;

            $rekap[$lv] = [
                'skor' => $skorLevel,
                'terisi' => $terisi,
                'td' => $jumlahTd,
                'total' => $jumlahIndikator,
                'max' => $maksimum,
                'rerata' => $terisi > 0 ? $skorLevel / $terisi : 0,
                'persen' => $maksimum > 0 ? ($skorLevel / $maksimum) * 100 : 0,
                'baris' => $baris,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Total, nilai akhir, dan predikat
        |--------------------------------------------------------------------------
        */
        $totalSkor = (int) collect($rekap)->sum('skor');
        $skorMaksimum = (int) collect($rekap)->sum('max');
        $terisiTotal = (int) collect($rekap)->sum('terisi');
        $tdTotal = (int) collect($rekap)->sum('td');
        $indikatorBerlaku = (int) collect($rekap)->sum('total') - $tdTotal;

        $rerataKeseluruhan = $terisiTotal > 0 ? $totalSkor / $terisiTotal : 0;
        $nilaiAkhir = $skorMaksimum > 0 ? ($totalSkor / $skorMaksimum) * 100 : 0;

        if ($terisiTotal === 0) {
            $predikat = '-';
        } elseif ($rerataKeseluruhan >= 3.5) {
            $predikat = 'Sangat Baik';
        } elseif ($rerataKeseluruhan >= 2.75) {
            $predikat = 'Baik';
        } elseif ($rerataKeseluruhan >= 2.0) {
            $predikat = 'Cukup';
        } else {
            $predikat = 'Perlu pendampingan intensif';
        }

        $predikatStyle = match ($predikat) {
            'Sangat Baik' => 'background:#d1fae5;color:#047857',
            'Baik' => 'background:#dbeafe;color:#1d4ed8',
            'Cukup' => 'background:#fef3c7;color:#b45309',
            '-' => 'background:#f1f5f9;color:#475569',
            default => 'background:#ffe4e6;color:#be123c',
        };

        $status = $gembira->status ?? 'Draft';

        $statusStyle = $status === 'Selesai'
            ? 'background:#d1fae5;color:#047857'
            : 'background:#fef3c7;color:#b45309';

        $adaObservasi = $gembira->tanggal_observasi ||
            $gembira->durasi_pembelajaran ||
            $gembira->jumlah_murid_hadir !== null ||
            $gembira->observasi_ke !== null;
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
            .d-info.c4 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
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

        .d-info-wide {
            grid-column: 1 / -1;
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
        }

        /* --- keadaan kosong --- */
        .d-empty {
            padding: 40px 24px;
            text-align: center;
            background: #fff;
            border: 1px dashed #cbd5e6;
            border-radius: 18px;
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
            font-size: 13px;
            font-weight: 700;
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
            margin-top: 10px;
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

        .d-table .note {
            font-size: 12.5px;
            line-height: 1.7;
            color: #475569;
            white-space: pre-line;
        }

        .d-table td.d-group-cell {
            padding: 11px 16px;
            font-size: 12.5px;
            font-weight: 700;
            color: var(--ink);
        }

        .d-score {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 11px;
            background: var(--p-600);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
        }

        .d-td {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 34px;
            padding: 0 12px;
            border-radius: 11px;
            background: #fef3c7;
            color: #b45309;
            font-size: 12px;
            font-weight: 700;
        }

        .d-faint {
            font-size: 12px;
            color: #94a3b8;
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Hasil Penilaian <b>Matematika GEMBIRA</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('gembira.index') }}">Instrumen Pemantauan</a>
                        &nbsp;›&nbsp; Matematika GEMBIRA
                    </p>
                    <p class="d-desc">Informasi biodata dan hasil penilaian Matematika GEMBIRA.</p>
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
                    <a href="{{ route('gembira.cetak', $gembira) }}" target="_blank" class="d-pbtn b-mint">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                            <path d="M6 14h12v7H6z" />
                        </svg>
                        Cetak Hasil
                    </a>

                    {{-- Gabung PDF --}}
                    <a href="{{ route('cetak-gabungan.index', ['pilih' => ['gembira-' . $gembira->id]]) }}"
                        class="d-pbtn b-violet">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 3h7l5 5v9a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2z" />
                            <path d="M16 3v5h5" />
                            <path d="M17 21H6a2 2 0 01-2-2V9" />
                        </svg>
                        Gabung PDF
                    </a>

                    {{-- Edit Pengisian --}}
                    <a href="{{ route('gembira.edit', $gembira) }}" class="d-pbtn b-amber">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Pengisian
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

            {{-- Total Skor --}}
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
                <p class="d-tile-label">Total Skor</p>
                <p class="d-tile-val">{{ $totalSkor }}<small> / {{ $skorMaksimum }}</small></p>
                <p class="d-tile-note">Akumulasi {{ $indikatorBerlaku }} indikator sesuai jabatan penilai</p>
            </div>

            {{-- Nilai Akhir --}}
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
                        <path d="M19 5L5 19" />
                        <circle cx="6.5" cy="6.5" r="2.5" />
                        <circle cx="17.5" cy="17.5" r="2.5" />
                    </svg>
                </span>
                <p class="d-tile-label">Nilai Akhir</p>
                <p class="d-tile-val">{{ number_format($nilaiAkhir, 2, ',', '.') }}<small> %</small></p>
                <p class="d-tile-note">Persentase dari skor maksimum indikator yang berlaku</p>
            </div>

            {{-- Predikat --}}
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
                <p class="d-tile-label">Predikat</p>
                <div style="margin-top:8px">
                    <span class="d-badge lg" style="{{ $predikatStyle }}">{{ $predikat }}</span>
                </div>
                <p class="d-tile-note">
                    Rerata skor {{ number_format($rerataKeseluruhan, 2, ',', '.') }} dari skala 1-4
                </p>
            </div>

        </div>

        {{-- ================= A. IDENTITAS GURU DAN SEKOLAH ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">A. Identitas Guru dan Sekolah</h2>
                    <p class="d-card-s">Informasi guru dan konteks pembelajaran yang dinilai.</p>
                </div>
            </div>

            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Guru</p>
                    <p class="d-info-val">{{ $gembira->nama_guru ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Nama Sekolah</p>
                    <p class="d-info-val">{{ $gembira->nama_sekolah ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Kelas / Fase</p>
                    <p class="d-info-val">{{ $gembira->kelas_fase ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Topik / Materi</p>
                    <p class="d-info-val">{{ $gembira->topik_materi ?: '-' }}</p>
                </div>
            </div>
        </section>

        {{-- ================= B. IDENTITAS RESPONDEN DAN PETUGAS MONEV ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">B. Identitas Responden dan Petugas Monev</h2>
                    <p class="d-card-s">Jabatan penilai menentukan level yang berlaku.</p>
                </div>
            </div>

            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Petugas Monev</p>
                    <p class="d-info-val">{{ $gembira->nama_petugas_monev ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Jabatan Penilai</p>
                    <p class="d-info-val">{{ $jabatanPenilai ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Tanggal Monev</p>
                    <p class="d-info-val">{{ $gembira->tanggal_monev?->format('d-m-Y') ?? '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Status Pengisian</p>
                    <div style="margin-top:6px">
                        <span class="d-badge" style="{{ $statusStyle }}">{{ $status }}</span>
                    </div>
                </div>

                <div class="d-info-wide">
                    <p class="d-info-label">Sumber Data / Bukti</p>
                    <p class="d-info-val" style="white-space:pre-line">{{ $gembira->sumber_data_bukti ?: '-' }}</p>
                </div>
            </div>
        </section>

        {{-- ================= C. INFORMASI OBSERVASI (LEVEL 3) ================= --}}
        @if ($adaObservasi)
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">C. Informasi Observasi</h2>
                        <p class="d-card-s">Metadata observasi pembelajaran (Level 3).</p>
                    </div>
                </div>

                <div class="d-info c4">
                    <div>
                        <p class="d-info-label">Tanggal Observasi</p>
                        <p class="d-info-val">{{ $gembira->tanggal_observasi?->format('d-m-Y') ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="d-info-label">Durasi Pembelajaran</p>
                        <p class="d-info-val">{{ $gembira->durasi_pembelajaran ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="d-info-label">Jumlah Murid Hadir</p>
                        <p class="d-info-val">{{ $gembira->jumlah_murid_hadir ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="d-info-label">Observasi Ke-</p>
                        <p class="d-info-val">{{ $gembira->observasi_ke ?? '-' }}</p>
                    </div>
                </div>
            </section>
        @endif

        @if ($terisiTotal === 0 && $tdTotal === 0)

            {{-- ================= BELUM ADA JAWABAN ================= --}}
            <div class="d-empty">
                <p class="d-card-h">Belum ada jawaban penilaian tersimpan.</p>
                <p class="d-card-s" style="margin-top:6px">
                    Data yang tersimpan saat ini mungkin baru berupa biodata.
                </p>
            </div>

        @else

            {{-- ================= REKAP PER LEVEL ================= --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Rekapitulasi Berdasarkan Level</h2>
                        <p class="d-card-s">
                            Ringkasan skor untuk level evaluasi yang berlaku bagi
                            {{ $isPeserta ? 'peserta Matematika GEMBIRA (Level 1-4)' : 'jabatan penilai ini (Level 3 dan 4)' }}.
                        </p>
                    </div>

                    <span class="d-pill">{{ count($levelAktif) }} level</span>
                </div>

                <div class="d-levels {{ count($levelAktif) === 4 ? 'four' : '' }}">
                    @foreach ($levelAktif as $lv)
                        @php $r = $rekap[$lv]; @endphp

                        <div class="d-level">
                            <div>
                                <span class="d-badge" style="{{ $levelStyles[$lv]['badge'] }}">{{ $levelLabel[$lv] }}</span>
                            </div>

                            <p class="d-level-desc">
                                {{ $levelDeskripsi[$lv] ?: $r['terisi'] . ' dari ' . $r['total'] . ' indikator terisi.' }}
                            </p>

                            <div class="d-level-row">
                                <div class="d-level-score">
                                    {{ $r['skor'] }}<small> / {{ $r['max'] }}</small>
                                </div>

                                <span class="d-level-pct">{{ number_format($r['persen'], 2, ',', '.') }}%</span>
                            </div>

                            <div class="d-bar">
                                <span
                                    style="width: {{ min($r['persen'], 100) }}%;background: {{ $levelStyles[$lv]['bar'] }}"></span>
                            </div>

                            <p class="d-level-foot">
                                Rerata {{ number_format($r['rerata'], 2, ',', '.') }}
                                · {{ $r['terisi'] }}/{{ $r['total'] }} indikator terisi
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- ================= DETAIL INDIKATOR PER LEVEL ================= --}}
            @foreach ($levelAktif as $lv)
                @php
                    $r = $rekap[$lv];
                    $levelInfo = $levelData[(string) $lv];
                    $adaBukti = in_array($lv, [2, 3, 4], true);
                    $jumlahKolom = $adaBukti ? 4 : 3;
                @endphp

                <section class="d-card">
                    <div class="d-card-top">
                        <div>
                            <h2 class="d-card-h">{{ $levelLabel[$lv] }}</h2>
                            <p class="d-card-s">
                                Detail penilaian {{ $r['total'] }} indikator
                                @if ($levelDeskripsi[$lv])
                                    : {{ $levelDeskripsi[$lv] }}
                                @endif
                            </p>
                        </div>

                        <span class="d-pill">{{ $r['terisi'] }} dari {{ $r['total'] }} terisi</span>
                    </div>

                    <div style="overflow-x:auto">
                        <table class="d-table" style="min-width: {{ $adaBukti ? '800px' : '600px' }}">
                            <thead>
                                <tr>
                                    <th style="width:70px">No</th>
                                    <th>Indikator</th>
                                    @if ($adaBukti)
                                        <th>Bukti / Catatan</th>
                                    @endif
                                    <th class="center" style="width:110px">Skor</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($levelInfo['indikator'] as $ind)
                                    @if (isset($levelInfo['kelompok'][(string) $ind['no']]))
                                        <tr>
                                            <td colspan="{{ $jumlahKolom }}" class="d-group-cell"
                                                style="background: {{ $levelStyles[$lv]['row'] }}">
                                                {{ $levelInfo['kelompok'][(string) $ind['no']] }}
                                            </td>
                                        </tr>
                                    @endif

                                    @php $b = $r['baris'][$ind['no']]; @endphp

                                    <tr class="d-data">
                                        <td class="txt">{{ $ind['no'] }}</td>

                                        <td class="q">{{ $ind['indikator'] }}</td>

                                        @if ($adaBukti)
                                            <td class="note">{{ $b['bukti'] ?: ($b['alasan'] ?: '-') }}</td>
                                        @endif

                                        <td style="text-align:center">
                                            @if ($b['isTd'])
                                                <span class="d-td">TD</span>
                                            @elseif (is_numeric($b['nilai']))
                                                <span class="d-score">{{ $b['nilai'] }}</span>
                                            @else
                                                <span class="d-faint">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            @endforeach

        @endif

    </div>
@endsection