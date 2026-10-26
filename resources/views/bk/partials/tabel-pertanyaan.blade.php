@php
    $currentLevel = null;
    $currentBagian = null;
    $answers = $answers ?? collect();
@endphp

<section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[850px] border-collapse">
            <colgroup>
                <col style="width: 80px;">
                <col>
                @foreach ([1, 2, 3, 4] as $n)
                    <col style="width: 70px;">
                @endforeach
            </colgroup>

            <thead>
                <tr class="bg-slate-100">
                    <th class="border-b border-slate-200 px-5 py-3 text-left text-xs font-bold uppercase text-slate-500">No</th>
                    <th class="border-b border-slate-200 px-5 py-3 text-left text-xs font-bold uppercase text-slate-500">Pernyataan / Indikator</th>
                    @foreach ([1, 2, 3, 4] as $n)
                        <th class="border-b border-slate-200 px-3 py-3 text-center text-xs font-bold text-slate-500">{{ $n }}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @forelse ($questions as $question)
                    @php
                        $current = old("jawaban.{$question->id}", $answers->get($question->id)?->skor);
                    @endphp

                    @if ($currentLevel !== $question->level)
                        @php
                            $currentLevel = $question->level;
                            $currentBagian = null;
                        @endphp
                        <tr class="level-header" data-level="{{ $question->level }}">
                            <td colspan="6" class="border-b border-slate-200 bg-blue-50 px-6 py-5">
                                <div class="text-base font-bold text-slate-800">
                                    Level {{ $question->level }} — {{ $question->level_nama }}
                                </div>
                                <div class="mt-1 text-sm text-slate-500">
                                    Pilih satu skor (1–4) untuk setiap indikator. Skor 4 adalah yang tertinggi.
                                </div>
                            </td>
                        </tr>
                    @endif

                    @if ($currentBagian !== $question->bagian)
                        @php $currentBagian = $question->bagian; @endphp
                        <tr class="bagian-header" data-level="{{ $question->level }}">
                            <td colspan="6" class="border-b border-slate-200 px-6 py-3">
                                <div class="text-sm font-bold text-slate-800">
                                    {{ $question->bagian }}
                                    @if ($question->judul_bagian)
                                        — {{ $question->judul_bagian }}
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endif

                    <tr class="question-item transition hover:bg-slate-50"
                        data-question-id="{{ $question->id }}" data-level="{{ $question->level }}">
                        <td class="border-b border-slate-100 px-5 py-5 align-middle">
                            <span class="text-sm font-semibold text-slate-600">{{ $question->nomor }}</span>
                        </td>

                        <td class="border-b border-l border-slate-100 px-5 py-5 align-middle">
                            <p class="text-sm leading-6 text-slate-700">{{ $question->pernyataan }}</p>
                        </td>

                        @foreach ([1, 2, 3, 4] as $n)
                            <td class="border-b border-l border-slate-100 px-3 py-5 text-center align-middle">
                                <label class="inline-flex cursor-pointer items-center justify-center" title="Skor {{ $n }}">
                                    <input type="radio" name="jawaban[{{ $question->id }}]" value="{{ $n }}"
                                        class="h-5 w-5 cursor-pointer accent-blue-600"
                                        {{ (string) $current === (string) $n ? 'checked' : '' }}>
                                </label>
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="text-lg font-bold text-slate-700">Data instrumen belum tersedia</div>
                            <p class="mt-2 text-sm text-slate-500">Pastikan BKQuestionSeeder sudah dijalankan.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>