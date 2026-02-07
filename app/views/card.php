<?php
use Juns\Blog\Controller\ArticleController;

$articles = [];

// Determine data source
if (isset($data['posts'])) {
    // Data passed from controller (e.g., search results)
    $articles = $data['posts'];
} elseif (isset($posts)) {
     // Direct variable legacy support
    $articles = $posts;
} else {
    // Fallback: Fetch latest articles if no data provided
    $post = new ArticleController();
    $articles = $post->getPost();
}
?>

<?php if (empty($articles)): ?>
    <div class="text-center py-12 bg-white rounded-xl border border-dashed border-slate-200">
        <svg class="h-12 w-12 mx-auto text-slate-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
        </svg>
        <p class="text-slate-500 font-medium">Belum ada artikel yang tersedia.</p>
    </div>
<?php else: ?>
    <?php foreach ($articles as $article): ?>
        <article class="bg-white rounded-xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 group">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Thumbnail -->
                <div class="flex-shrink-0 md:w-48 h-48 md:h-32 rounded-lg overflow-hidden relative">
                    <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/5 transition-colors z-10"></div>
                    <img src="/image?file=<?= urlencode($article['gambar']) ?>" 
                         alt="<?= htmlspecialchars($article['title']) ?>"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                </div>
                
                <!-- Content -->
                <div class="flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-50 rounded-full">
                                <?= htmlspecialchars($article['name']) ?>
                            </span>
                            <span class="text-xs text-slate-400">•</span>
                            <span class="text-xs text-slate-500">
                                <?= date('M d, Y', strtotime($article['created_at'])) ?>
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-slate-900 mb-2 leading-snug group-hover:text-blue-600 transition-colors">
                            <a href="/article/view-article?title=<?= urlencode($article['title']) ?>">
                                <?= htmlspecialchars($article['title']) ?>
                            </a>
                        </h3>
                        
                        <p class="text-slate-600 text-sm leading-relaxed line-clamp-2">
                            <?= htmlspecialchars(substr(strip_tags($article['slug']), 0, 150)) ?>...
                        </p>
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <img src="/image-profile?file=<?= $article['profile'] ?? '' ?>" 
                                 alt="<?= htmlspecialchars($article['username']) ?>"
                                 class="w-6 h-6 rounded-full bg-slate-200">
                            <span class="text-xs font-medium text-slate-700"><?= htmlspecialchars($article['username']) ?></span>
                        </div>
                        
                        <a href="/article/view-article?title=<?= urlencode($article['title']) ?>" 
                           class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                            Baca Selengkapnya <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
<?php endif; ?>