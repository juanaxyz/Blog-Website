<footer class="bg-gray-900 text-gray-300 py-12 border-t border-gray-800">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Brand Section -->
            <div>
                <h3 class="text-2xl font-bold text-white mb-4">JunsBlog</h3>
                <p class="text-gray-400 text-sm mb-4">
                    Platform blogging terbaik untuk berbagi cerita dan pengetahuan dengan komunitas global.
                </p>
                <!-- Social Media -->
                <div class="flex gap-4">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 12a4 4 0 100-8 4 4 0 000 8zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23 3a10.9 10.9 0 11-3.39 6.5 10.9 10.9 0 003.39-6.5z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Navigasi</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="text-gray-400 hover:text-white transition text-sm">Beranda</a></li>
                    <li><a href="/article" class="text-gray-400 hover:text-white transition text-sm">Artikel</a></li>
                    <li><a href="/contact" class="text-gray-400 hover:text-white transition text-sm">Hubungi Kami</a></li>
                    <li><a href="/login" class="text-gray-400 hover:text-white transition text-sm">Login</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Kategori</h4>
                <ul class="space-y-2">
                    <?php 
                    try {
                        $articleController = new \Juns\Blog\Controller\ArticleController();
                        $categories = $articleController->getCategories();
                        if (!empty($categories)):
                            foreach (array_slice($categories, 0, 4) as $category):
                    ?>
                        <li>
                            <a href="/article?category=<?= urlencode($category['name']) ?>" 
                               class="text-gray-400 hover:text-white transition text-sm">
                                <?= htmlspecialchars($category['name']) ?>
                            </a>
                        </li>
                    <?php 
                            endforeach;
                        endif;
                    } catch (Exception $e) {
                        // Silent fail jika kategori tidak bisa diambil
                    }
                    ?>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Kontak</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <span class="text-sky-500 mt-1">📧</span>
                        <div>
                            <p class="text-xs text-gray-500">Email</p>
                            <a href="mailto:inijuana@gmail.com" class="text-gray-400 hover:text-white transition text-sm">
                                inijuana@gmail.com
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-sky-500 mt-1">📍</span>
                        <div>
                            <p class="text-xs text-gray-500">Lokasi</p>
                            <p class="text-gray-400 text-sm">Indonesia</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-800 my-8"></div>

        <!-- Bottom Footer -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            <!-- Copyright -->
            <div class="text-center md:text-left">
                <p class="text-gray-400 text-sm">
                    &copy; <?= date('Y') ?> JunsBlog. Semua hak dilindungi.
                </p>
            </div>

            <!-- Links -->
            <div class="flex justify-center gap-6">
                <a href="#" class="text-gray-400 hover:text-white transition text-sm">Kebijakan Privasi</a>
                <a href="#" class="text-gray-400 hover:text-white transition text-sm">Syarat & Ketentuan</a>
            </div>

            <!-- Language/Settings -->
            <div class="text-center md:text-right">
                <p class="text-gray-400 text-sm">
                    Made with ❤️ by JunsBlog Team
                </p>
            </div>
        </div>
    </div>
</footer>
