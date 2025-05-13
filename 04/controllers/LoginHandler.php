<?php

require_once '../core/autoloader.php';

use Registration\Classes\SessionManager;
use Registration\Classes\Redirect;
use Registration\Classes\Database;
use Registration\Classes\Query;

if (isset($_POST['login']) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $database = new Database();
    $db = $database->getConnection();
    $query = new Query($db);
    $user = $query->find('users', $username, 'username', true);

    if ($user && password_verify($password, $user->password)) {
        SessionManager::start();
        SessionManager::set('admin', $user->username);
        Redirect::redirect('/admin');
    } else {
        $errorMessage = 'Invalid username or password!';
        Redirect::redirect('/login');
    }
}