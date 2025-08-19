<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col">
                            <h2>Contact Us</h2>
                            <?php foreach ($contact as $c): ?>
                                <ul>
                                    <li><?= $c['tipe']; ?></li>
                                    <li><?= $c['alamat']; ?></li>
                                    <li><?= $c['kota']; ?></li>
                                </ul>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
</main>
<?= $this->endSection(); ?>