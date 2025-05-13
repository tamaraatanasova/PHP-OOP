<?php

use Registration\Classes\SessionManager;
use Registration\Classes\Query;
use Registration\Classes\Database;
use Registration\Classes\Redirect;

SessionManager::start();
$database = new Database();
$db = $database->getConnection();
$query = new Query($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    if (!empty($_POST['id']) && !empty($_POST['model_name'])) {
        $modelName = $_POST['model_name'];
        $id = $_POST['id'];

        $existingModel = $query->find('models', $modelName, 'name', true);

        if ($existingModel && $existingModel->id != $id) {
            SessionManager::set('errors', 'Model name already exists');
            Redirect::redirect('/admin');
        } else {
            $data = ['name' => $modelName];
            $query->update('models', $data, ['id' => $id]);
            Redirect::redirect('/admin');
        }
    }
}

Redirect::redirect('/admin');

SessionManager::destroy();
