<section id="aboutUS" class="py-5">
    <div class="container text-center mb-4">
        <h1 class="display-4 mb-4">About Us</h1>
        <p class="lead">
            <?= htmlspecialchars($companyInfo->somethingAboutYou); ?>
        </p>
    </div>

    <div class="container text-center border-top pt-3">
        <p class="mb-2">Tel: <?= htmlspecialchars($companyInfo->phone); ?></p>
        <p class="mb-2">Location: <?= htmlspecialchars($companyInfo->location); ?></p>
    </div>
</section>