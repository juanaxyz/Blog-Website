<?php
$articles = [
    [
        'title' => 'Belajar PHP Native',
        'excerpt' => 'Panduan dasar belajar PHP tanpa framework.',
        'image' => 'https://placehold.co/400',
        'category' => 'makanan',
        'profile' => [
            'name' => 'juana',
            'img' => 'https://placehold.co/100'
        ]
    ],
    [
        'title' => 'Tailwind CSS untuk Pemula',
        'excerpt' => 'Mengenal utility-first CSS dengan Tailwind.',
        'image' => 'https://placehold.co/400',
        'category' => 'tech',
        'profile' => [
            'name' => 'juana',
            'img' => 'https://placehold.co/100'
        ]
    ],
    [
        'title' => 'Anjay',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure fuga aliquam accusantium dolorum aut quo quos, placeat impedit praesentium hic. Minus expedita omnis saepe ipsam quaerat repellat recusandae ut provident vitae tenetur quod maiores vel harum repudiandae, obcaecati nobis adipisci. Dignissimos, iste tenetur! Harum, officia hic corrupti ipsam enim quo laudantium aliquam quos deleniti animi voluptates ad nobis eius est dolores libero totam ratione sunt. Natus ad dolores eos facere! Inventore, beatae assumenda eligendi amet consequatur nobis voluptatibus totam excepturi tenetur, ea blanditiis distinctio possimus molestiae aut. Quia nulla saepe sunt necessitatibus aperiam, repellat dolor provident optio ea reiciendis fugiat.',
        'image' => 'https://placehold.co/400',
        'category' => 'tech',
        'profile' => [
            'name' => 'juana',
            'img' => 'https://placehold.co/100'
        ]
    ]

];
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


<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-5 max-w-5xl mx-auto ">
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
            <h3 class="px-3 py-1 bg-blue-200 rounded-md flex-shrink-0">All</h3>
            <h3 class="px-3 py-1 bg-blue-200 rounded-md flex-shrink-0">Teknologi</h3>
            <h3 class="px-3 py-1 bg-blue-200 rounded-md flex-shrink-0">UI/UX</h3>
            <h3 class="px-3 py-1 bg-blue-200 rounded-md flex-shrink-0">Backend</h3>
            <h3 class="px-3 py-1 bg-blue-200 rounded-md flex-shrink-0">Mobile</h3>
            <h3 class="px-3 py-1 bg-blue-200 rounded-md flex-shrink-0">DevOps</h3>
            <h3 class="px-3 py-1 bg-blue-200 rounded-md flex-shrink-0">AI</h3>
        </div>


        <?php foreach ($articles as $article): ?>

            <!-- desktop -->
            <div class="hidden md:flex h-48  bg-white rounded-xl overflow-hidden shadow transition hover:shadow-xl hover:cursor-pointer">

                <!-- Image -->
                <div class="w-48 flex-shrink-0">
                    <img src="<?= $article['image'] ?>" class="w-full h-full object-cover">
                </div>

                <!-- Content -->
                <div class="p-4 flex flex-col w-full ">

                    <h2 class="font-semibold">
                        <?= $article['title'] ?>
                    </h2>

                    <p class="text-sm text-gray-600 line-clamp-2">
                        <?= $article['excerpt'] ?>
                    </p>

                    <div class="flex items-center space-x-2 mt-2">
                        <img src="<?= $article['profile']['img'] ?>" class="w-8 h-8 rounded-full">
                        <span><?= $article['profile']['name'] ?></span>
                    </div>
                    <!-- category -->
                    <div class="mt-auto md:flex justify-between items-center w-full">
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-md">
                            <?= $article['category'] ?>
                        </span>

                        <a href="/view-article?title=<?= urlencode($article['title']) ?>"
                            class="text-blue-600 hover:underline">
                            Baca →
                        </a>
                    </div>

                </div>
            </div>

            <!-- mobile -->
            <div class="grid grid-cols-1 grid-rows-2 md:hidden  bg-white rounded-xl overflow-hidden shadow transition hover:shadow-xl hover:cursor-pointer">

                <!-- Image -->
                <div class="w-full h-40 ">
                    <img src="<?= $article['image'] ?>" class="w-full h-full object-cover">
                </div>

                <!-- Content -->
                <div class="p-2 flex flex-col w-full ">

                    <h2 class="font-semibold">
                        <?= $article['title'] ?>
                    </h2>

                    <p class="text-sm text-gray-600 line-clamp-2">
                        <?= $article['excerpt'] ?>
                    </p>

                    <div class="flex items-center space-x-2 ">
                        <img src="<?= $article['profile']['img'] ?>" class="w-8 h-8 rounded-full">
                        <span><?= $article['profile']['name'] ?></span>
                    </div>

                    <!-- category -->
                    <div class="mt-auto  flex justify-between items-center w-full">
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-md">
                            <?= $article['category'] ?>
                        </span>

                        <a href="/view-article?title=<?= urlencode($article['title']) ?>"
                            class="text-blue-600 hover:underline">
                            Baca →
                        </a>
                    </div>

                </div>
            </div>


        <?php endforeach; ?>
    </div>
    <div class="border border-red-500 "></div>
    <!-- <div class="border border-sky-500"></div> -->
</div>