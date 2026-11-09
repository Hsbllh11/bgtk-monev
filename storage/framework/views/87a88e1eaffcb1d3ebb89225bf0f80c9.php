<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Evaluasi Dampak - MANDALIKA BGTK NTB</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <style>
        /* ===================== TOKEN WARNA (Sama dengan Form Lainnya) ===================== */
        :root {
            --p-50: #eff4ff;
            --p-100: #dbe7fe;
            --p-200: #bfd4fb;
            --p-500: #3b82f6;
            --p-600: #2563eb;
            --p-700: #1d4ed8;
            --ink: #0f1b3d;
            --muted: #64748b;
            --line: #e6ebf5;
        }

        .d-wrap { display: flex; flex-direction: column; gap: 22px; }
        .d-form { display: flex; flex-direction: column; gap: 22px; }

        .d-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .d-card-h { font-size: 16px; font-weight: 700; color: var(--ink); letter-spacing: -.01em; }
        .d-card-s { margin-top: 2px; font-size: 12.5px; color: var(--muted); }

        .d-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            padding: 20px 20px 14px;
            border-bottom: 1px solid var(--line);
        }

        /* --- judul halaman --- */
        .d-title-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        @media (max-width: 640px) { .d-title-row { flex-direction: column; } }

        .d-h1 { font-size: 24px; font-weight: 400; letter-spacing: -.02em; color: var(--ink); line-height: 1.2; }
        .d-h1 b { font-weight: 700; }
        .d-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }

        /* --- tombol --- */
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
        
        .b-blue {
            --b-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%);
            --b-line: #c6d8fb;
            --b-ink: #1d4ed8;
            --b-glow: rgba(37, 99, 235, .7);
        }

        .d-foot { display: flex; justify-content: flex-end; gap: 12px; flex-wrap: wrap; padding-top: 10px; }

        /* --- form --- */
        .d-form-grid {
            display: grid;
            gap: 18px;
            padding: 20px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-form-grid.c2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .d-form-grid .span2 { grid-column: 1 / -1; }
        }

        .d-label { display: block; margin-bottom: 8px; font-size: 12.5px; font-weight: 600; color: var(--ink); }
        .d-label i { color: #e11d48; font-style: normal; }

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

        textarea.d-field { height: auto; padding: 11px 14px; line-height: 1.6; resize: vertical; }
        .d-field::placeholder { color: #94a3b8; }
        .d-field:focus { border-color: var(--p-500); box-shadow: 0 0 0 4px var(--p-100); }

        /* --- kustomisasi item pertanyaan & radio --- */
        .q-item { padding: 20px; border-bottom: 1px dashed var(--line); }
        .q-item:last-child { border-bottom: none; }
        .q-text { font-size: 13.5px; font-weight: 600; color: var(--ink); margin-bottom: 14px; display: block; line-height: 1.6; }
        
        .d-opts { display: grid; gap: 10px; margin-top: 14px; grid-template-columns: repeat(2, minmax(0, 1fr)); }
        @media (min-width: 640px) {
            .d-opts { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        }

        .d-opt {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #fff;
            cursor: pointer;
            transition: border-color .2s, background .2s;
        }

        .d-opt:hover { border-color: var(--p-200); background: #f7f9ff; }
        .d-opt:has(input:checked) { border-color: var(--p-500); background: var(--p-50); box-shadow: 0 0 0 3px var(--p-100); }
        
        .d-radio { width: 18px; height: 18px; margin: 0; cursor: pointer; accent-color: var(--p-600); }
        
        .opt-label { font-size: 12.5px; font-weight: 600; color: #475569; }
        .d-opt:has(input:checked) .opt-label { color: var(--p-700); }
    </style>
</head>
<body class="bg-slate-50 min-h-screen pb-20">
    
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-10">
        <div class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-lg font-bold text-slate-800">Evaluasi Dampak STEM</h1>
                <p class="text-xs text-slate-500">Isi sesuai dengan fakta yang dialami</p>
            </div>
            
            <img src="<?php echo e(asset('images/Logotutwurihandayani.png')); ?>" alt="Logo" style="height: 40px; width: auto; object-fit: contain;">
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 mt-8 d-wrap">
        <form action="<?php echo e(route('public.evaluasi.store', $invitation->token)); ?>" method="POST" class="d-form">
            <?php echo csrf_field(); ?>

            <!-- Identitas -->
            <div class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Identitas Responden</h2>
                        <p class="d-card-s">Informasi dasar mengenai Anda.</p>
                    </div>
                </div>
                
                <div class="d-form-grid c2">
                    <div>
                        <label class="d-label">Nama Lengkap <i>*</i></label>
                        <input type="text" name="nama_responden" required class="d-field" placeholder="Masukkan nama">
                    </div>
                    <div>
                        <label class="d-label">Asal Satuan Pendidikan <i>*</i></label>
                        <input type="text" name="asal_sekolah" required class="d-field" placeholder="Contoh: SDN 1 Mataram">
                    </div>
                    <div>
                        <label class="d-label">Kabupaten/Kota</label>
                        <input type="text" name="kabupaten_kota" class="d-field" placeholder="Masukkan Kabupaten/Kota">
                    </div>
                    <div>
                        <label class="d-label">Anda adalah <i>*</i></label>
                        <select name="peran_responden" id="peran" required class="d-field" onchange="toggleForm()">
                            <option value="Pendidik">Pendidik / Guru</option>
                            <option value="Murid">Murid</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- FORM PENDIDIK (Hanya muncul jika pilih Pendidik) -->
            <div id="form-pendidik" class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Instrumen Pendidik</h2>
                        <p class="d-card-s">Skala: 1 = Tidak Pernah, 2 = Jarang, 3 = Sering, 4 = Selalu.</p>
                    </div>
                </div>
                
                <div>
                    <?php
                        $pendidikQs = [
                            'pendidik_perencanaan' => [
                                'Saya merancang pembelajaran yang mengintegrasikan sains, teknologi, enjinering, dan matematika secara terpadu.',
                                'Saya menyusun tujuan pembelajaran yang menekankan pada kemampuan berpikir kritis, kreatif, dan pemecahan masalah.',
                                'Saya menyiapkan bahan ajar dan proyek yang relevan dengan konteks kehidupan nyata murid.',
                                'Saya mengembangkan RPP yang mendukung eksplorasi eksperimen murid.'
                            ],
                            'pendidik_pelaksanaan' => [
                                'Saya memulai pembelajaran dengan masalah kontekstual yang menantang rasa ingin tahu murid.',
                                'Saya memfasilitasi murid untuk melakukan eksperimen, desain, dan inovasi dalam menyelesaikan masalah.',
                                'Saya mengarahkan murid untuk mengaitkan konsep dari berbagai mata pelajaran dalam proyek STEM.',
                                'Saya menciptakan suasana belajar yang kolaboratif dan mendorong kerja tim antar murid.',
                                'Saya memanfaatkan teknologi dan alat digital untuk mendukung kegiatan pembelajaran STEM.'
                            ],
                            'pendidik_evaluasi_refleksi' => [
                                'Saya menggunakan berbagai bentuk asesmen (produk, proses, dan sikap) dalam menilai hasil belajar murid.',
                                'Saya memberi umpan balik yang membantu murid memperbaiki dan mengembangkan solusi inovatif mereka.',
                                'Saya melakukan refleksi terhadap keberhasilan dan kendala dalam pelaksanaan pembelajaran STEM.',
                                'Saya menindaklanjuti hasil evaluasi untuk memperbaiki rencana pembelajaran berikutnya.'
                            ],
                            'pendidik_dampak_kualitas' => [
                                'Penerapan pembelajaran STEM meningkatkan partisipasi dan keterlibatan aktif murid.',
                                'Pembelajaran STEM membantu murid memahami konsep secara lebih mendalam dan aplikatif.',
                                'Murid menunjukkan peningkatan kreativitas dan kemampuan berpikir kritis setelah penerapan STEM.',
                                'Pembelajaran STEM meningkatkan kemampuan kolaborasi dan komunikasi murid.',
                                'Penerapan pembelajaran STEM berkontribusi terhadap peningkatan hasil belajar murid secara keseluruhan.'
                            ],
                            'pendidik_pengembangan_profesional' => [
                                'Saya aktif mengikuti pelatihan, workshop, atau seminar terkait pembelajaran STEM.',
                                'Saya berbagi praktik baik pembelajaran STEM dengan rekan sejawat di sekolah.',
                                'Saya melakukan inovasi dalam pembelajaran dengan mengadaptasi pendekatan STEM sesuai kebutuhan murid.',
                                'Saya terdorong untuk terus meningkatkan kompetensi dalam mengembangkan proyek pembelajaran STEM.'
                            ]
                        ];
                    ?>

                    <?php $__currentLoopData = $pendidikQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="q-item">
                                <label class="q-text"><?php echo e($q); ?></label>
                                <div class="d-opts">
                                    <?php for($i = 1; $i <= 4; $i++): ?>
                                        <label class="d-opt">
                                            <input type="radio" name="<?php echo e($name); ?>[<?php echo e($index); ?>]" value="<?php echo e($i); ?>" required class="d-radio">
                                            <span class="opt-label">Skor <?php echo e($i); ?></span>
                                        </label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- FORM MURID (Hanya muncul jika pilih Murid) -->
            <div id="form-murid" class="d-card hidden">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Instrumen Murid</h2>
                        <p class="d-card-s">Skala: STS = Sangat Tidak Setuju, TS = Tidak Setuju, S = Setuju, SS = Sangat Setuju (1-4).</p>
                    </div>
                </div>
                
                <div>
                    <?php
                        $muridQs = [
                            'murid_iklim_kelas' => [
                                'Pendidik menciptakan suasana belajar yang membuat saya semangat untuk belajar.',
                                'Pendidik selalu memberikan dukungan ketika saya mengalami kesulitan memahami pelajaran.',
                                'Saya merasa nyaman mengemukakan pendapat dan ide di kelas.',
                                'Pendidik menghargai setiap usaha belajar yang saya lakukan.'
                            ],
                            'murid_lingkungan_suportif' => [
                                'Pendidik membantu saya tetap bersemangat dalam belajar meskipun tugas terasa sulit.',
                                'Saya merasa pendidik mendorong kami untuk berpikir, bertanya, dan mencari tahu lebih dalam.',
                                'Kegiatan belajar di kelas membuat saya ingin tahu lebih banyak.',
                                'Saya merasa didukung untuk terus mencoba hal-hal baru saat belajar.'
                            ],
                            'murid_kebebasan_eksplorasi' => [
                                'Saya diberi kesempatan mencoba berbagai cara untuk menyelesaikan tugas atau proyek.',
                                'Pendidik memberi kebebasan memilih topik atau cara belajar yang sesuai dengan minat saya.',
                                'Saya tidak takut mencoba ide baru meskipun bisa saja salah.',
                                'Pendidik menghargai perbedaan cara berpikir antara saya dan teman-teman lain.'
                            ],
                            'murid_penghargaan_kolaboratif' => [
                                'Pendidik mendorong kami untuk bekerja sama dalam memecahkan masalah atau membuat proyek.',
                                'Dalam kelompok, saya merasa ide saya didengarkan dan dihargai.',
                                'Saya belajar banyak dari hasil diskusi dan kerja sama dengan teman.',
                                'Proyek kelompok membantu saya memahami pelajaran dengan lebih baik.'
                            ],
                            'murid_keingintahuan' => [
                                'Pembelajaran di kelas membuat saya tertarik mencari tahu lebih banyak tentang suatu topik.',
                                'Pendidik sering memberi tantangan yang membuat saya ingin berpikir lebih dalam.',
                                'Saya sering mencari informasi tambahan di luar pelajaran karena rasa ingin tahu.',
                                'Saya menikmati kegiatan yang membuat saya berpikir kritis dan kreatif.'
                            ],
                            'murid_kepuasan' => [
                                'Saya merasa pembelajaran STEM membuat belajar menjadi lebih seru dan tidak membosankan.',
                                'Pembelajaran STEM dan PM membuat saya lebih paham mengapa suatu konsep penting.',
                                'Saya merasa lebih percaya diri untuk memecahkan masalah setelah mengikuti pembelajaran ini.',
                                'Saya puas dengan cara pendidik mengajar yang menggabungkan proyek, eksperimen, dan refleksi.'
                            ],
                            'murid_prinsip_mendalam' => [
                                'Saya merasa gembira dan nyaman selama proses pembelajaran berlangsung.',
                                'Pembelajaran di kelas membuat saya merasa terhubung dengan pengalaman hidup saya.',
                                'Saya menyadari mengapa dan untuk apa saya belajar setiap materi di kelas.',
                                'Pendidik membantu saya memahami makna di balik setiap kegiatan pembelajaran.',
                                'Saya merasa belajar bukan hanya untuk nilai, tetapi untuk mengembangkan diri saya.'
                            ],
                            'murid_perkembangan' => [
                                'Saya menjadi lebih percaya diri dalam menyampaikan pendapat.',
                                'Saya merasa kemampuan berpikir saya semakin berkembang.',
                                'Saya belajar menjadi lebih sabar, terbuka, dan menghargai perbedaan.',
                                'Saya merasa lebih bertanggung jawab terhadap tugas dan hasil belajar saya.'
                            ],
                            'murid_hasil_belajar' => [
                                'Saya memahami materi pelajaran dengan baik setelah mengikuti pembelajaran.',
                                'Saya dapat menerapkan apa yang saya pelajari untuk memecahkan masalah nyata.',
                                'Nilai saya meningkat dibandingkan sebelumnya.'
                            ]
                        ];
                    ?>

                    <?php $__currentLoopData = $muridQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="q-item">
                                <label class="q-text"><?php echo e($q); ?></label>
                                <div class="d-opts">
                                    <?php for($i = 1; $i <= 4; $i++): ?>
                                        <label class="d-opt">
                                            <input type="radio" name="<?php echo e($name); ?>[<?php echo e($index); ?>]" value="<?php echo e($i); ?>" class="d-radio">
                                            <span class="opt-label">
                                                <?php if($i == 1): ?> STS <?php elseif($i == 2): ?> TS <?php elseif($i == 3): ?> S <?php else: ?> SS <?php endif; ?>
                                            </span>
                                        </label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="d-foot">
                <button type="submit" class="d-pbtn b-blue">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Kirim Jawaban Evaluasi
                </button>
            </div>
        </form>
    </main>

    <!-- Script Toggle Form -->
    <script>
        function toggleForm() {
            const peran = document.getElementById('peran').value;
            const formPendidik = document.getElementById('form-pendidik');
            const formMurid = document.getElementById('form-murid');

            if (peran === 'Pendidik') {
                formPendidik.classList.remove('hidden');
                formMurid.classList.add('hidden');
                // Set required attributes
                formPendidik.querySelectorAll('input[type="radio"]').forEach(el => el.required = true);
                formMurid.querySelectorAll('input[type="radio"]').forEach(el => el.required = false);
            } else {
                formPendidik.classList.add('hidden');
                formMurid.classList.remove('hidden');
                // Set required attributes
                formPendidik.querySelectorAll('input[type="radio"]').forEach(el => el.required = false);
                formMurid.querySelectorAll('input[type="radio"]').forEach(el => el.required = true);
            }
        }
        // Panggil saat pertama kali load
        document.addEventListener('DOMContentLoaded', toggleForm);
    </script>
</body>
</html><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/public/evaluasi/create.blade.php ENDPATH**/ ?>