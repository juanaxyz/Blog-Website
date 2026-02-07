<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?? 'Pengaturan' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

<!-- Sidebar & Layout Wrapper -->
<div class="flex h-screen overflow-hidden">
    
    <!-- Sidebar (Same as Dashboard - could be a component) -->
    <aside class="w-64 bg-slate-50 border-r border-slate-200 hidden md:flex flex-col">
        <div class="h-14 flex items-center px-4 border-b border-slate-100">
            <div class="flex items-center gap-2 text-slate-700 font-semibold">
                <div class="w-5 h-5 bg-slate-800 text-white rounded flex items-center justify-center text-xs">J</div>
                <span>Workspace</span>
            </div>
        </div>
        
        <div class="flex-1 overflow-y-auto py-4">
            <nav class="px-2 space-y-1">
                <a href="/dashboard" class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-md transition-colors">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="/article" class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-md transition-colors">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    Artikel Saya
                </a>
                <a href="/settings" class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium bg-slate-200 text-slate-900 rounded-md">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Pengaturan
                </a>
            </nav>
            
             <div class="mt-auto p-4 border-t border-slate-200">
                <a href="/logout" class="flex items-center gap-2 text-sm text-red-600 hover:text-red-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Sign Out
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Pengaturan</h1>
                <p class="text-slate-500 mt-1">Kelola preferensi dan keamanan akun Anda.</p>
            </div>

            <?php if (isset($_SESSION['error']) or isset($_SESSION['success'])): ?>
                <div class="<?= isset($_SESSION['error']) ? 'bg-red-50 text-red-700 border-red-200' : 'bg-green-50 text-green-700 border-green-200' ?> border rounded-lg p-4 mb-6 flex items-center gap-3">
                    <?php if (isset($_SESSION['error'])): ?>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <?php else: ?>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <?php endif; ?>
                    <?= htmlspecialchars($_SESSION['error'] ?? $_SESSION['success']) ?>
                </div>
                <?php unset($_SESSION['error']); unset($_SESSION['success']); ?>
            <?php endif; ?>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100">
                    <h2 class="text-lg font-bold text-slate-900">Keamanan</h2>
                    <p class="text-sm text-slate-500">Ubah password akun Anda.</p>
                </div>
                
                <form action="/user/update-password" method="POST" class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                        <input type="text" value="<?= htmlspecialchars($_SESSION['username'] ?? '') ?>" disabled class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2 text-slate-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-slate-700 mb-1">Password Baru</label>
                            <input type="password" name="new_password" id="new_password" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                        </div>
                        <div>
                            <label for="confirm_password" class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" required class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="bg-slate-900 text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 transition-colors shadow-sm">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </main>
</div>

</body>
</html>
