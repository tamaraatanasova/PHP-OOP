<?php

// Define all routes and their corresponding controller files
$routes = [
    "/" => __DIR__ . "/../controllers/HomeController.php",
    "/login" => __DIR__ . "/../controllers/LoginController.php",
    "/login/handler" => __DIR__ . "/../controllers/LoginHandler.php",
    "/logout" => __DIR__ . "/../controllers/LogoutController.php",

    "/admin" => __DIR__ . "/../controllers/AdminController.php",

    "/create_model" => __DIR__ . "/../controllers/CreateModelController.php",
    "/search_result" => __DIR__ . "/../controllers/SearchHandler.php",
    "/edit_model" => __DIR__ . "/../controllers/EditModelController.php",
    "/delete_model" => __DIR__ . "/../controllers/DeleteModelController.php",

    "/add_vehicle" => __DIR__ . "/../controllers/AddVehicleController.php",


    "/search_admin" => __DIR__ . "/../controllers/SearchAdminController.php",
];

$requestedPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (array_key_exists($requestedPath, $routes)) {
    $filePath = $routes[$requestedPath];

    if (file_exists($filePath)) {
        require_once $filePath;
    }
}
