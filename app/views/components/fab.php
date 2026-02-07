<?php
/**
 * Floating Action Button Component
 * For mobile admin quick add article
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLogin = isset($_SESSION['username']);
?>

<?php if ($isLogin): ?>
<a href="/article/add-article" 
   class="fab hide-desktop group"
   title="Tambah Artikel">
    <svg class="w-6 h-6 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>
</a>
<?php endif; ?>
