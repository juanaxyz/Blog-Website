<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Page Header -->
        <div class="mb-12 text-center max-w-2xl mx-auto">
            <h1 class="text-4xl font-bold text-slate-900 mb-4 tracking-tight">Jelajahi Artikel</h1>
            <p class="text-slate-600 text-lg">Temukan wawasan baru dan cerita inspiratif dari komunitas kami.</p>
        </div>

        <!-- Filter & Search -->
        <div class="mb-10 max-w-5xl mx-auto flex flex-col md:flex-row gap-4 justify-between items-center">
            
            <!-- Category Filter -->
            <div class="flex gap-2 overflow-x-auto pb-2 w-full md:w-auto scrollbar-hide no-scrollbar">
                <a href="/article" 
                   class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors <?= empty($data['currentCategory']) ? 'bg-slate-900 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' ?>">
                   Semua
                </a>
                <?php if(!empty($data['categories'])): ?>
                    <?php foreach($data['categories'] as $cat): ?>
                        <a href="/article?category=<?= urlencode($cat['name']) ?><?= !empty($data['currentKeyword']) ? '&q='.urlencode($data['currentKeyword']) : '' ?>" 
                           class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors <?= ($data['currentCategory'] ?? '') === $cat['name'] ? 'bg-slate-900 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' ?>">
                            <?= htmlspecialchars($cat['name']) ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Search Bar -->
            <form action="/article" method="GET" class="relative w-full md:w-72">
                <?php if(!empty($data['currentCategory'])): ?>
                    <input type="hidden" name="category" value="<?= htmlspecialchars($data['currentCategory']) ?>">
                <?php endif; ?>
                <input 
                    type="text" 
                    name="q" 
                    value="<?= htmlspecialchars($data['currentKeyword'] ?? '') ?>"
                    placeholder="Cari topik..." 
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent text-sm bg-white shadow-sm">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </form>
        </div>

        <!-- Article List -->
        <div class="max-w-5xl mx-auto space-y-6">
            <?php 
                // Pass posts data to card.php 
                // card.php expects $post variable in a loop OR we can adapt it.
                // The previous card.php seemed to handle the loop itself or was included inside a loop?
                // Let's check card.php content again. 
                // Previous inspection showed card.php was a single component. 
                // Wait, the previous implementation in article.php had `require 'card.php'` inside a grid div.
                // Let's look at how card.php is implemented. It seems to have its own loop if data is not passed, OR we should loop here.
                
                // Refactoring: Let's loop here and include a 'card-item.php' or adapt 'card.php' to be just the item.
                // BUT, to minimize changes, let's see what card.php does.
                // It likely needs $data['posts'] which we just passed.
                require 'card.php';
            ?>
        </div>

        <!-- Pagination (Minimal - Static for now as per plan focus on Search) -->
        <div class="mt-16 flex justify-center gap-2">
            <!-- Pagination logic would go here -->
        </div>

    </div>
</div>
</body>
</html>