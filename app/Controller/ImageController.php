<?php

namespace Juns\Blog\Controller;

class ImageController
{
    public function show()
    {
        $filename = $_GET['file'] ?? null;

        if (!$filename) {
            http_response_code(400);
            exit('No file');
        }

        $path = __DIR__ . '/../../storage/uploads/thumbnails/' . $filename;

        if (!file_exists($path)) {
            // var_dump($path);
            http_response_code(404);
            exit('Image not found');
        }

        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $mime = match ($ext) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            default => 'application/octet-stream',
        };

        header("Content-Type: $mime");
        readfile($path);
        exit;
    }

    public function showProfile()
    {
        $filename = $_GET['file'] ?? null;

        if (!$filename) {
            http_response_code(400);
            exit('No file');
        }

        $path = __DIR__ . '/../../storage/uploads/profiles/' . $filename;

        if (!file_exists($path)) {

            http_response_code(404);
            exit('Image not found');
        }

        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $mime = match ($ext) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            default => 'application/octet-stream',
        };

        header("Content-Type: $mime");
        readfile($path);
        exit;
    }
}
