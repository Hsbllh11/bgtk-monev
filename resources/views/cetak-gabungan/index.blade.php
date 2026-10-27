@extends('layouts.app')

@section('title', 'Gabung & Cetak PDF')
@section('page-title', 'Gabung & Cetak PDF')

@section('content')
<form action="{{ route('cetak-gabungan.cetak') }}" method="POST" target="_blank"
      id="form-gabung" class="space-y-6 pb-24">
    @csrf

    <div>
        <h1 class="text-2xl font-bold text-slate-800">Gabung &amp; Cetak PDF</h1>
        <p class="mt-1 text-sm text-slate-500">
            Pilih hasil instrumen pemantauan dan lembar wawancara, lalu gabungkan menjadi satu dokumen PDF.
            Urutan dokumen: instrumen terlebih dahulu, kemudian wawancara.
        </p>
    </div>

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- Filter --}}
    <div class="grid grid-cols-1 gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm md:grid-cols-2">
        <div>
            <label for="cari" class="mb-2 block text-sm font-medium text-slate-700">Pencarian</label>
            <input id="cari" type="text" placeholder="Nama, sekolah, atau tanggal..."
                class="w-full rounded-xl border border-slate-200 px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                style="height: 44px">
        </div>
        <div>
            <label for="filter-jenis" class="mb-2 block text-sm font-medium text-slate-700">Jenis</label>
            <select id="filter-jenis"
                class="w-full rounded-xl border border-slate-200 bg-white px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                style="height: 44px">
                <option value="">Semua jenis</option>
                @foreach (['BCKS', 'BK', 'TENDIK', 'GEMBIRA', 'PKGSD MBI'] as $j)
                    <option value="{{ $j }}">{{ $j }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @foreach ([['Instrumen Pemantauan', $instrumen], ['Lembar Wawancara', $wawancara]] as [$judul, $daftar])
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm" data-seksi>
            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">{{ $judul }}</h2>
                    <p class="text-sm text-slate-500">{{ $daftar->count() }} data tersedia</p>
                </div>
                <label class="flex cursor-pointer items-center gap-2 text-sm font-medium text-slate-600">
                    <input type="checkbox" data-pilih-semua class="h-4 w-4 rounded border-slate-300 text-blue-600">
                    Pilih semua (yang tampil)
                </label>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[700px] text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="w-12 px-6 py-3"></th>
                            <th class="px-4 py-3 font-bold">Jenis</th>
                            <th class="px-4 py-3 font-bold">Nama</th>
                            <th class="px-4 py-3 font-bold">Sekolah / Unit</th>
                            <th class="px-4 py-3 font-bold">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($daftar as $it)
                            <tr data-baris data-jenis="{{ $it['jenis'] }}"
                                data-teks="{{ strtolower($it['nama'] . ' ' . $it['sekolah'] . ' ' . $it['tanggal']) }}"
                                class="cursor-pointer transition hover:bg-slate-50">
                                <td class="px-6 py-3">
                                    <input type="checkbox" name="pilih[]" value="{{ $it['key'] }}"
                                        @checked(in_array($it['key'], $dipilih, true))
                                        class="h-4 w-4 rounded border-slate-300 text-blue-600">
                                </td>
                                <td class="px-4 py-3">
                                    <span class="rounded-md bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-700">
                                        {{ $it['jenis'] }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 font-semibold text-slate-800">{{ $it['nama'] }}</td>
                                <td class="px-4 py-3 text-slate-600">{{ $it['sekolah'] }}</td>
                                <td class="whitespace-nowrap px-4 py-3 text-slate-600">{{ $it['tanggal'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-slate-400">Belum ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    @endforeach

    {{-- Bar aksi --}}
    <div class="sticky bottom-0 flex flex-col gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-4 shadow-lg sm:flex-row sm:items-center sm:justify-between sm:px-6">
        <p class="text-sm text-slate-600">
            <span id="jumlah" class="font-bold text-blue-600">0</span> dokumen dipilih
        </p>
        <button type="submit" id="btn-gabung"
            class="inline-flex h-12 w-full items-center justify-center rounded-xl bg-blue-600 px-6 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 disabled:cursor-not-allowed disabled:opacity-50 sm:w-auto">
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
        const c = tr.querySelector('input[type="checkbox"]');
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