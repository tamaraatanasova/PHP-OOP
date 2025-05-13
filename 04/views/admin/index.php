<?php
use Registration\Classes\SessionManager;

SessionManager::start();
$errors = SessionManager::has("errors") ? SessionManager::get("errors") : [];
$success = SessionManager::has('success') ? SessionManager::get('success') : [];

if (!is_array($errors)) {
    $errors = [$errors];
}
if (!is_array($success)) {
    $success = [$success];
}
SessionManager::destroy();

?>


<?php require_once __DIR__. '/partials/top.partial.html';?>

<?php require_once __DIR__. '/partials/navbar.php';?>


<section class="m-3 p-3">
    <?php if (!empty($errors)): ?>

        <ul>
            <?php foreach ($errors as $error): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endforeach; ?>
        </ul>

    <?php endif;?>

    <?php if (!empty($success)): ?>

        <ul>
            <?php foreach ($success as $succes): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($succes); ?>
                </div>
            <?php endforeach; ?>
        </ul>

    <?php endif;?>

    <?php require_once __DIR__. '/partials/form.section.php';?>
</section>


<?php require_once __DIR__. '/partials/bottom.partial.html';?>