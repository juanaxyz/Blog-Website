# JunsBlog

Merupakan project blog sederhana berbasis PHP (MVC).

## Struktur & Entrypoint

- Front controller: [public/index.php](public/index.php)
- Router: [app/App/Router.php](app/App/Router.php)
- Controller article: [app/Controller/ArticleController.php](app/Controller/ArticleController.php)
- Model article: [app/Models/Article.php](app/Models/Article.php)
- View tambah artikel: [app/views/addArticle.php](app/views/addArticle.php)
- View lihat artikel: [app/views/view-article.php](app/views/view-article.php)
- Helper view loader: [app/helpers/view.php](app/helpers/view.php)
- DB dump contoh: [gblog-dump.sql](gblog-dump.sql)

## Cara Jalankan Singkat

1. Pastikan PHP + MySQL terpasang.
2. Import [gblog-dump.sql](gblog-dump.sql) ke database `gblog`.
3. Sesuaikan koneksi di [config/database.php](config/database.php).
4. Arahkan webserver ke folder `public/` (document root).

## Status Saat Ini

✅ **Fitur yang Sudah Selesai:**
- Routing menggunakan Router class
- Halaman home dengan hero, featured articles, features, stats, newsletter
- Halaman contact dengan form dan info cards
- Halaman article dengan card component responsive
- Tambah artikel dengan editor TinyMCE
- Edit artikel dengan hidden ID input (fix status Draft/Publish)
- Delete artikel
- Dashboard admin
- Footer dengan links, categories, contact info
- Responsive design mobile & desktop

## Next To-Do List (Prioritas)

### 🔍 Fitur Pencarian & Filter
- [ ] **Implement search functionality** - Search bar di halaman article belum berfungsi penuh
- [ ] **Category filtering** - Filter artikel berdasarkan kategori di article page
- [ ] **Search di navbar** - Tambah search box di navbar untuk akses cepat

### 📋 Pagination & Load More
- [ ] **Implement pagination** - Tambahkan pagination untuk article list (current: load semua)
- [ ] **Load more button** - Alternative untuk infinite scroll di mobile

### 📧 Contact Form & Email
- [ ] **Contact form submission** - Implement form submission & validation
- [ ] **Email notification** - Kirim email ke admin ketika ada pesan contact
- [ ] **Admin contact management** - Halaman untuk manage contact messages

### 📰 Newsletter
- [ ] **Newsletter subscription** - Implement database & backend untuk newsletter signup
- [ ] **Email subscription** - Kirim artikel terbaru ke subscriber

### ⚙️ Optimasi & UX
- [ ] **Lazy loading images** - Optimize image loading dengan lazy load
- [ ] **Breadcrumb navigation** - Tambah breadcrumb di halaman detail
- [ ] **SEO optimization** - Add meta tags, sitemap, robots.txt
- [ ] **Loading skeleton** - Tambah skeleton loading untuk better UX
- [ ] **Toast notifications** - Toast untuk success/error messages

### 🛡️ Security & Admin
- [ ] **Input validation** - Server-side validation di semua form
- [ ] **CSRF protection** - Tambah CSRF token untuk form
- [ ] **Rate limiting** - Limit requests untuk mencegah abuse
- [ ] **Article drafts** - Implementasi draft & published state fully

### 📱 Mobile Optimization
- [ ] **Mobile menu improvements** - Enhance mobile hamburger menu
- [ ] **Touch gestures** - Add swipe untuk navigate articles
- [ ] **Mobile form optimization** - Lebih baik untuk input di mobile

### 🧪 Testing & Documentation
- [ ] **Unit tests** - Test untuk model Article & User
- [ ] **Feature tests** - Test flow article creation & edit
- [ ] **API documentation** - Dokumentasi endpoint jika ada
- [ ] **Code comments** - Tambah comments di kode kompleks

## Known Issues
- ❌ Search di article page belum berfungsi
- ❌ Newsletter form belum submit ke backend
- ❌ Contact form belum submit ke backend
- ❌ Pagination belum implemented
- ❌ Category filter belum berfungsi
