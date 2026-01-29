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

- Basic routing dan template sudah ada (`Router`, controller, view).
- Form tambah artikel ada di [app/views/addArticle.php](app/views/addArticle.php).
- Penyimpanan artikel via `Article::addNewArticle()` namun ada beberapa perbaikan yang diperlukan (uid/cid handling, slug, content handling).

## To-Do List (Kedepannya)

### Penyelesaian Halaman

- [ ] Selesaikan halaman dashboard
- [ ] Selesaikan halaman edit artikel
- [ ] Tambahkan fitur delete artikel
- [ ] Selesaikan halaman contact

### Fitur Penambahan Konten

- [ ] Integrasi editor WYSIWYG (TinyMCE/Quill) di [app/views/addArticle.php](app/views/addArticle.php)
- [ ] Implementasi sanitasi dan penyimpanan HTML yang aman di [app/Models/Article.php](app/Models/Article.php)
- [ ] Perbaiki pembuatan user id / category id pada `addNewArticle()`
- [ ] Validasi form & feedback (success/error) pada UI
- [ ] Penanganan upload gambar: thumbnail profiling, path storage, dan keamanan file

### Peningkatan Routing & Flow

- [ ] Perbaiki dan konsolidasikan rute menggunakan [app/App/Router.php](app/App/Router.php) secara konsisten
- [ ] Tambahkan paginasi dan pencarian artikel
- [ ] Tambah unit test dasar untuk model (composer + phpunit)
