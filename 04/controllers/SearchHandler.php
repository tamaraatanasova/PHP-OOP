<?php

use Registration\Classes\SessionManager;
use Registration\Classes\Database;
use Registration\Classes\Query;

SessionManager::start();
$database = new Database();
$db = $database->getConnection();
$query = new Query($db);

if (isset($_POST['search']) || !empty($_POST['search_input'])) {
    $searchValue = $_POST['search_input'];
    SessionManager::set('errors', 'Empty search parameter');
    $results = $query->find('registration', $searchValue, 'registration_number', false);
    SessionManager::set('search', $results);
}

require_once '../views/dashboard/search.result.php';



