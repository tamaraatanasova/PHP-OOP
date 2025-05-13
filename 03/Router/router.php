<?php

$routes = [
    "/" => __DIR__ . "/../Controllers/HomepageController.php",
    "/create" => __DIR__ . "/../Controllers/CreateController.php",
    "/createhandler" => __DIR__ . "/../Controllers/CreateHandler.php",
    "/company" => __DIR__ . "/../Controllers/Generate.Handler.php",
    "/company/" => __DIR__ . "/../Controllers/CompanyPageController.php",
];

$requestedPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (array_key_exists($requestedPath, $routes)) {
    $filePath = $routes[$requestedPath];
    if (file_exists($filePath)) {
        require_once $filePath;
    }
} else {
    http_response_code(404);
    echo "404 Not Found";
}
