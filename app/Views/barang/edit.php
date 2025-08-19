<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class=" my-3">Form Ubah Data</h2>
                        <form action="/barang/update/<?= $barang['id'] ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="gambarLama" value="<?= $barang['gambar'] ?>">

                            <div class="row mb-3">
                                <label for="kode_barang <?= $barang['id'] ?>" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control <?= ($validation->hasError('kode_barang')) ? 'is-invalid' : '' ?>"
                                        id="kode_barang"
                                        name="kode_barang"
                                        value="<?= (old('kode_barang')) ? old('kode_barang') : $barang['kode_barang']; ?>" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_barang'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nib <?= $barang['id'] ?>" class="col-sm-2 col-form-label">NIB</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control <?= ($validation->hasError('nib')) ? 'is-invalid' : '' ?>"
                                        id="nib"
                                        name="nib"
                                        value="<?= (old('nib')) ? old('nib') : $barang['nib']; ?>" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nib'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_barang <?= $barang['id'] ?>" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : '' ?>"
                                        id="nama_barang"
                                        name="nama_barang"
                                        value="<?= (old('nama_barang')) ? old('nama_barang') : $barang['nama_barang']; ?>" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_barang'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tipe" class="col-sm-2 col-form-label">Merk / Type</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control <?= ($validation->hasError('tipe')) ? 'is-invalid' : '' ?>"
                                        id="tipe"
                                        name="tipe"
                                        value="<?= (old('tipe')) ? old('tipe') : $barang['tipe']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tipe'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bahan" class="col-sm-2 col-form-label">Bahan</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control <?= ($validation->hasError('bahan')) ? 'is-invalid' : '' ?>"
                                        id="bahan"
                                        name="bahan"
                                        value="<?= (old('bahan')) ? old('bahan') : $barang['bahan']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bahan'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                                <div class="col-sm-10">
                                    <input type="number" min="2000"
                                        class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : '' ?>"
                                        id="tahun"
                                        name="tahun"
                                        value="<?= (old('tahun')) ? old('tahun') : $barang['tahun']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tahun'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control <?= ($validation->hasError('ukuran')) ? 'is-invalid' : '' ?>"
                                        id="ukuran"
                                        name="ukuran"
                                        value="<?= (old('ukuran')) ? old('ukuran') : $barang['ukuran']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ukuran'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control <?= ($validation->hasError('kondisi')) ? 'is-invalid' : '' ?>"
                                        id="kondisi"
                                        name="kondisi"
                                        value="<?= (old('kondisi')) ? old('kondisi') : $barang['kondisi']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kondisi'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="number" min="0"
                                        class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : '' ?>"
                                        id="jumlah"
                                        name="jumlah"
                                        value="<?= (old('jumlah')) ? old('jumlah') : $barang['jumlah']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jumlah'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1"
                                        class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : '' ?>"
                                        id="harga"
                                        name="harga"
                                        value="<?= (old('harga')) ? old('harga') : $barang['harga']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('harga'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>"
                                        id="keterangan"
                                        name="keterangan"
                                        value="<?= (old('keterangan')) ? old('keterangan') : $barang['keterangan']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-2">
                                    <img src="/img/<?= $barang['gambar']; ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-8">
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label"><?= $barang['gambar']; ?></label>
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

                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                            <button type="button" class="btn btn-warning" onclick="history.back()">Batal</button>
                        </form>


                    </div>
                </div>

            </div>

        </div>
    </section>
</main>
<?= $this->endSection(); ?>