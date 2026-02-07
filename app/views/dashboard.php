<?php if (isset($_SESSION['error']) or isset($_SESSION['success'])): ?>
    <script>
        // Simple toast notification instead of alert for better UX
        const msg = "<?= htmlspecialchars($_SESSION['error'] ?? $_SESSION['success'] , ENT_QUOTES) ?>";
        const type = "<?= isset($_SESSION['error']) ? 'error' : 'success' ?>";
        
        // You would typically implement a proper toast here, but using alert for now as requested or creating a simple DOM element
        // creating a temporary toast
        document.addEventListener('DOMContentLoaded', () => {
            const toast = document.createElement('div');
            toast.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300 translate-y-full opacity-0 z-50 ${type === 'error' ? 'bg-red-500' : 'bg-green-500'}`;
            toast.textContent = msg;
            document.body.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.classList.remove('translate-y-full', 'opacity-0');
            }, 100);
            
            // Remove after 3s
            setTimeout(() => {
                toast.classList.add('translate-y-full', 'opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        });
    </script>
    <?php unset($_SESSION['error']); unset($_SESSION['success']); ?>
<?php endif; ?>

<div class="flex h-screen bg-white overflow-hidden">
    
    <!-- Sidebar (Notion Style) -->
    <aside class="w-64 bg-slate-50 border-r border-slate-200 hidden md:flex flex-col">
        <div class="h-14 flex items-center px-4 border-b border-slate-100">
            <div class="flex items-center gap-2 text-slate-700 font-semibold">
                <div class="w-5 h-5 bg-slate-800 text-white rounded flex items-center justify-center text-xs">J</div>
                <span>Workspace</span>
            </div>
        </div>
        
        <div class="flex-1 overflow-y-auto py-4">
            <nav class="px-2 space-y-1">
                <a href="/dashboard" class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium bg-slate-200 text-slate-900 rounded-md">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="/article" class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-md transition-colors">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    Artikel Saya
                </a>
                <a href="/settings" class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-md transition-colors">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Pengaturan
                </a>
            </nav>
            
           
        </div>
        
        <div class="p-4 border-t border-slate-200">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-blue-500 to-cyan-400 flex items-center justify-center text-white text-xs font-bold">
                    <?= strtoupper(substr($_SESSION['username'] ?? 'U', 0, 1)) ?>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-900 truncate"><?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></p>
                    <a href="/logout" class="text-xs text-slate-500 hover:text-red-500 transition-colors">Sign out</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            
            <!-- Welcome Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Dashboard</h1>
                    <p class="text-slate-500 mt-1">Selamat datang kembali, <?= htmlspecialchars($_SESSION['username'] ?? '') ?> 👋</p>
                </div>
                <a href="/article/add-article" class="inline-flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-lg font-medium transition-all shadow-sm hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tulis Artikel Baru
                </a>
            </div>

            <!-- Stats (Minimal) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-12">
                <div class="p-6 rounded-xl border border-slate-200 bg-white hover:border-slate-300 transition-colors group">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-medium text-slate-500">Total Artikel</span>
                        <span class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </span>
                    </div>
                    <div class="text-3xl font-bold text-slate-900"><?= $data['totalPost'] ?? 0 ?></div>
                </div>
                
                <div class="p-6 rounded-xl border border-slate-200 bg-white hover:border-slate-300 transition-colors group">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-medium text-slate-500">Kategori</span>
                         <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </span>
                    </div>
                    <div class="text-3xl font-bold text-slate-900"><?= $data['totalCategory'] ?? 0 ?></div>
                </div>

                <div class="p-6 rounded-xl border border-slate-200 bg-white hover:border-slate-300 transition-colors group">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-medium text-slate-500">Status</span>
                         <span class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center group-hover:bg-purple-600 group-hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </span>
                    </div>
                    <div class="text-3xl font-bold text-slate-900">Active</div>
                </div>
            </div>

            <!-- Recent Articles Table -->
            <div class="bg-white border invalid:border-slate-200 rounded-xl overflow-visible">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <h2 class="text-lg font-bold text-slate-900">Artikel Terbaru</h2>
                    <div class="flex gap-2">
                         <button class="p-2 text-slate-400 hover:text-slate-900 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-100">
                                <th class="px-6 py-4 font-semibold">Judul</th>
                                <th class="px-6 py-4 font-semibold">Kategori</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 font-semibold">Tanggal</th>
                                <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php if (!empty($data['artikel'])): ?>
                                <?php foreach ($data['artikel'] as $post): ?>
                                    <tr class="group hover:bg-slate-50/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-slate-900 group-hover:text-blue-600 transition-colors"><?= htmlspecialchars($post['title']) ?></div>
                                            <div class="text-xs text-slate-400 mt-1 truncate max-w-[200px]"><?= htmlspecialchars($post['slug']) ?></div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                                                <?= htmlspecialchars($post['name']) ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-50 <?= $post['status'] === 'Publish' ? 'text-green-700' : 'text-blue-700' ?>">
                                                <span class="w-1.5 h-1.5 rounded-full <?= $post['status'] === 'Publish' ? 'bg-green-500' : 'bg-blue-500' ?>"></span>
                                                <?= $post['status'] ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-slate-500">
                                            <?= date('M d, Y', strtotime($post['created_at'])) ?>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <a href="/edit-article?id=<?= $post['id'] ?>" class="text-slate-400 hover:text-blue-600 transition-colors" title="Edit">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                </a>
                                                <a href="/article/delete-article?id=<?= $post['id'] ?>" class="text-slate-400 hover:text-red-600 transition-colors" title="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            <p class="font-medium">Belum ada artikel</p>
                                            <p class="text-sm mt-1">Mulai menulis artikel pertama Anda hari ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</div>
</body>
</html>