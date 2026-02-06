<?php
// pastikan session sudah aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLogin = isset($_SESSION['username']);
// var_dump($_SESSION);
?>

<nav class="w-full sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center z-99">

    <!-- Left: Brand -->
    <div class="text-xl font-semibold text-gray-800">
        <a href="/" class="hover:text-blue-600">
            JunsBlog
        </a>
    </div>


    <!-- Right: Auth & Menu -->
    <div class="flex  items-center space-x-4">
        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-6">
            <a href="/">Home</a>
            <a href="/article">Article</a>
            <a href="/contact">Contact</a>
            <?php if ($isLogin): ?>
                <a href="/dashboard">Dashboard</a>
            <?php endif; ?>
        </div>



        <?php if (!$isLogin): ?>
            <!-- Belum login -->
            <a
                href="/login"
                class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                Login
            </a>
        <?php else: ?>
            <!-- Sudah login -->
            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center cursor-pointer"
                onclick="window.location.href='/logout'">
                <!-- circle placeholder -->
                <span class="text-gray-700 font-semibold">
                    <?= strtoupper(substr($_SESSION['username'], 0, 1)) ?>
                </span>
            </div>
        <?php endif; ?>
        <!-- Hamburger Button -->
        <button
            id="menu-toggle"
            class="md:hidden z-3 relative transition">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 72 72"
                class="w-6 h-6 fill-current"
                id="icon-open">
                <path d="M56 48c2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4H16c-2.209 0-4-1.791-4-4s1.791-4 4-4h40zM56 32c2.209 0 4 1.791 4 4s-1.791 4-4 4H16c-2.209 0-4-1.791-4-4s1.791-4 4-4h40zM56 16c2.209 0 4 1.791 4 4s-1.791 4-4 4H16c-2.209 0-4-1.791-4-4s1.791-4 4-4h40z" />
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                class="w-6 h-6 fill-current hidden"
                id="icon-close"
                viewBox="0 0 50 50">
                <path d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"></path>
            </svg>

        </button>

        <!-- Mobile Menu -->
        <div
            id="mobile-menu"
            class="fixed z-2 inset-0 bg-white hidden md:hidden flex flex-col justify-center items-center space-y-6">
            <a href="/" class="text-xl">Home</a>
            <a href="/article" class="text-xl">Article</a>
            <a href="/contact" class="text-xl">Contact</a>
            <?php if ($isLogin): ?>
                <a href="/dashboard">Dashboard</a>
            <?php endif; ?>
        </div>


</nav>