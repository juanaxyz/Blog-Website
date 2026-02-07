<?php
/**
 * Breadcrumb Component
 * Usage: <?php include 'components/breadcrumb.php'; renderBreadcrumb($items); ?>
 * 
 * @param array $items Array of [label => string, url => string|null]
 * Last item should have url = null (current page)
 */

function renderBreadcrumb(array $items): void {
?>
<nav class="breadcrumb mb-6" aria-label="Breadcrumb">
    <ol class="flex items-center gap-2 text-sm">
        <!-- Home -->
        <li>
            <a href="/" class="flex items-center gap-1 text-gray-500 hover:text-cyan-600 dark:text-gray-400 dark:hover:text-cyan-400 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </a>
        </li>
        
        <?php foreach ($items as $index => $item): ?>
            <li class="flex items-center gap-2">
                <!-- Separator -->
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                
                <?php if (isset($item['url']) && $item['url'] !== null): ?>
                    <a href="<?= htmlspecialchars($item['url']) ?>" 
                       class="text-gray-500 hover:text-cyan-600 dark:text-gray-400 dark:hover:text-cyan-400 transition-colors">
                        <?= htmlspecialchars($item['label']) ?>
                    </a>
                <?php else: ?>
                    <span class="text-gray-800 dark:text-white font-medium">
                        <?= htmlspecialchars($item['label']) ?>
                    </span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</nav>
<?php
}
?>
