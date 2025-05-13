<nav class="navbar navbar-expand-lg sticky-top z-3 bg-dark bg-opacity-25 py-3">
    <div class="container-fluid">
        <a class="navbar-brand text-white fs-4" href="/">Vehicle Registration</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        \Registration\Classes\SessionManager::start();
        $currentPath = $_SERVER['REQUEST_URI'];

        if ($currentPath === '/login') {
            include 'nav.partials.back.html';
        } else {
            include 'nav.partial.login.html';
        }
        ?>

    </div>
</nav>
