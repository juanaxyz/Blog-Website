<?php
// pastikan session sudah aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLogin = isset($_SESSION['username']);
?>

<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
            <!-- Logo / Brand -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="group flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-slate-900 text-white flex items-center justify-center font-bold text-lg group-hover:bg-blue-600 transition-colors">
                        J
                    </div>
                    <span class="text-lg font-semibold text-slate-900 tracking-tight group-hover:text-blue-600 transition-colors">
                        JunsBlog
                    </span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 px-3 py-2 rounded-md transition-all">
                    Home
                </a>
                <a href="/article" class="text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 px-3 py-2 rounded-md transition-all">
                    Artikel
                </a>
                <a href="/contact" class="text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 px-3 py-2 rounded-md transition-all">
                    Contact
                </a>
                <?php if ($isLogin): ?>
                    <a href="/dashboard" class="text-sm font-medium text-slate-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-md transition-all">
                        Dashboard
                    </a>
                <?php endif; ?>
            </div>

            <!-- Right Side: Auth & Mobile Menu -->
            <div class="flex items-center gap-4">
                <?php if (!$isLogin): ?>
                    <div class="hidden md:flex items-center gap-3">
                        <a href="/login" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">
                            Masuk
                        </a>
                        <a href="/signup" class="text-sm font-medium bg-slate-900 text-white px-4 py-2 rounded-lg hover:bg-slate-800 transition-all shadow-sm hover:shadow-md">
                            Daftar
                        </a>
                    </div>
                <?php else: ?>
                    <div class="hidden md:flex items-center gap-4">
                        <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                            <span class="text-sm font-medium text-slate-700">
                                <?= htmlspecialchars(substr($_SESSION['username'], 0, 10)) ?>
                            </span>
                            <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-blue-500 to-cyan-400 text-white flex items-center justify-center font-smeibold text-sm shadow-sm">
                                <?= strtoupper(substr($_SESSION['username'], 0, 1)) ?>
                            </div>
                        </div>
                        <a href="/logout" class="text-sm text-slate-500 hover:text-red-600 transition-colors" title="Logout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none transition-colors">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="hidden md:hidden absolute top-16 left-0 w-full bg-white border-b border-gray-100 shadow-lg animate-fade-in-down origin-top">
        <div class="px-4 pt-2 pb-6 space-y-2">
            <a href="/" class="block px-3 py-3 rounded-md text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Home</a>
            <a href="/article" class="block px-3 py-3 rounded-md text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Artikel</a>
            <a href="/contact" class="block px-3 py-3 rounded-md text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Contact</a>
            
            <?php if ($isLogin): ?>
                <a href="/dashboard" class="block px-3 py-3 rounded-md text-base font-medium text-slate-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">Dashboard</a>
                <div class="border-t border-gray-100 my-2 pt-2">
                    <div class="flex items-center px-3 py-2 gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">
                            <?= strtoupper(substr($_SESSION['username'], 0, 1)) ?>
                        </div>
                        <span class="text-sm font-medium text-slate-700"><?= htmlspecialchars($_SESSION['username']) ?></span>
                    </div>
                    <a href="/logout" class="block px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-md mt-1 transition-colors">Log out</a>
                </div>
            <?php else: ?>
                <div class="border-t border-gray-100 my-4 pt-4 flex flex-col gap-3 px-3">
                    <a href="/login" class="block w-full text-center px-4 py-2 border border-slate-200 rounded-lg text-slate-700 font-medium hover:bg-slate-50 transition-colors">Masuk</a>
                    <a href="/signup" class="block w-full text-center px-4 py-2 bg-slate-900 text-white rounded-lg font-medium hover:bg-slate-800 transition-colors">Daftar</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script>
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu on resize if open
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            mobileMenu.classList.add('hidden');
        }
    });
</script>