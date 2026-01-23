<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Gblog</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <h1 class="font-bold text-center p-3 text-2xl bg-linear-to-br from-cyan-500 to-sky-500">

        Tambah Article Gblog
    </h1>
    <form action="./add-article.php" method="POST" enctype="multipart/form-data" class="[&>input]:border-1 [&>input]:rounded-sm w-1/2 m-auto border-1 " >
        <label for="judul">Judul</label> <br>
        <input type="text" name="judul" id="" class="w-full p-2 "> <br> <br>
        <label for="slug">Slug</label> <br>
        <input type="text" name="slug" id="" class="w-full p-2"> <br> <br>
        <label for="konten">Isi Artikel</label> <br>

        <textarea rows="25" cols="70" name="konten" id="" class="border-1 " placeholder="ketik artikel disini"></textarea>
        
        <br><br>
        <label for="status">Status : </label>
        <select name="status" id="" class="border-1 rounded-sm px-1 ">
            <option value="draft">draft</option>
            <option value="published">published</option>
        </select>
        <br><br>
        <label for="gambar">Gambar Thumbnail</label> <br>
        <input type="file" name="gambar" id="">
    <br><br>
    <div class="flex justify-end-safe  ">

        <button type="submit" class="mr-5 bg-sky-500 p-2 text-white font-bold rounded-md hover:cursor-pointer hover:bg-sky-700 ">Tambah artikel</button>
        
    </div>
    </form>
</body>
</html>