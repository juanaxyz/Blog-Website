<?php


foreach ($posts as $post): ?>
    <article>
        <h1 class="font-bold text-2xl"><?= htmlspecialchars($post['judul']) ?></h1>
        <p><?= $post['konten'] ?></p>
    </article>
<?php endforeach; ?>