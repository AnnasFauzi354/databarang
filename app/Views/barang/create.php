<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Barang</h5>

                        <div class="col-12">
                            <form action="/barang/save" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>

                                <div class="row mb-3">
                                    <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control <?= session('errors.kode_barang') ? 'is-invalid' : '' ?>"
                                            id="kode_barang" name="kode_barang" value="<?= old('kode_barang') ?>" autofocus>
                                        <?php if (session('errors.kode_barang')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.kode_barang') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nib" class="col-sm-2 col-form-label">NIB</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control <?= session('errors.nib') ? 'is-invalid' : '' ?>"
                                            id="nib" name="nib" value="<?= old('nib') ?>">
                                        <?php if (session('errors.nib')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.nib') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control <?= session('errors.nama_barang') ? 'is-invalid' : '' ?>"
                                            id="nama_barang" name="nama_barang" value="<?= old('nama_barang') ?>">
                                        <?php if (session('errors.nama_barang')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.nama_barang') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="tipe" class="col-sm-2 col-form-label">Merk / Type</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control <?= session('errors.tipe') ? 'is-invalid' : '' ?>"
                                            id="tipe" name="tipe" value="<?= old('tipe') ?>">
                                        <?php if (session('errors.tipe')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.tipe') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="bahan" class="col-sm-2 col-form-label">Bahan</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control <?= session('errors.bahan') ? 'is-invalid' : '' ?>"
                                            id="bahan" name="bahan" value="<?= old('bahan') ?>">
                                        <?php if (session('errors.bahan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.bahan') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="2000" max="2099"
                                            class="form-control <?= session('errors.tahun') ? 'is-invalid' : '' ?>"
                                            id="tahun" name="tahun" value="<?= old('tahun') ?>">
                                        <?php if (session('errors.tahun')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.tahun') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control <?= session('errors.ukuran') ? 'is-invalid' : '' ?>"
                                            id="ukuran" name="ukuran" value="<?= old('ukuran') ?>">
                                        <?php if (session('errors.ukuran')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.ukuran') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control <?= session('errors.kondisi') ? 'is-invalid' : '' ?>"
                                            id="kondisi" name="kondisi" value="<?= old('kondisi') ?>">
                                        <?php if (session('errors.kondisi')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.kondisi') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="0"
                                            class="form-control <?= session('errors.jumlah') ? 'is-invalid' : '' ?>"
                                            id="jumlah" name="jumlah" value="<?= old('jumlah') ?>">
                                        <?php if (session('errors.jumlah')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.jumlah') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="1"
                                            class="form-control <?= session('errors.harga') ? 'is-invalid' : '' ?>"
                                            id="harga" name="harga" value="<?= old('harga') ?>">
                                        <?php if (session('errors.harga')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.harga') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control <?= session('errors.keterangan') ? 'is-invalid' : '' ?>"
                                            id="keterangan" name="keterangan" value="<?= old('keterangan') ?>">
                                        <?php if (session('errors.keterangan')) : ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.keterangan') ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-2">
                                        <img src="/img/logocilacap.jpeg" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label for="gambar" class="form-label">Pilih Gambar</label>
                                            <input class="form-control <?= session('errors.gambar') ? 'is-invalid' : '' ?>"
                                                type="file" id="gambar" name="gambar" onchange="previewImage()">
                                            <?php if (session('errors.gambar')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= session('errors.gambar') ?>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                                <a href="/barang" class="btn btn-warning">Batal</a>
                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
</main>
<?= $this->endSection(); ?>