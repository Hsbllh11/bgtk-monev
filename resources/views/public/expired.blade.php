<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Kadaluarsa - MANDALIKA BGTK NTB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen flex flex-col items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-8 text-center border border-slate-100">
        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-red-100 text-red-600 mb-6">
            <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
        </div>
        <h1 class="text-2xl font-bold text-slate-800 mb-2">Link Tidak Valid</h1>
        <p class="text-slate-500 mb-8 text-sm">Mohon maaf, link yang Anda akses sudah kadaluarsa, sudah pernah digunakan, atau tidak valid.</p>
        <a href="{{ route('login') }}" class="inline-flex rounded-xl bg-slate-800 px-6 py-3 text-sm font-bold text-white hover:bg-slate-900">Kembali ke Login</a>
    </div>
</body>
</html>