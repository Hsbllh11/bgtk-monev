<?php

namespace App\Http\Controllers;

use App\Models\BcksPengisian;
use App\Models\BKSubmission;
use App\Models\GembiraPengisian;
use App\Models\PkgsdMbiPengisian;
use App\Models\Tendik;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CetakGabunganController extends Controller
{
    private const JENIS_WAWANCARA = ['BCKS', 'BK', 'TENDIK', 'GEMBIRA', 'PKGSD MBI'];

    public function index(Request $request)
    {
        $instrumen = collect();

        foreach (BcksPengisian::latest('tanggal_evaluasi')->get() as $m) {
            $instrumen->push($this->item(
                'bcks-' . $m->id, 'BCKS',
                $m->nama_responden, $m->unit_kerja_responden, $m->tanggal_evaluasi
            ));
        }

        foreach (BKSubmission::latest('id')->get() as $m) {
            $instrumen->push($this->item(
                'bk-' . $m->id, 'BK',
                $m->nama_responden, $m->satuan_pendidikan,
                $m->tanggal_pelaksanaan ?? $m->tanggal_pengisian
            ));
        }

        foreach (Tendik::latest('tanggal_pengisian')->get() as $m) {
            $instrumen->push($this->item(
                'tendik-' . $m->id, 'TENDIK',
                $m->nama_responden, $m->satuan_pendidikan, $m->tanggal_pengisian
            ));
        }

        foreach (GembiraPengisian::latest('tanggal_monev')->get() as $m) {
            $instrumen->push($this->item(
                'gembira-' . $m->id, 'GEMBIRA',
                $m->nama_guru, $m->nama_sekolah, $m->tanggal_monev
            ));
        }

        foreach (PkgsdMbiPengisian::latest('tanggal_monev')->get() as $m) {
            $instrumen->push($this->item(
                'pkgsd-' . $m->id, 'PKGSD MBI',
                $m->nama_guru, $m->nama_sekolah, $m->tanggal_monev
            ));
        }

        $wawancara = Wawancara::whereIn('jenis_wawancara', self::JENIS_WAWANCARA)
            ->latest('tanggal_wawancara')
            ->get()
            ->map(fn ($m) => $this->item(
                'wwc-' . $m->id,
                strtoupper(trim($m->jenis_wawancara)),
                $m->nama_responden ?: $m->nama_narasumber,
                $m->unit_kerja_responden,
                $m->tanggal_evaluasi ?: $m->tanggal_wawancara
            ));

        $dipilih = array_map('strval', (array) $request->query('pilih', []));

        return view('cetak-gabungan.index', [
            'instrumen' => $instrumen,
            'wawancara' => $wawancara,
            'dipilih'   => $dipilih,
        ]);
    }

    public function cetak(Request $request)
    {
        $request->validate([
            'pilih'   => ['required', 'array', 'min:1'],
            'pilih.*' => ['string', 'regex:/^(bcks|bk|tendik|gembira|pkgsd|wwc)-\d+$/'],
        ], [
            'pilih.required' => 'Pilih minimal satu data untuk digabungkan.',
        ]);

        $htmls = [];

        foreach ($request->input('pilih') as $key) {
            [$tipe, $id] = explode('-', $key, 2);
            $html = $this->render($tipe, (int) $id);

            if ($html) {
                $htmls[] = $html;
            }
        }

        return view('cetak-gabungan.hasil', ['htmls' => $htmls]);
    }

    private function render(string $tipe, int $id): ?string
    {
        return match ($tipe) {
            'bcks' => view('bcks.cetak', [
                'bcksPengisian' => BcksPengisian::with('jawaban')->findOrFail($id),
            ])->render(),

            'bk' => view('bk.cetak', [
                'submission' => BKSubmission::with(['answers.question', 'essayAnswers'])->findOrFail($id),
            ])->render(),

            'tendik' => view('tendik.cetak', [
                'tendik' => Tendik::findOrFail($id),
            ])->render(),

            'gembira' => view('gembira.cetak', [
                'gembira' => GembiraPengisian::findOrFail($id),
            ])->render(),

            'pkgsd' => view('pkgsd-mbi.cetak', [
                'pkgsdMbi' => PkgsdMbiPengisian::findOrFail($id),
            ])->render(),

            'wwc' => $this->renderWawancara(Wawancara::findOrFail($id)),

            default => null,
        };
    }

    private function renderWawancara(Wawancara $wawancara): ?string
    {
        $jenis = strtoupper(trim($wawancara->jenis_wawancara ?? ''));

        $metadata = json_decode($wawancara->hasil_wawancara ?? '{}', true);
        $metadata = is_array($metadata) ? $metadata : [];

        return match ($jenis) {
            'BCKS'      => view('wawancara.cetak-bcks', compact('wawancara'))->render(),
            'BK'        => view('wawancara.cetak-bk', compact('wawancara'))->render(),
            'TENDIK'    => view('wawancara.cetak-tendik', compact('wawancara', 'metadata'))->render(),
            'GEMBIRA'   => view('wawancara.cetak-gembira', compact('wawancara', 'metadata'))->render(),
            'PKGSD MBI' => view('wawancara.cetak-pkgsd-mbi', compact('wawancara', 'metadata'))->render(),
            default     => null,
        };
    }

    private function item(string $key, string $jenis, ?string $nama, ?string $sekolah, $tanggal): array
    {
        return [
            'key'     => $key,
            'jenis'   => $jenis,
            'nama'    => $nama ?: '-',
            'sekolah' => $sekolah ?: '-',
            'tanggal' => $tanggal ? Carbon::parse($tanggal)->format('d/m/Y') : '-',
        ];
    }
}