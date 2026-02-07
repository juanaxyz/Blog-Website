<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'JunsBlog' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        primary: '#111827',
                        accent: '#3B82F6',
                    }
                }
            }
        }
    </script>
    <script src="/assets/js/main.js"></script>
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tiny.cloud/1/v40iwt05pb4pwugya49jiqioq3e3ge9sivzbqlgmtdcqugq3/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/assets/css/app.css">
</head>

<body class="antialiased text-slate-800 bg-slate-50 min-h-screen flex flex-col">
    <?php require  'navbar.php'; ?>