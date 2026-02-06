<?php if (isset($_SESSION['error']) or isset($_SESSION['success'])): ?>
    <script>
        alert("<?= htmlspecialchars($_SESSION['error'] ?? $_SESSION['success'] , ENT_QUOTES) ?>");
    </script>
    <?php unset($_SESSION['error']); unset($_SESSION['success']); ?>
<?php endif; ?>


<div class="bg-gray-100 min-h-screen">

    <div class="max-w-6xl mx-auto py-10 px-4">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Dashboard Admin
            </h1>

            <a
                href="/article/add-article"
                class="inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-2.5 rounded-lg font-medium transition">
                + Tambah Artikel Anda
            </a>
        </div>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500 text-sm">Total Artikel</p>
                <h2 class="text-3xl font-bold text-gray-800 mt-2">
                    <?= $data['totalPost'] ?? 0 ?>
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500 text-sm">Kategori</p>
                <h2 class="text-3xl font-bold text-gray-800 mt-2">
                    <?= $data['totalCategory'] ?? 0 ?>
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-500 text-sm">Login Sebagai</p>
                <h2 class="text-lg font-semibold text-gray-800 mt-2">
                    <?= htmlspecialchars($_SESSION['username'] ?? '') ?>
                </h2>
            </div>

        </div>

        <!-- Table Artikel (placeholder) -->
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold text-gray-800">
                    Artikel Terbaru
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="px-6 py-3 text-left">Judul</th>
                            <th class="px-6 py-3 text-left">Kategori</th>
                            <th class="px-6 py-3 text-left">Tanggal</th>
                            <th class="px-6 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <?php if (!empty($data['artikel'])): ?>
                            <?php foreach ($data['artikel'] as $post): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        <?= htmlspecialchars($post['title']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        <?= htmlspecialchars($post['name']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">
                                        <?= date('d M Y', strtotime($post['created_at'])) ?>
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <a href="/edit-article?id=<?= $post['id'] ?>" class="text-sky-600 hover:underline">
                                            Edit
                                        </a>
                                        <a href="/article/delete-article?id=<?= $post['id'] ?>" class="text-red-600 hover:underline">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                    Belum ada artikel
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

</html>