<?php

require_once __DIR__.'/../Config/autoload.php';

use Template\Calsses\Validation;
use Template\Calsses\SessionManager;
use Template\Calsses\Redirector;
use Template\Calsses\Database;
use Template\Calsses\Query;

if (strpos($_SERVER['HTTP_REFERER'], '/create') === false) {
    Redirector::redirect('/create');
}

SessionManager::start();

$data = $_POST;
$errors = Validation::validate($data) ?? [];
$success = 'Successfully Created!';


if(!empty($errors)) {
    SessionManager::set('form_data', $data);
    SessionManager::set('errors', $errors);
    Redirector::redirect('/create');
}

$companyInfoData = [
    'cover_image_url' => $data['coverImgUrl'],
    'title' => $data['mainTitle'],
    'subtitle' => $data['subtitle'],
    'somethingAboutYou' => $data['somethingAboutYou'],
    'phone' => $data['phone'],
    'location' => $data['location'],
    'companyDescription' => $data['companyDescription'],
    'type' => ($data['type'] === 'services') ? '1' : '2',
    'linkedin_url' => $data['linkedin'],
    'tweeter_url' => $data['tweeter'],
    'facebook_url' => $data['facebook'],
    'google_url' => $data['google'],
];

$about = [
    1 => [
        'url1' => $data['url1'],
        'description1' => $data['description1'],
    ],
    2 =>[
        'url2' => $data['url2'],
        'description2' => $data['description2'],
    ],

    3 => [
        'url3' => $data['url3'],
        'description3' => $data['description3'],
    ],
];


$db = new Database();
$pdo = $db->getConnection();
$query = new Query($pdo);

$query->insert('company_info', $companyInfoData);
$companyId = $pdo->lastInsertId();

foreach ($about as $key => $value) {
    $query->insert('products_services', [
        'company_id' => $companyId,
        'url' => $value['url' . $key],
        'description' => $value['description' . $key],
    ]);
}



SessionManager::set('company_id', $companyId);
Redirector::redirect('/company');