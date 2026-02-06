<?php foreach ($posts as $post): ?>
    <article class="max-w-4xl mx-auto mb-16 bg-white rounded-xl shadow overflow-hidden">

        <!-- Thumbnail -->
        <div class="w-full h-64 md:h-80 overflow-hidden">
            <img
                src="/image?file=<?= htmlspecialchars($post['gambar']) ?>"
                alt="<?= htmlspecialchars($post['title']) ?>"
                class="w-full h-full object-cover">
        </div>

        <!-- Content -->
        <div class="p-6 md:p-10">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                <?= htmlspecialchars($post['title']) ?>
            </h1>

            <!-- Meta (optional) -->
            <!-- <div class="text-sm text-gray-500 mb-6">
                Oleh <span class="font-medium"><?= htmlspecialchars($post['username']) ?></span>
                • <?= date('d M Y', strtotime($post['created_at'])) ?>
            </div> -->

            <!-- Article body -->
            <div class="prose prose-slate max-w-none">
                
                <?= $post['content'] ?>
            </div>
        </div>

    </article>
<?php endforeach; ?>