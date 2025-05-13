<?php
use Template\Calsses\SessionManager;
use Template\Calsses\Database;
use Template\Calsses\Query;
use Template\Calsses\Redirector;

SessionManager::start();

if(!SessionManager::has('company_id')){
   Redirector::redirect('/');
}

$companyInfo = SessionManager::has('companyInfo') ? SessionManager::get('companyInfo') : [];
$productsServices = SessionManager::has('productsServices') ? SessionManager::get('productsServices') : [];

$typeId = $companyInfo->type ?? null;
$typeName = '';

if ($typeId !== null) {
    $db = new Database();
    $pdo = $db->getConnection();
    $query = new Query($pdo);

    $typeInfo = $query->find('service_types', $typeId, 'id', true);
    $typeName = $typeInfo ? $typeInfo->name : '';
}
?>
<!-- header-->
<?php require_once __DIR__ . '/Partials/header.dynamic.php'; ?>
<!-- navbar-->
<?php require_once __DIR__ .'/Partials/navbar.php';?>

<main>
    <!--    Hero section-->
    <?php require_once __DIR__ . '/Partials/hero.partial.php';?>


    <!--    About us section-->
    <?php require_once __DIR__ . '/Partials/aboutUs.partial.php';?>


    <!--    Services/Products section-->
    <?php require_once __DIR__ . '/Partials/Services_Products.php';?>


    <!--    Contact us section-->
    <?php require_once __DIR__ . '/Partials/contact.partial.php';?>

</main>

<!-- footer-->
<?php require_once __DIR__ . '/Partials/footer.dynamic.php'; ?>
