<?php
require_once __DIR__ . '/../../Config/autoload.php';

use Template\Calsses\SessionManager;

SessionManager::start();

$data = SessionManager::get('form_data') ?? [];
$errors = SessionManager::has('errors') ? SessionManager::get('errors') : [];

SessionManager::destroy();
?>
<?php require __DIR__ . '/Partials/header.php'; ?>

<div class="create p-3">
    <form action="/createhandler" method="post" class="mb-4">
        <h1 class="text-center display-6">You are one step away from your webpage</h1>
        <div class="row col-11 mx-auto">

            <div class="col">
                <div class="m-4 p-3 bg-white text-dark rounded-3 shadow">

                    <div class="mb-4">
                        <label for="coverImgUrl" class="form-label">Cover Image URL</label>
                        <input type="text" class="form-control" id="coverImgUrl" name="coverImgUrl" value="<?= htmlspecialchars($data['coverImgUrl'] ?? ''); ?>">
                        <?php if (isset($errors['coverImgUrl'])): ?>
                            <div class="text-danger"><?= $errors['coverImgUrl']; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-4">
                        <label for="mainTitle" class="form-label">Main Title of Page</label>
                        <input type="text" class="form-control" id="mainTitle" name="mainTitle" value="<?= htmlspecialchars($data['mainTitle'] ?? ''); ?>">
                        <?php if (isset($errors['mainTitle'])): ?>
                            <div class="text-danger"><?= $errors['mainTitle']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="subtitle" class="form-label">Subtitle of Page</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?= htmlspecialchars($data['subtitle'] ?? ''); ?>">
                        <?php if (isset($errors['subtitle'])): ?>
                            <div class="text-danger"><?= $errors['subtitle']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="somethingAboutYou" class="form-label">Something about you</label>
                        <textarea class="form-control" id="somethingAboutYou" name="somethingAboutYou" rows="2"><?= htmlspecialchars($data['somethingAboutYou'] ?? ''); ?></textarea>
                        <?php if (isset($errors['somethingAboutYou'])): ?>
                            <div class="text-danger"><?= $errors['somethingAboutYou']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label">Your telephone number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($data['phone'] ?? ''); ?>">
                        <?php if (isset($errors['phone'])): ?>
                            <div class="text-danger"><?= $errors['phone']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="<?= htmlspecialchars($data['location'] ?? ''); ?>">
                        <?php if (isset($errors['location'])): ?>
                            <div class="text-danger"><?= $errors['location']; ?></div>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="m-4 p-3 bg-white text-dark rounded-3 shadow">
                    <div class="mb-4">
                        <label for="type" class="form-label">Do you provide services or products?</label>
                        <select name="type" class="form-select" id="type">
                            <option selected disabled>Choose one option</option>
                            <option value="services" <?= isset($data['type']) && $data['type'] === 'services' ? 'selected' : ''; ?>>Services</option>
                            <option value="products" <?= isset($data['type']) && $data['type'] === 'products' ? 'selected' : ''; ?>>Products</option>
                        </select>
                        <?php if (isset($errors['type'])): ?>
                            <div class="text-danger"><?= $errors['type']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>


            <div class="col">
                <div class="m-4 p-3 bg-white text-dark rounded-3 shadow"> 
                    
                    <p class="fs-6">Provide url for an image and descripton of your service/description</p> 

                    <div class="mb-4">
                        <label for="url1" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="url1" name="url1" value="<?= htmlspecialchars($data['url1'] ?? ''); ?>">
                        <?php if (isset($errors['url1'])): ?>
                            <div class="text-danger"><?= $errors['url1']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="description1" class="form-label">Description of service/product</label>
                        <textarea class="form-control" id="description1" name="description1" rows="2"><?= htmlspecialchars($data['description1'] ?? ''); ?></textarea>
                        <?php if (isset($errors['description1'])): ?>
                            <div class="text-danger"><?= $errors['description1']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="url2" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="url2" name="url2" value="<?= htmlspecialchars($data['url2'] ?? ''); ?>">
                        <?php if (isset($errors['url2'])): ?>
                            <div class="text-danger"><?= $errors['url2']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="description2" class="form-label">Description of service/product</label>
                        <textarea class="form-control" id="description2" name="description2" rows="2"><?= htmlspecialchars($data['description2'] ?? ''); ?></textarea>
                        <?php if (isset($errors['description2'])): ?>
                            <div class="text-danger"><?= $errors['description2']; ?></div>
                        <?php endif; ?>
                    </div>
            
                    <div class="mb-4">
                        <label for="url3" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="url3" name="url3" value="<?= htmlspecialchars($data['url3'] ?? ''); ?>">
                        <?php if (isset($errors['url3'])): ?>
                            <div class="text-danger"><?= $errors['url3']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="description3" class="form-label">Description of service/product</label>
                        <textarea class="form-control" id="description3" name="description3" rows="2"><?= htmlspecialchars($data['description3'] ?? ''); ?></textarea>
                        <?php if (isset($errors['description3'])): ?>
                            <div class="text-danger"><?= $errors['description3']; ?></div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

            <div class="col">
                <div class="m-4 p-3 bg-white text-dark rounded-3 shadow">  

                    <div class="mb-4">
                        <label for="companyDescription" class="form-label">Provide a description of your company, something people should be aware of before they contact you:</label>
                        <textarea class="form-control" id="companyDescription" name="companyDescription" rows="2"><?= htmlspecialchars($data['companyDescription'] ?? ''); ?></textarea>
                        <?php if (isset($errors['companyDescription'])): ?>
                            <div class="text-danger"><?= $errors['companyDescription']; ?></div>
                        <?php endif; ?>
                    </div>

                    <hr class="text-secondary">

                    <div class="mb-4">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?= htmlspecialchars($data['linkedin'] ?? ''); ?>">
                        <?php if (isset($errors['linkedin'])): ?>
                            <div class="text-danger"><?= $errors['linkedin']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="<?= htmlspecialchars($data['facebook'] ?? ''); ?>">
                        <?php if (isset($errors['facebook'])): ?>
                            <div class="text-danger"><?= $errors['facebook']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="tweeter" class="form-label">Tweeter</label>
                        <input type="text" class="form-control" id="tweeter" name="tweeter" value="<?= htmlspecialchars($data['tweeter'] ?? ''); ?>">
                        <?php if (isset($errors['tweeter'])): ?>
                            <div class="text-danger"><?= $errors['tweeter']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="google" class="form-label">Google+</label>
                        <input type="text" class="form-control" id="google" name="google" value="<?= htmlspecialchars($data['google'] ?? ''); ?>">
                        <?php if (isset($errors['google'])): ?>
                            <div class="text-danger"><?= $errors['google']; ?></div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

        </div>

        <div class="d-grid gap-2 col-5 mx-auto">
            <button type="submit" class="btn btn-secondary btn-sm" name="create">Submit></button>
        </div>
        
    </form>
</div>

<?php  require __DIR__ . '/Partials/footer.php';?>