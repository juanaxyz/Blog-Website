<div class="bg-white min-h-screen">
    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-slate-900 tracking-tight mb-8 leading-tight font-heading">
            Berbagi cerita inspiratif <br class="hidden md:block"/> dan wawasan mendalam.
        </h1>
        <p class="text-xl text-slate-600 mb-10 max-w-2xl mx-auto leading-relaxed">
            Platform blog minimalis untuk penulis dan pembaca yang mengutamakan kenyamanan dan kualitas konten.
        </p>
        <div class="flex items-center justify-center gap-4">
            <a href="/article" class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-white bg-slate-900 rounded-lg hover:bg-slate-800 transition-all shadow-sm hover:shadow-md">
                Mulai Membaca
            </a>
            <a href="/login" class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition-all">
                Menulis
            </a>
        </div>
    </section>

    <!-- Featured Articles -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-12">
                <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Artikel Terbaru</h2>
                <a href="/article" class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline flex items-center gap-1">
                    Lihat Semua <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php 
                $articleController = new \Juns\Blog\Controller\ArticleController();
                $articles = $articleController->getPost();
                
                if (!empty($articles)):
                    foreach (array_slice($articles, 0, 6) as $article): 
                ?>
                    <article class="group flex flex-col bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 overflow-hidden h-full">
                        <div class="h-56 overflow-hidden relative">
                            <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/5 transition-colors z-10"></div>
                            <img src="/image?file=<?= urlencode($article['gambar']) ?>" 
                                 alt="<?= htmlspecialchars($article['title']) ?>"
                                 class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-50 rounded-full">
                                    <?= htmlspecialchars($article['name']) ?>
                                </span>
                                <span class="text-xs text-slate-400">•</span>
                                <span class="text-xs text-slate-500">
                                    5 min read
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-slate-900 mb-3 leading-snug group-hover:text-blue-600 transition-colors line-clamp-2">
                                <a href="/article/view-article?title=<?= urlencode($article['title']) ?>">
                                    <?= htmlspecialchars($article['title']) ?>
                                </a>
                            </h3>
                            
                            <p class="text-slate-600 text-sm leading-relaxed line-clamp-3 mb-6 flex-grow">
                                <?= htmlspecialchars(substr(strip_tags($article['slug']), 0, 150)) ?>...
                            </p>

                            <div class="pt-4 border-t border-slate-50 flex items-center justify-between mt-auto">
                                <div class="flex items-center gap-2">
                                    <img src="/image-profile?file=<?= $article['profile'] ?>" alt="<?= htmlspecialchars($article['username']) ?>" class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600">
                                        
                                    <span class="text-xs font-medium text-slate-700"><?= htmlspecialchars($article['username']) ?></span>
                                </div>
                                <span class="text-xs text-slate-400">
                                    <?= date('M d, Y', strtotime($article['created_at'] ?? 'now')) ?>
                                </span>
                            </div>
                        </div>
                    </article>
                <?php 
                    endforeach;
                else:
                ?>
                    <div class="col-span-3 text-center py-20 bg-white rounded-2xl border border-dashed border-slate-200">
                        <svg class="h-12 w-12 mx-auto text-slate-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <p class="text-slate-500 font-medium">Belum ada artikel yang tersedia.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Kenapa JunsBlog?</h2>
            <p class="text-slate-600 text-lg">Didesain untuk pengalaman membaca dan menulis yang fokus tanpa gangguan.</p>
        </div>
        
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center group">
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Editor Minimalis</h3>
                <p class="text-slate-500 leading-relaxed">Fokus pada kata-kata Anda dengan editor yang bersih dan bebas gangguan.</p>
            </div>
            <div class="text-center group">
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Performa Cepat</h3>
                <p class="text-slate-500 leading-relaxed">Dibangun untuk kecepatan, memastikan pembaca Anda tidak pernah menunggu.</p>
            </div>
            <div class="text-center group">
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Mudah Dibaca</h3>
                <p class="text-slate-500 leading-relaxed">Tipografi yang optimal untuk pengalaman membaca yang nyaman di semua perangkat.</p>
            </div>
        </div>
    </section>

    <!-- Simple Footer -->
    <footer class="bg-white border-t border-slate-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-slate-900 text-white flex items-center justify-center font-bold">J</div>
                <span class="font-bold text-slate-900">JunsBlog</span>
            </div>
            <div class="text-slate-500 text-sm">
                &copy; <?= date('Y') ?> JunsBlog. All rights reserved.
            </div>
            <div class="flex gap-6">
                <a href="#" class="text-slate-400 hover:text-slate-900 transition-colors">Privacy</a>
                <a href="#" class="text-slate-400 hover:text-slate-900 transition-colors">Terms</a>
                <a href="#" class="text-slate-400 hover:text-slate-900 transition-colors">Twitter</a>
            </div>
        </div>
    </footer>
</div>

</body>
</html>