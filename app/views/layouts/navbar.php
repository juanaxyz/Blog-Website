<?php
// pastikan session sudah aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLogin = isset($_SESSION['username']);
// var_dump($_SESSION);
?>

<nav class="w-full bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
    
    <!-- Left: Brand -->
    <div class="text-xl font-semibold text-gray-800">
        <a href="/" class="hover:text-blue-600">
            JunsBlog
        </a>
    </div>

    <!-- Right: Auth -->
    <div>
        <?php if (!$isLogin): ?>
            <!-- Belum login -->
            <a 
                href="/login"
                class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition"
            >
                Login
            </a>
        <?php else: ?>
            <!-- Sudah login -->
            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center cursor-pointer">
                <!-- circle placeholder -->
                <span class="text-gray-700 font-semibold">
                    <?= strtoupper(substr($_SESSION['username'], 0, 1)) ?>
                </span>
            </div>
        <?php endif; ?>
    </div>

</nav>
