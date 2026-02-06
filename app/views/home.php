<div class="bg-white">
    <!-- Hero Section -->
    <section class="min-h-screen bg-gradient-to-br from-cyan-500 to-sky-600 text-white flex items-center">
        <div class="max-w-6xl mx-auto px-4 py-20 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">
                Selamat Datang di JunsBlog
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-100">
                Bagikan cerita dan pengetahuan Anda dengan komunitas
            </p>
            <a href="/article" class="inline-block bg-white text-sky-600 font-bold px-8 py-3 rounded-lg hover:bg-gray-100 transition">
                Baca Artikel
            </a>
        </div>
    </section>

    <!-- Featured Articles Section -->
    <section class="py-20 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
                Artikel Terbaru
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php 
                $articleController = new \Juns\Blog\Controller\ArticleController();
                $articles = $articleController->getPost();
                
                if (!empty($articles)):
                    foreach (array_slice($articles, 0, 3) as $article): 
                ?>
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                        <div class="h-48 overflow-hidden">
                            <img src="/image?file=<?= urlencode($article['gambar']) ?>" 
                                 alt="<?= htmlspecialchars($article['title']) ?>"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-gray-800 line-clamp-2">
                                <?= htmlspecialchars($article['title']) ?>
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                <?= htmlspecialchars($article['slug']) ?>
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-xs bg-sky-100 text-sky-700 px-3 py-1 rounded">
                                    <?= htmlspecialchars($article['name']) ?>
                                </span>
                                <a href="/article/view-article?title=<?= urlencode($article['title']) ?>" 
                                   class="text-sky-600 hover:underline text-sm font-medium">
                                    Baca →
                                </a>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach;
                else:
                ?>
                    <div class="col-span-3 text-center text-gray-500 py-12">
                        Belum ada artikel tersedia
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-sky-600 text-white text-center">
        <h2 class="text-3xl font-bold mb-4">Ingin Berbagi Artikel?</h2>
        <p class="text-lg mb-6 text-sky-100">Daftar dan mulai menulis artikel Anda sekarang</p>
        <a href="/login" class="inline-block bg-white text-sky-600 font-bold px-8 py-3 rounded-lg hover:bg-gray-100 transition">
            Login / Daftar
        </a>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
                Mengapa Memilih JunsBlog?
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-8 rounded-lg hover:shadow-lg transition">
                    <div class="text-5xl mb-4">📝</div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Mudah Ditulis</h3>
                    <p class="text-gray-600">Editor yang user-friendly membuat menulis artikel menjadi lebih mudah dan menyenangkan</p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center p-8 rounded-lg hover:shadow-lg transition">
                    <div class="text-5xl mb-4">🌍</div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Jangkauan Luas</h3>
                    <p class="text-gray-600">Artikel Anda akan dibaca oleh ribuan pembaca dari berbagai latar belakang</p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center p-8 rounded-lg hover:shadow-lg transition">
                    <div class="text-5xl mb-4">⚡</div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Cepat & Responsif</h3>
                    <p class="text-gray-600">Platform yang cepat dan responsif di semua perangkat untuk pengalaman terbaik</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 px-4 bg-gray-900 text-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <!-- Stat 1 -->
                <div>
                    <div class="text-5xl font-bold mb-2">
                        <?php 
                        $articleController = new \Juns\Blog\Controller\ArticleController();
                        $articles = $articleController->getPost();
                        echo count($articles);
                        ?>
                    </div>
                    <p class="text-xl text-gray-300">Artikel Dipublikasikan</p>
                </div>

                <!-- Stat 2 -->
                <div>
                    <div class="text-5xl font-bold mb-2">10K+</div>
                    <p class="text-xl text-gray-300">Pembaca Aktif</p>
                </div>

                <!-- Stat 3 -->
                <div>
                    <div class="text-5xl font-bold mb-2">50+</div>
                    <p class="text-xl text-gray-300">Kategori Artikel</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 px-4 bg-gradient-to-r from-blue-500 to-cyan-500 text-white">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Dapatkan Update Terbaru</h2>
            <p class="text-lg mb-8 text-blue-100">Berlangganan newsletter kami untuk menerima artikel terbaru langsung ke inbox Anda</p>
            <form class="flex flex-col md:flex-row gap-3">
                <input type="email" placeholder="Masukkan email Anda" 
                       class="flex-1 px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-white"
                       required>
                <button type="submit" 
                        class="bg-white text-blue-600 font-bold px-8 py-3 rounded-lg hover:bg-gray-100 transition whitespace-nowrap">
                    Berlangganan
                </button>
            </form>
        </div>
    </section>
</div>


</body>

</html>