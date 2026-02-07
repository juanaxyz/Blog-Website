<!-- Minimalist Editor -->
<div class="bg-white min-h-screen pb-20">

    <form action="/article/add-article" method="POST" enctype="multipart/form-data" class="max-w-5xl mx-auto">
        
        <!-- Editor Header -->
        <div class="sticky top-0 z-30 bg-white/95 backdrop-blur-sm border-b border-slate-100 py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <a href="/dashboard" class="p-2 text-slate-400 hover:text-slate-900 transition-colors rounded-full hover:bg-slate-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <span class="text-sm font-medium text-slate-500">Menulis Artikel Baru</span>
            </div>
            
            <div class="flex items-center gap-3">
                <button type="button" class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-colors">
                    Simpan Draft
                </button>
                <div class="relative">
                    <select name="status" class="appearance-none bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium pl-4 pr-8 py-2 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-slate-900 transition-colors">
                        <option value="Draft">Draft</option>
                        <option value="Publish">Publish</option>
                    </select>
                     <svg class="w-4 h-4 text-slate-500 absolute right-3 top-2.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
                <button type="submit" class="px-5 py-2 text-sm font-medium bg-green-600 text-white hover:bg-green-700 rounded-lg shadow-sm hover:shadow transition-all">
                    Publikasikan
                </button>
            </div>
        </div>

        <!-- Editor Content -->
        <div class="px-4 sm:px-6 lg:px-8 py-12 max-w-4xl mx-auto space-y-8">
            
            <!-- Thumbnail Upload (Cover Image style) -->
            <div class="group relative aspect-video bg-slate-50 border-2 border-dashed border-slate-200 rounded-xl overflow-hidden hover:border-slate-300 transition-colors flex items-center justify-center cursor-pointer">
                <input type="file" name="gambar" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                
                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-slate-200 group-hover:text-slate-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-sm font-medium text-slate-600">Tambahkan Cover Image</p>
                    <p class="text-xs text-slate-400 mt-1">Klik atau drag gambar ke sini</p>
                </div>
                

            </div>

            <!-- Title Input (Notion style) -->
            <div>
                <input 
                    type="text" 
                    name="judul" 
                    placeholder="Judul Artikel..." 
                    class="w-full text-5xl font-bold text-slate-900 placeholder-slate-300 border-none focus:ring-0 p-0 bg-transparent"
                    autocomplete="off"
                    required>
            </div>

            <!-- Meta Inputs Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Category -->
                 <div class="relative">
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-widest mb-2">Kategori</label>
                    <input
                        type="text"
                        name="category"
                        list="category-list"
                        placeholder="Pilih Kategori"
                        class="w-full bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-4 py-2.5 outline-none transition-all">
                    <datalist id="category-list">
                        <?php foreach ($data['listCategories'] as $cat): ?>
                            <option value="<?= htmlspecialchars($cat['name']) ?>"><?= htmlspecialchars($cat['name']) ?></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>

                <!-- Slug -->
                <div>
                     <label class="block text-xs font-semibold text-slate-400 uppercase tracking-widest mb-2">Slug</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-slate-500 bg-slate-50 border border-r-0 border-slate-200 rounded-l-lg">
                            /article/
                        </span>
                        <input type="text" name="slug" class="rounded-none rounded-r-lg bg-slate-50 border border-slate-200 text-slate-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 outline-none transition-all" placeholder="url-slug">
                    </div>
                </div>
            </div>

            <!-- Editor -->
<div class="max-w-none">
                <textarea
                    id="tiny-mce"
                    name="konten"
                    class="w-full min-h-[500px] border-none focus:ring-0 resize-none outline-none"
                    placeholder="Tulis ceritamu di sini..."></textarea>
            </div>

        </div>

    </form>
</div>


</body>
</html>