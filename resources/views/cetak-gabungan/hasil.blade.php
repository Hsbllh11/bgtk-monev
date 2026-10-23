<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Monev Gabungan</title>

    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #eef2f7; font-family: Arial, Helvetica, sans-serif; }

        .toolbar {
            width: 210mm; margin: 20px auto;
            display: flex; justify-content: space-between; align-items: center; gap: 12px;
        }
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            min-height: 40px; padding: 0 16px; border-radius: 9px;
            border: 1px solid #cbd5e1; background: #fff; color: #334155;
            font-size: 13px; font-weight: 600; text-decoration: none; cursor: pointer;
        }
        .btn-print { background: #2563eb; border-color: #2563eb; color: #fff; }
        .info { width: 210mm; margin: 0 auto 16px; font-size: 12px; color: #64748b; }

        .doc-host { display: block; break-after: page; page-break-after: always; }
        .doc-host:last-child { break-after: auto; page-break-after: auto; }

        @page { size: A4; margin: 10mm; }

        @media print {
            body { background: #fff; }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body>

    <div class="toolbar no-print">
        <a href="{{ url()->previous() }}" onclick="if (window.opener || history.length < 2) { window.close(); return false; }" class="btn">
            ← Tutup
        </a>
        <button type="button" onclick="window.print()" class="btn btn-print">
            Cetak / Simpan PDF
        </button>
    </div>

    <p class="info no-print">
        {{ count($htmls) }} dokumen digabung. Pada dialog cetak, pilih tujuan <strong>Save as PDF</strong>
        dan aktifkan <strong>Background graphics</strong> agar warna tabel ikut tercetak.
    </p>

    <div id="docs"></div>

    <script>
        const DOCS = @json($htmls, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
        const container = document.getElementById('docs');

        DOCS.forEach(function (html) {
            const parsed = new DOMParser().parseFromString(html, 'text/html');

            // Buang toolbar bawaan tiap lembar cetak.
            parsed.querySelectorAll('.no-print').forEach(el => el.remove());

            let css = '';
            parsed.querySelectorAll('style').forEach(s => css += s.textContent + '\n');

            // Di dalam shadow root, selector html/body diganti :host.
            css = css.replace(/html\s*,\s*body/g, ':host').replace(/\bbody\b/g, ':host');

            const host = document.createElement('div');
            host.className = 'doc-host';
            const root = host.attachShadow({ mode: 'open' });

            const style = document.createElement('style');
            style.textContent = ':host{display:block;}\n' + css;
            root.appendChild(style);

            const wrapper = document.createElement('div');
            const main = parsed.querySelector('main');
            wrapper.innerHTML = main ? main.outerHTML : parsed.body.innerHTML;
            root.appendChild(wrapper);

            container.appendChild(host);
        });
    </script>
</body>
</html>