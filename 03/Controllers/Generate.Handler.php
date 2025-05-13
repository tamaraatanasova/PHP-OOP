<?php
require_once __DIR__ .'/../Config/autoload.php';

use Template\Calsses\Database;
use Template\Calsses\Query;
use Template\Calsses\Redirector;
use Template\Calsses\SessionManager;


SessionManager::start();

$database = new Database();
$dbConnection = $database->getConnection();
$query = new Query($dbConnection);

if (SessionManager::has('company_id')) {
    $companyId = SessionManager::get('company_id');

    $company = $query->find('company_info', $companyId, 'id', true);
    $products_services = $query->find('products_services', $companyId, 'company_id', false);

    SessionManager::set('companyInfo', $company);
    SessionManager::set('productsServices', $products_services);

    Redirector::redirect('/company/');
} else {
    echo "No company ID provided.";
}
 SessionManager::destroy();