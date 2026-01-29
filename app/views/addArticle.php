<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script> -->


<div class="bg-slate-100 min-h-screen">

    <!-- Header -->
    <header class="bg-gradient-to-br from-cyan-500 to-sky-600 text-white shadow-md">
        <h1 class="text-2xl font-bold text-center py-5">
            📝 Tambah Article Gblog
        </h1>
    </header>

    <!-- Form Container -->
    <main class="flex justify-center mt-10">
        <form
            action="/article/add-article"
            method="POST"
            enctype="multipart/form-data"
            class="w-full max-w-2xl bg-white p-8 rounded-xl shadow-lg space-y-6">

            <!-- Judul -->
            <div>
                <label class="block font-semibold mb-1">Judul</label>
                <input
                    type="text"
                    name="judul"
                    placeholder="Masukkan judul artikel"
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
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
            </div>

            <!-- Konten -->
            <div>
                <label class="block font-semibold mb-1">Isi Artikel</label>
                <textarea
                    name="konten"
                    rows="10"
                    id="content"
                    placeholder="Ketik artikel di sini..."
                    class="w-full p-3 border rounded-md resize-y focus:outline-none focus:ring-2 focus:ring-sky-400"></textarea>
            </div>

            <!-- Status -->
            <div>
                <label class="block font-semibold mb-1">Status</label>
                <select
                    name="status"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <!-- Gambar -->
            <div>
                <label class="block font-semibold mb-1">Gambar Thumbnail</label>
                <input
                    type="file"
                    name="gambar"
                    class="block w-full text-sm text-slate-600
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-md file:border-0
                           file:bg-sky-500 file:text-white
                           hover:file:bg-sky-600 cursor-pointer">
            </div>

            <!-- Button -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="bg-sky-500 hover:bg-sky-600 text-white font-bold px-6 py-3 rounded-lg shadow-md transition-all duration-200">
                    Tambah Artikel
                </button>
            </div>

        </form>
    </main>

</div>

</html>