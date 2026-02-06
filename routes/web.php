<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '/home') {
    require BASE_PATH . '/app/controllers/HomeController.php';
    $controller = new HomeController();
    $controller->index();
} else if($uri === '/article') {
    require BASE_PATH . '/app/controllers/ArticleController.php';
    (new ArticleController())->index();
} else if($uri === '/contact') {
    require BASE_PATH . '/app/controllers/HomeController.php';
    (new HomeController())->contact();
}
else {
    http_response_code(404);
    echo "404 Not Found";
}
