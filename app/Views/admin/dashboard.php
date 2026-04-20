<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $lang['dashboard_title'] ?? 'Yönetim Paneli' ?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Hoş Geldiniz, <?= htmlspecialchars($user['name'] ?? 'Yönetici') ?></h5>
                <p class="card-text">Burası yönetim panelidir. Uygulamanızın detaylarını buradan yönetebilirsiniz.</p>
            </div>
        </div>
    </div>
</div>
