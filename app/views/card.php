<?php


use Juns\Blog\Controller\ArticleController;
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');


    .inter-font-bold {
        font-family: "Inter", sans-serif;
        font-optical-sizing: auto;
        font-weight: 900;
        font-style: normal;
    }
</style>


    <div class="div col-span-2 space-y-4 z-1 ">
        <h1 class="text-cyan-500 inter-font-bold md:text-8xl text-6xl">For You </h1>
        <div class="relative md:w-2/3 w-full">
            <!-- Icon -->
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg"
                    x="0px"
                    y="0px"
                    class="w-5 h-5"
                    viewBox="0 0 24 24">
                    <path d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 19.585938 21.585938 C 20.137937 22.137937 21.033938 22.137938 21.585938 21.585938 C 22.137938 21.033938 22.137938 20.137938 21.585938 19.585938 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z"></path>
                </svg>
            </span>

            <!-- Input -->
            <input
                type="text"
                placeholder="Cari artikel..."
                class="w-full pl-10 pr-3 py-2 bg-gray-200 rounded-full focus:outline-none focus:ring focus:ring-blue-300">
        </div>
        <div class="flex gap-3 overflow-x-auto whitespace-nowrap p-2 ">
            <?php
            $post = new ArticleController();
            $categories = $post->getCategories();

            foreach ($categories as $category): ?>
                <h3 class="px-3 py-1 bg-blue-200 rounded-md flex-shrink-0">
                    <?= htmlspecialchars($category['name']) ?>
                </h3>
            <?php endforeach; ?>
        </div>

        <?php
        $articles = $post->getPost();


        ?>
        <?php foreach ($articles as $article): ?>

            <div class="bg-white rounded-xl overflow-hidden shadow transition hover:shadow-xl hover:cursor-pointer
                        grid md:grid-cols-[200px_1fr] grid-cols-1 md:h-48 gap-0">

                <!-- Image Container -->
                <div class="w-full md:w-48 h-40 md:h-full overflow-hidden flex-shrink-0">
                    <img src="/image?file=<?= urlencode($article['gambar']) ?>" 
                         class="w-full h-full object-cover"
                         alt="<?= htmlspecialchars($article['title']) ?>">
                </div>

                <!-- Content Container -->
                <div class="p-4 md:p-4 flex flex-col w-full">

                    <h2 class="font-semibold text-sm md:text-base line-clamp-2">
                        <?= htmlspecialchars($article['title']) ?>
                    </h2>

                    <p class="text-xs md:text-sm text-gray-600 line-clamp-2 mt-1 md:mt-2 flex-grow">
                        <?= $article['slug'] ?>
                    </p>

                    <div class="flex items-center space-x-2 mt-2 text-xs md:text-sm">
                        <img src="/image-profile?file=<?= $article['profile'] ?? '' ?>" 
                             class="w-6 md:w-8 h-6 md:h-8 rounded-full flex-shrink-0"
                             alt="<?= htmlspecialchars($article['username']) ?>">
                        <span class="truncate"><?= htmlspecialchars($article['username']) ?></span>
                    </div>

                    <!-- Category & Read Button -->
                    <div class="flex justify-between items-center w-full mt-3 md:mt-auto gap-2">
                        <span class="bg-blue-500 text-white px-2 md:px-3 py-1 rounded text-xs md:text-sm truncate">
                            <?= htmlspecialchars($article['name']) ?>
                        </span>
                        <a href="/article/view-article?title=<?= urlencode($article['title']) ?>"
                            class="text-blue-600 hover:underline text-xs md:text-sm whitespace-nowrap">
                            Baca →
                        </a>
                    </div>

                </div>
            </div>

        <?php endforeach; ?>

    <!-- <div class="border border-sky-500"></div> -->
</div>