<?php
use Registration\Classes\SessionManager;
use Registration\Classes\Validator;
use Registration\Classes\Query;
use Registration\Classes\Database;
use Registration\Classes\Redirect;

SessionManager::start();
$database = new Database();
$db = $database->getConnection();
$query = new Query($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    if (!empty($data['vehicle_production_year'])) {
        $data['vehicle_production_year'] = date('Y', strtotime($data['vehicle_production_year']));
    }

    $errors = Validator::validate($data);

    if (!empty($errors)) {
        SessionManager::set('errors', $errors);
    } else {
        try {
            $query->insert('registration', [
                'vehicle_model_id' => $data['vehicle_model_id'],
                'vehicle_type_id' => $data['vehicle_type_id'],
                'vehicle_chassis_number' => $data['vehicle_chassis_number'],
                'vehicle_production_year' => $data['vehicle_production_year'],
                'registration_number' => $data['registration_number'],
                'fuel_type_id' => $data['fuel_type_id'],
                'registration_to' => $data['registration_to']
            ]);

            SessionManager::set('success', 'Form submitted successfully!');
            SessionManager::remove('errors');
        } catch (Exception $e) {
            SessionManager::set('errors', ['Database error: ' . $e->getMessage()]);
        }
    }

    Redirect::redirect('/admin');
}
