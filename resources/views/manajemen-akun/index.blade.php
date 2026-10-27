@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manajemen Akun</h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola akun Petugas Monitoring dan Evaluasi.
            </p>
        </div>

        <a href="{{ route('manajemen-akun.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
            <span class="text-lg">+</span>
            Tambah Akun
        </a>
    </div>

    @if (session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <ul class="list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Total Petugas</p>
            <p class="mt-2 text-3xl font-bold text-slate-800">{{ $totalAkun }}</p>
            <p class="mt-1 text-xs text-slate-400">Seluruh akun petugas</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Akun Aktif</p>
            <p class="mt-2 text-3xl font-bold text-emerald-600">{{ $akunAktif }}</p>
            <p class="mt-1 text-xs text-slate-400">Dapat digunakan untuk login</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Akun Nonaktif</p>
            <p class="mt-2 text-3xl font-bold text-rose-600">{{ $akunNonaktif }}</p>
            <p class="mt-1 text-xs text-slate-400">Tidak dapat digunakan untuk login</p>
        </div>
    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 p-5">
            <h2 class="font-semibold text-slate-800">Daftar Petugas Monev</h2>
            <p class="mt-1 text-sm text-slate-500">
                Cari akun berdasarkan nama, username, atau NIP.
            </p>

            <form method="GET" action="{{ route('manajemen-akun.index') }}"
                  class="mt-4 flex flex-col gap-3 sm:flex-row">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama, username, atau NIP..."
                    class="min-w-0 flex-1 rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >

                <select name="status"
                        class="rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500">
                    <option value="">Semua Status</option>
                    <option value="aktif" @selected(request('status') === 'aktif')>Aktif</option>
                    <option value="nonaktif" @selected(request('status') === 'nonaktif')>Nonaktif</option>
                </select>

                <button type="submit"
                        class="rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-700">
                    Cari
                </button>

                <a href="{{ route('manajemen-akun.index') }}"
                   class="rounded-xl border border-slate-300 px-5 py-3 text-center text-sm font-semibold text-slate-600 hover:bg-slate-50">
                    Reset
                </a>
            </form>
        </div>

        <div class="overflow-x-auto">
            {{-- Lebar minimum tabel dikurangi karena tombol aksi sekarang menggunakan ikon yang lebih ringkas --}}
            <table class="w-full min-w-[850px] text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-4 w-16">No.</th>
                        <th class="px-5 py-4">Nama Petugas</th>
                        <th class="px-5 py-4">Username</th>
                        <th class="px-5 py-4">NIP</th>
                        <th class="px-5 py-4 w-28">Status</th>
                        <th class="px-5 py-4 text-right min-w-[150px]">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($akun as $item)
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-5 py-4 text-slate-500">
                                {{ $akun->firstItem() + $loop->index }}
                            </td>

                            <td class="px-5 py-4">
                                <div class="font-semibold text-slate-800">{{ $item->name }}</div>
                                <div class="mt-1 text-xs text-slate-400">{{ $item->email }}</div>
                            </td>

                            <td class="px-5 py-4 text-slate-600">{{ $item->username }}</td>

                            <td class="px-5 py-4 font-mono text-slate-600">{{ $item->nip }}</td>

                            <td class="px-5 py-4">
                                @if ($item->is_active)
                                    <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex rounded-full bg-rose-50 px-3 py-1 text-xs font-semibold text-rose-700">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Tombol Detail (Ikon Mata) -->
                                    <a href="{{ route('manajemen-akun.show', $item->id) }}" 
                                       title="Lihat Detail"
                                       class="inline-flex items-center justify-center rounded-lg border border-slate-200 p-2 text-slate-600 transition hover:bg-slate-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>

                                    <!-- Tombol Edit (Ikon Pensil) -->
                                    <a href="{{ route('manajemen-akun.edit', $item->id) }}" 
                                       title="Edit Akun"
                                       class="inline-flex items-center justify-center rounded-lg border border-blue-200 p-2 text-blue-700 transition hover:bg-blue-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>

                                    <!-- Tombol Hapus (Ikon Tempat Sampah) -->
                                    <form method="POST" 
                                          action="{{ route('manajemen-akun.hapus', $item->id) }}"
                                          onsubmit="return confirm('Hapus akun {{ addslashes($item->name) }} secara permanen? Tindakan ini tidak dapat dibatalkan.')"
                                          class="inline-flex m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                title="Hapus Akun"
                                                class="inline-flex items-center justify-center rounded-lg border border-red-200 bg-red-50 p-2 text-red-600 transition hover:bg-red-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">
                                <div class="font-semibold text-slate-700">Data akun tidak ditemukan</div>
                                <p class="mt-1 text-sm text-slate-500">
                                    Coba ubah kata kunci pencarian atau filter status.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($akun->hasPages())
            <div class="border-t border-slate-100 px-5 py-4">
                {{ $akun->links() }}
            </div>
        @endif
    </div>
</div>
@endsection