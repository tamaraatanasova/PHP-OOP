<?php

use Registration\Classes\SessionManager;
use Registration\Classes\Database;
use Registration\Classes\Query;

SessionManager::start();
$database = new Database();
$db = $database->getConnection();
$query = new Query($db);

if (isset($_POST['search']) || !empty($_POST['search_admin'])) {
    $searchValue = $_POST['search_admin'];
    SessionManager::set('errors', 'Empty search parameter');
    $results = $query->find('registration', $searchValue, 'registration_number, vehicle_chassis_number, vehicle_model_id', false);
    SessionManager::set('search_admin', $results);
}
\Registration\Classes\Redirect::redirect('/admin');