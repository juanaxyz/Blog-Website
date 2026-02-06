<?php

$row = $data['posts']->fetch_assoc();

?>

<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script> -->
<div class="bg-slate-100 min-h-screen">

    <!-- Header -->
    <header class="bg-gradient-to-br from-cyan-500 to-sky-600 text-white shadow-md">
        <h1 class="text-2xl font-bold text-center py-5">
            📝 Edit Article Gblog
        </h1>
    </header>

    <!-- Form Container -->
    <main class="flex justify-center mt-10">
        <form
            action="/article/edit-article"
            method="POST"
            enctype="multipart/form-data"
            class="w-full max-w-2xl bg-white p-8 rounded-xl shadow-lg space-y-6">

            <!-- hidden id -->
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <!-- Judul -->
            <div>
                <label class="block font-semibold mb-1">Judul</label>
                <input
                    type="text"
                    name="judul"
                    placeholder="Masukkan judul artikel"
                    value="<?= $row['title'] ?>"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
            </div>
            <!-- Kategori -->
            <div>
                <label class="block font-semibold mb-1">Kategori</label>
                <input
                    type="text"
                    name="category"
                    list="category-list"
                    placeholder="Masukkan kategori artikel"
                    value="<?= $row['category_name'] ?>"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">

                <datalist id="category-list">

                    <?php foreach ($data['listCategories'] as $cat): ?>
                        <option value="<?= htmlspecialchars($cat['name']) ?>"><?= htmlspecialchars($cat['name']) ?></option>

                    <?php endforeach; ?>
                </datalist>
            </div>

            <!-- Slug -->
            <div>
                <label class="block font-semibold mb-1">Slug</label>
                <input
                    type="text"
                    name="slug"
                    placeholder="contoh: cara-belajar-php"
                    value="<?= $row['slug'] ?>"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
            </div>

            <!-- Konten -->
            <div>
                <label class="block font-semibold mb-1">Isi Artikel</label>
                <textarea
                    id="tiny-mce"
                    name="konten"
                    rows="10"
                    id="content"

                    placeholder="Ketik artikel di sini..."
                    class="w-full p-3 border rounded-md resize-y focus:outline-none focus:ring-2 focus:ring-sky-400"><?= $row['content'] ?></textarea>
            </div>

            <!-- Status -->
            <div>
                <label class="block font-semibold mb-1">Status</label>
                <select
                    name="status"

                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                    <option value="Draft" <?= ($row['status'] == 'Draft') ? 'selected' : '' ?>>Draft</option>
                    <option value="Publish" <?= ($row['status'] == 'Publish') ? 'selected' : '' ?>>Published</option>
                </select>
            </div>

            <!-- Gambar -->
            <div>
                <label class="block font-semibold mb-1">Gambar Thumbnail</label>
                <input
                    type="file"
                    name="gambar"
                    value="<?= $row['gambar'] ?>"
                    class="block w-full text-sm text-slate-600
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-md file:border-0
                           file:bg-sky-500 file:text-white
                           hover:file:bg-sky-600 cursor-pointer">
                <img src="/image?file=<?= urlencode($row['gambar']) ?>" alt="Gambar <?= $row['title'] ?>">
            </div>

            <!-- Button -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="bg-sky-500 hover:bg-sky-600 text-white font-bold px-6 py-3 rounded-lg shadow-md transition-all duration-200">
                    Edit Artikel
                </button>
            </div>

        </form>
    </main>

</div>