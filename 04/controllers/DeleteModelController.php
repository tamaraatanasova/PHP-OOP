<?php
use Registration\Classes\SessionManager;
use Registration\Classes\Database;
use Registration\Classes\Query;
use Registration\Classes\Redirect;

SessionManager::start();
$database = new Database();
$db = $database->getConnection();
$query = new Query($db);

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    $query->delete('models', $id);
    Redirect::redirect('/admin');

} else {
    Redirect::redirect('/admin');

}

SessionManager::destroy();

