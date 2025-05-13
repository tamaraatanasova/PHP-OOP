<?php

use Registration\Classes\SessionManager;
use Registration\Classes\Query;
use Registration\Classes\Database;
use Registration\Classes\Redirect;

SessionManager::start();
$database = new Database();
$db = $database->getConnection();
$query = new Query($db);

$modelName = $_POST['model_name'];

if ($query->modelExists($modelName)) {
    SessionManager::set('errors', 'Model name already exists');
    Redirect::redirect('/admin');
} else {
    $data = [
        'name' => $modelName,
    ];

    $query->insert('models', $data);
    Redirect::redirect('/admin');
}
