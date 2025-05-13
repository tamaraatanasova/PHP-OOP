<section id="Contact">
    <div class="container mt-5">
        <div class="row">
            <!-- Left side: Text content -->
            <div class="col-md-6">
                <h2 class="mb-4">Contact</h2>
                <p>
                    <?= htmlspecialchars($companyInfo->companyDescription); ?>
                </p>
            </div>
            <!-- Right side: Form -->
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Write your message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>
