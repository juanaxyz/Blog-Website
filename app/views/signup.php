<?php
    // require 'auth/login-auth.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - JunsBlog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-md p-8 sm:p-10 rounded-2xl shadow-xl border border-slate-100">
        <!-- Header -->
        <div class="text-center mb-8">
            <a href="/" class="inline-flex items-center justify-center w-12 h-12 bg-slate-900 text-white rounded-xl text-xl font-bold mb-4 hover:scale-105 transition-transform">J</a>
            <h1 class="text-2xl font-bold text-slate-900 mb-2">Buat Akun Baru</h1>
            <p class="text-slate-500">Bergabunglah dengan komunitas penulis kami</p>
        </div>

        <form action="./auth/sign-up-auth.php" method="POST" class="space-y-5">
            <!-- Full Name -->
            <div>
                <label for="full-name" class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </span>
                    <input type="text" name="full-name" id="full-name" required placeholder="Masukkan nama lengkap"
                        class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-slate-800 placeholder-slate-400">
                </div>
            </div>

            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-slate-700 mb-2">Username</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                    </span>
                    <input type="text" name="username" id="username" required placeholder="Pilih username"
                        class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-slate-800 placeholder-slate-400">
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </span>
                    <input type="password" name="password" id="password" required placeholder="Buat password kuat"
                        class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-slate-800 placeholder-slate-400">
                </div>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-slate-800 focus:ring-4 focus:ring-slate-200 transition-all shadow-lg hover:shadow-xl transform active:scale-95">
                Daftar Sekarang
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-sm text-slate-500 mt-8">
            Sudah punya akun? <a href="/login" class="font-bold text-blue-600 hover:text-blue-700 hover:underline">Masuk di sini</a>
        </p>
    </div>

</body>
</html>