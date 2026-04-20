<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card mt-5 shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center mb-4"><?= $lang['login_title'] ?? 'Giriş Yap' ?></h3>
                
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error'] ?>
                        <?php unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <form action="/login" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label"><?= $lang['email'] ?? 'E-posta' ?></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><?= $lang['password'] ?? 'Şifre' ?></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary"><?= $lang['login_button'] ?? 'Giriş' ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
