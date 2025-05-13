<section id="Service_Product" class="container">
    <div class="row">
        <?php foreach ($productsServices as $index => $productService): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="<?= htmlspecialchars($productService->url, ENT_QUOTES, 'UTF-8'); ?>"
                         class="card-img-top"
                         alt="<?= htmlspecialchars($productService->description, ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= htmlspecialchars($typeName, ENT_QUOTES, 'UTF-8') .' ' . ($index + 1); ?> description
                        </h5>
                        <p class="card-text"><?= htmlspecialchars($productService->description, ENT_QUOTES, 'UTF-8'); ?></p>

                        <?php
                        $updatedAt = new DateTime($productService->updated_at);
                        $now = new DateTime();
                        $interval = $now->diff($updatedAt);

                        $minutes = $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;
                        $hours = $interval->days * 24 + $interval->h;
                        ?>

                        <p class="card-text">
                            <small class="text-body-secondary">
                                Last updated <?= ($hours !== 0) ? $hours. ' hours,': ''; ?>  <?= $minutes; ?> minutes ago
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>