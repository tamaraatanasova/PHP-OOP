<section class="hero" style="background: linear-gradient(rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.2)), url('<?= htmlspecialchars($companyInfo->cover_image_url, ENT_QUOTES, 'UTF-8'); ?>') no-repeat center top / cover;">
    <div class="d-flex flex-column justify-content-between h-100">
        <p class="display-1 pt-3"><?= htmlspecialchars($companyInfo->title); ?></p>
        <p class="display-3 mt-auto mb-auto"><?= htmlspecialchars($companyInfo->subtitle); ?></p>
    </div>
</section>