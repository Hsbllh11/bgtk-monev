@extends('layouts.app')

@section('title', 'Histori Pengisian BCKS (Versi Lama)')
@section('page-title', 'Histori Pengisian BCKS (Versi Lama)')

@section('content')
    <div style="background: #fff; padding: 24px; border-radius: 16px; border: 1px solid #e6ebf5;">
        
        <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 style="font-size: 20px; font-weight: 700; color: #0f1b3d;">Histori Jawaban (27 Indikator Lama)</h2>
                <p style="color: #64748b; font-size: 14px;">Data ini bersifat <b>Read-Only</b> (Hanya Baca) dan tidak akan terpengaruh oleh form 40 soal baru.</p>
            </div>
            <a href="{{ route('bcks.show', $bcksPengisian) }}" style="padding: 10px 16px; background: #eaf0ff; color: #1d4ed8; border-radius: 8px; font-weight: 600; text-decoration: none;">&larr; Kembali</a>
        </div>

        <div style="margin-bottom: 20px; padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
            <p><b>Nama Peserta:</b> {{ $bcksPengisian->nama_bcks }}</p>
            <p><b>Nama Responden:</b> {{ $bcksPengisian->nama_responden }} ({{ $bcksPengisian->status_responden }})</p>
            <p><b>Tanggal Evaluasi:</b> {{ $bcksPengisian->tanggal_evaluasi?->format('d/m/Y') }}</p>
        </div>

        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f1f5f9; text-align: left;">
                    <th style="padding: 12px; border-bottom: 2px solid #cbd5e1;">No</th>
                    <th style="padding: 12px; border-bottom: 2px solid #cbd5e1;">Level</th>
                    <th style="padding: 12px; border-bottom: 2px solid #cbd5e1;">Indikator (Data Lama)</th>
                    <th style="padding: 12px; border-bottom: 2px solid #cbd5e1; text-align: center;">Skor yang Dipilih</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jawabanLama as $jawaban)
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #e2e8f0;">{{ $loop->iteration }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #e2e8f0;">
                            <span style="padding: 4px 8px; background: #e0f2fe; color: #0369a1; border-radius: 6px; font-size: 12px; font-weight: 600;">
                                {{ $jawaban->level }}
                            </span>
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #e2e8f0; color: #334155;">
                            Indikator Lama No. {{ $jawaban->nomor_indikator }}
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #e2e8f0; text-align: center;">
                            <span style="display: inline-block; width: 32px; height: 32px; line-height: 32px; background: #2563eb; color: #fff; border-radius: 8px; font-weight: 700;">
                                {{ $jawaban->skor }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 24px; color: #64748b;">Tidak ada data histori jawaban lama untuk pengisian ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection