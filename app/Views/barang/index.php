<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title mb-0">Data Barang Inventaris</h5>
                            <a href="/barang/create" class="btn btn-success">
                                <i class="bi bi-plus-circle"></i> Tambah Data Barang
                            </a>
                        </div>

                        <?php if (session()->getFlashdata('pesan')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-2"></i>
                                <?= session()->getFlashdata('pesan'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="dataTable">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col" width="15%">Foto Barang</th>
                                        <th scope="col" width="30%">Nama Barang</th>
                                        <th scope="col" width="25%">Type Barang</th>
                                        <th scope="col" width="25%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($barang as $b): ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <img src="/img/<?= $b['gambar']; ?>" alt="<?= $b['nama_barang']; ?>"
                                                        class="img-thumbnail"
                                                        style="width: 80px; height: 80px; object-fit: cover;"
                                                        onerror="this.src='/img/default-product.png'">
                                                </div>
                                            </td>
                                            <td class="align-middle"><?= $b['nama_barang']; ?></td>
                                            <td class="align-middle">
                                                <span class="badge bg-info text-dark"><?= $b['tipe']; ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="/barang/<?= $b['id']; ?>" class="btn btn-sm btn-primary" title="Detail">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                                <a href="/barang/edit/<?= $b['id']; ?>" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="/barang/<?= $b['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        title="Hapus"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <p class="text-muted">
                                    Showing <?= count($barang) ?> of <?= count($barang) ?> entries
                                </p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <!-- Pagination would go here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<?= $this->endSection(); ?>