@extends('layouts.app')

@section('title', 'Gabung & Cetak PDF')
@section('page-title', 'Gabung & Cetak PDF')

@section('content')

<style>
    /* ===================== GABUNG & CETAK PDF — selaras dengan Dashboard & Instrumen =====================
       Token warna (--p-*, --ink, --muted, --line) dan font (Plus Jakarta Sans) berasal dari layout. */

    .i-wrap { display: flex; flex-direction: column; gap: 22px; padding-bottom: 24px; }

    /* --- judul halaman --- */
    .i-h1  { font-size: 28px; font-weight: 400; letter-spacing: -.02em; line-height: 1.2; color: var(--ink); }
    .i-h1 b { font-weight: 700; }
    .i-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }
    .i-sub { margin-top: 10px; max-width: 760px; font-size: 13px; line-height: 1.7; color: #475569; }

    /* --- kartu umum --- */
    .i-card   { overflow: hidden; background: #fff; border: 1px solid var(--line); border-radius: 18px; }
    .i-card-h { font-size: 16px; font-weight: 700; letter-spacing: -.01em; color: var(--ink); }
    .i-card-s { margin-top: 2px; font-size: 12.5px; color: var(--muted); }

    /* --- error validasi --- */
    .i-error {
        padding: 14px 16px; border: 1px solid #fecdd3; border-radius: 14px;
        background: #fff1f2; color: #be123c; font-size: 13px; line-height: 1.7;
    }

    /* --- filter (sama dengan halaman Instrumen / Wawancara) --- */
    .i-filter { padding: 20px; }
    .i-filter-grid { display: grid; gap: 16px; align-items: end; grid-template-columns: minmax(0, 1fr); }
    @media (min-width: 768px) { .i-filter-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    .i-label { display: block; margin-bottom: 8px; font-size: 12.5px; font-weight: 600; color: var(--ink); }
    .i-field {
        width: 100%; height: 44px; padding: 0 14px;
        border: 1px solid var(--line); border-radius: 12px; background: #fff; color: #334155;
        font-family: inherit; font-size: 13px; outline: none;
        transition: border-color .2s, box-shadow .2s;
    }
    .i-field::placeholder { color: #94a3b8; }
    .i-field:focus { border-color: var(--p-500); box-shadow: 0 0 0 4px var(--p-100); }

    /* --- kotak centang --- */
    .i-check {
        -webkit-appearance: none; appearance: none;
        display: inline-block; flex-shrink: 0; width: 18px; height: 18px; margin: 0;
        border: 1.5px solid #cbd5e1; border-radius: 6px; background-color: #fff;
        vertical-align: middle; cursor: pointer;
        transition: background-color .2s, border-color .2s, box-shadow .2s;
    }
    .i-check:hover { border-color: var(--p-500); }
    .i-check:focus-visible { outline: none; box-shadow: 0 0 0 4px var(--p-100); }
    .i-check:checked {
        background-color: var(--p-600); border-color: var(--p-600);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='3.2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M5 12.5l4.5 4.5L19 7.5'/%3E%3C/svg%3E");
        background-size: 80%; background-position: center; background-repeat: no-repeat;
    }

    /* --- kepala seksi --- */
    .i-head {
        display: flex; flex-direction: column; gap: 12px;
        padding: 20px 24px; border-bottom: 1px solid var(--line);
    }
    @media (min-width: 640px) { .i-head { flex-direction: row; align-items: center; justify-content: space-between; } }
    .i-selall {
        display: inline-flex; width: fit-content; align-items: center; gap: 10px;
        padding: 9px 14px; border: 1px solid var(--line); border-radius: 12px;
        background: var(--p-50); color: var(--p-700);
        font-size: 12.5px; font-weight: 600; cursor: pointer;
        transition: background .2s, border-color .2s;
    }
    .i-selall:hover { background: #fff; border-color: var(--p-200); }

    /* --- tabel --- */
    .i-scroll { width: 100%; min-width: 0; overflow-x: auto; scrollbar-width: thin; scrollbar-color: var(--p-200) transparent; }
    .i-scroll::-webkit-scrollbar { height: 6px; }
    .i-scroll::-webkit-scrollbar-thumb { background: var(--p-200); border-radius: 9999px; }
    .i-table { width: 100%; min-width: 700px; border-collapse: collapse; text-align: left; }
    .i-table th {
        padding: 14px 16px; white-space: nowrap;
        font-size: 12px; font-weight: 600; color: var(--muted);
        border-bottom: 1px solid var(--line);
    }
    .i-table td { padding: 14px 16px; vertical-align: middle; border-bottom: 1px solid var(--line); }
    .i-table tbody tr:last-child td { border-bottom: 0; }
    .i-table .c-pilih { width: 56px; padding-left: 24px; padding-right: 0; }
    .i-row { cursor: pointer; transition: background .2s; }
    .i-row:hover { background: #f7f9ff; }
    .i-row:has(input:checked) { background: var(--p-50); }
    .i-nowrap { white-space: nowrap; }
    .i-name { font-size: 13px; font-weight: 600; line-height: 1.4; color: var(--ink); }
    .i-cell { font-size: 13px; color: #475569; }

    /* lencana jenis: warna mengikuti data-jenis pada baris */
    .i-tagj {
        display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 8px;
        background: #eff6ff; border: 1px solid #bfdbfe; color: #1d4ed8;
        font-size: 11.5px; font-weight: 700; white-space: nowrap;
    }
    tr[data-jenis="BK"] .i-tagj        { background: #f5f3ff; border-color: #ddd6fe; color: #6d28d9; }
    tr[data-jenis="TENDIK"] .i-tagj    { background: #ecfdf5; border-color: #a7f3d0; color: #047857; }
    tr[data-jenis="GEMBIRA"] .i-tagj   { background: #fffbeb; border-color: #fde68a; color: #b45309; }
    tr[data-jenis="PKGSD MBI"] .i-tagj { background: #ecfeff; border-color: #a5f3fc; color: #0e7490; }

    .i-empty-row { padding: 40px 24px !important; text-align: center; font-size: 13px; color: #94a3b8; }

    /* --- bar aksi (menempel di bawah) --- */
    .i-bar {
        position: sticky; bottom: 0; z-index: 5;
        display: flex; flex-direction: column; gap: 12px;
        padding: 14px 16px; background: #fff;
        border: 1px solid var(--line); border-radius: 18px;
        box-shadow: 0 -8px 30px -14px rgba(15, 27, 61, .25), 0 12px 24px -16px rgba(15, 27, 61, .3);
    }
    @media (min-width: 640px) { .i-bar { flex-direction: row; align-items: center; justify-content: space-between; padding: 14px 24px; } }
    .i-bar-t { display: flex; align-items: center; gap: 10px; font-size: 13px; color: #475569; }
    .i-num {
        display: inline-flex; min-width: 32px; align-items: center; justify-content: center;
        padding: 4px 10px; border-radius: 9px; background: var(--p-50); color: var(--p-700);
        font-size: 13px; font-weight: 800; font-variant-numeric: tabular-nums;
    }
    .i-btn-main {
        display: inline-flex; width: 100%; height: 44px; align-items: center; justify-content: center;
        padding: 0 24px; border: 0; border-radius: 12px;
        background: var(--p-600); color: #fff;
        font-family: inherit; font-size: 13.5px; font-weight: 700; cursor: pointer;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .22), 0 10px 18px -10px rgba(37, 99, 235, .7);
        transition: background .25s ease, transform .25s ease, box-shadow .25s ease;
    }
    @media (min-width: 640px) { .i-btn-main { width: auto; } }
    .i-btn-main:hover:not(:disabled) { background: var(--p-700); transform: translateY(-1px); }
    .i-btn-main:active:not(:disabled) { transform: translateY(0); }
    .i-btn-main:focus-visible { outline: 3px solid var(--p-200); outline-offset: 2px; }
    .i-btn-main:disabled { cursor: not-allowed; opacity: .5; box-shadow: none; }
</style>

<form action="{{ route('cetak-gabungan.cetak') }}" method="POST" target="_blank"
      id="form-gabung" class="i-wrap">
    @csrf

    <div>
        <h1 class="i-h1">Gabung &amp; Cetak <b>PDF</b></h1>
<p class="i-crumb">Dashboard &nbsp;›&nbsp; Gabung &amp; Cetak PDF</p>
        <p class="i-sub">
            Pilih hasil instrumen pemantauan dan lembar wawancara, lalu gabungkan menjadi satu dokumen PDF.
            Urutan dokumen: instrumen terlebih dahulu, kemudian wawancara.
        </p>
    </div>

    @if ($errors->any())
        <div class="i-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- Filter --}}
    <div class="i-card i-filter">
        <div class="i-filter-grid">
            <div>
                <label for="cari" class="i-label">Pencarian</label>
                <input id="cari" type="text" placeholder="Nama, sekolah, atau tanggal..." class="i-field">
            </div>
            <div>
                <label for="filter-jenis" class="i-label">Jenis</label>
                <select id="filter-jenis" class="i-field">
                    <option value="">Semua jenis</option>
                    @foreach (['BCKS', 'BK', 'TENDIK', 'GEMBIRA', 'PKGSD MBI'] as $j)
                        <option value="{{ $j }}">{{ $j }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    @foreach ([['Instrumen Pemantauan', $instrumen], ['Lembar Wawancara', $wawancara]] as [$judul, $daftar])
        <section class="i-card" data-seksi>
            <div class="i-head">
                <div>
                    <h2 class="i-card-h">{{ $judul }}</h2>
                    <p class="i-card-s">{{ $daftar->count() }} data tersedia</p>
                </div>
                <label class="i-selall">
                    <input type="checkbox" data-pilih-semua class="i-check">
                    Pilih semua (yang tampil)
                </label>
            </div>

            <div class="i-scroll">
                <table class="i-table"> 
                    <thead>
                        <tr>
                            <th class="c-pilih"></th>
                            <th>Jenis</th>  
                            <th>Nama</th>
                            <th>Sekolah / Unit</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($daftar as $it)
                            <tr data-baris data-jenis="{{ $it['jenis'] }}"
                                data-teks="{{ strtolower($it['nama'] . ' ' . $it['sekolah'] . ' ' . $it['tanggal']) }}"
                                class="i-row">
                                <td class="c-pilih">
                                    <input type="checkbox" name="pilih[]" value="{{ $it['key'] }}"
                                        @checked(in_array($it['key'], $dipilih, true))
                                        class="i-check">
                                </td>
                                <td>
                                    <span class="i-tagj">
                                        {{ $it['jenis'] }}
                                    </span>
                                </td>
                                <td class="i-name">{{ $it['nama'] }}</td>
                                <td class="i-cell">{{ $it['sekolah'] }}</td>
                                <td class="i-nowrap i-cell">{{ $it['tanggal'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="i-empty-row">Belum ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    @endforeach

    {{-- Bar aksi --}}
    <div class="i-bar">
        <p class="i-bar-t">
            <span id="jumlah" class="i-num">0</span> dokumen dipilih
        </p>
        <button type="submit" id="btn-gabung" class="i-btn-main">
            Gabung &amp; Pratinjau
        </button>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const cari = document.getElementById('cari');
    const filterJenis = document.getElementById('filter-jenis');
    const jumlah = document.getElementById('jumlah');
    const tombol = document.getElementById('btn-gabung');
    const baris = [...document.querySelectorAll('[data-baris]')];
    const kotak = () => [...document.querySelectorAll('input[name="pilih[]"]')];

    function hitung() {
        const n = kotak().filter(c => c.checked).length;
        jumlah.textContent = n;
        tombol.disabled = n === 0;
    }

    function saring() {
        const q = cari.value.trim().toLowerCase();
        const j = filterJenis.value;
        baris.forEach(tr => {
            const cocok = (!q || tr.dataset.teks.includes(q)) && (!j || tr.dataset.jenis === j);
            tr.hidden = !cocok;
        });
    }

    cari.addEventListener('input', saring);
    filterJenis.addEventListener('change', saring);

    baris.forEach(tr => tr.addEventListener('click', e => {
        if (e.target.tagName === 'INPUT') return;
        const c = tr.querySelector('input[type="checkbox    "]');
        c.checked = !c.checked;
        hitung();
    }));

    document.querySelectorAll('[data-pilih-semua]').forEach(master => {
        master.addEventListener('change', () => {
            master.closest('[data-seksi]').querySelectorAll('[data-baris]:not([hidden]) input[name="pilih[]"]')
                .forEach(c => c.checked = master.checked);
            hitung();
        });
    });

    document.addEventListener('change', e => {
        if (e.target.matches('input[name="pilih[]"]')) hitung();
    });

    hitung();
});
</script>
@endsection