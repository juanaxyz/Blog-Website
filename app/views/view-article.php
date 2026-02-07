

<!-- Reading Progress Bar -->
<div id="reading-progress" class="fixed top-16 left-0 h-1 bg-blue-600 z-40 w-0 transition-all duration-100"></div>

<?php foreach ($posts as $post): ?>
<article class="bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-20">
        
        <!-- Article Header -->
        <header class="max-w-3xl mx-auto text-center mb-10">
            <span class="inline-block px-3 py-1 text-xs font-bold tracking-wider text-blue-600 uppercase bg-blue-50 rounded-full mb-6">
                <?= htmlspecialchars($post['name'] ?? 'Article') ?>
            </span>
            
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-8 leading-tight font-heading">
                <?= htmlspecialchars($post['title']) ?>
            </h1>
            
            <div class="flex items-center justify-center gap-4 text-sm text-slate-600">
                <div class="flex items-center gap-2">
                    <img src="/image-profile?file=<?= $post['profile'] ?? '' ?>" alt="Author" class="w-10 h-10 rounded-full bg-slate-200 object-cover">
                    <div class="text-left">
                        <p class="font-semibold text-slate-900"><?= htmlspecialchars($post['username'] ?? 'Admin') ?></p>
                        <p class="text-xs text-slate-500"><?= date('M d, Y', strtotime($post['created_at'])) ?> · 5 min read</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        <figure class="max-w-5xl mx-auto mb-16 rounded-2xl overflow-hidden shadow-lg aspect-video">
            <img 
                src="/image?file=<?= htmlspecialchars($post['gambar']) ?>"
                alt="<?= htmlspecialchars($post['title']) ?>"
                class="w-full h-full object-cover">
        </figure>

        <!-- Article Content -->
        <div class="max-w-[720px] mx-auto">
            <div class="prose prose-lg prose-slate max-w-none 
                        prose-headings:font-bold prose-headings:text-slate-900 prose-headings:font-heading 
                        prose-p:text-slate-700 prose-p:leading-relaxed prose-p:mb-6
                        prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline
                        prose-img:rounded-xl prose-img:shadow-md
                        prose-blockquote:border-l-4 prose-blockquote:border-blue-500 prose-blockquote:bg-blue-50/30 prose-blockquote:py-2 prose-blockquote:px-6 prose-blockquote:rounded-r-lg prose-blockquote:italic
                        first-letter:text-5xl first-letter:font-bold first-letter:text-slate-900 first-letter:mr-3 first-letter:float-left">
                
                <?= $post['content'] ?>
                
            </div>

            <!-- Tags & Share -->
            <div class="mt-16 pt-8 border-t border-slate-100">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex gap-2">
                        <span class="text-sm font-medium text-slate-500 mr-2">Tags:</span>
                        <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-md text-sm hover:bg-slate-200 cursor-pointer transition">#<?= htmlspecialchars($post['name']) ?></span>
                        <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-md text-sm hover:bg-slate-200 cursor-pointer transition">#Blog</span>
                    </div>
                    
                    <div class="flex gap-2">
                        <button class="p-2 rounded-full hover:bg-slate-100 text-slate-500 hover:text-blue-500 transition" title="Share on Twitter">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </button>
                        <button class="p-2 rounded-full hover:bg-slate-100 text-slate-500 hover:text-blue-600 transition" title="Share on Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.791-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </button>
                        <button class="p-2 rounded-full hover:bg-slate-100 text-slate-500 hover:text-pink-600 transition" title="Copy Link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<?php endforeach; ?>

<script>
    // Reading Progress Bar
    window.onscroll = function() {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height) * 100;
        document.getElementById("reading-progress").style.width = scrolled + "%";
    };
</script>