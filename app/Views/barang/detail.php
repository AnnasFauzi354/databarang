<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="mb-0">Detail Barang</h2>
                            <a href="/barang" class="btn btn-outline-primary mt-2">
                                <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                            </a>
                        </div>

                        <div class="card border-0 shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-4 p-3 d-flex align-items-center justify-content-center bg-light">
                                    <img src="/img/<?= $barang['gambar']; ?>" class="img-fluid rounded" style="max-height: 300px; object-fit: contain;" alt="<?= $barang['nama_barang']; ?>">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title text-primary mb-4"><?= $barang['nama_barang']; ?></h3>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <span class="detail-label">Kode Barang</span>
                                                    <span class="detail-value"><?= $barang['kode_barang']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <span class="detail-label">NIB</span>
                                                    <span class="detail-value"><?= $barang['nib']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <span class="detail-label">Type</span>
                                                    <span class="detail-value"><?= $barang['tipe']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <span class="detail-label">Kondisi Barang</span>
                                                    <span class="badge bg-<?= $barang['kondisi'] == 'Baik' ? 'success' : ($barang['kondisi'] == 'Rusak Berat' ? 'danger' : 'warning') ?>">
                                                        <?= $barang['kondisi']; ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <span class="detail-label">Tahun Perolehan</span>
                                                    <span class="detail-value"><?= $barang['tahun']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <span class="detail-label">Ukuran</span>
                                                    <span class="detail-value"><?= $barang['ukuran']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <span class="detail-label">Jumlah</span>
                                                    <span class="detail-value"><?= $barang['jumlah']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <span class="detail-label">Harga</span>
                                                    <span class="detail-value">Rp <?= number_format($barang['harga'], 0, ',', '.'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="detail-item">
                                                    <span class="detail-label">Keterangan</span>
                                                    <span class="detail-value"><?= $barang['keterangan']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                            <div>
                                                <a href="<?= base_url('barang/qrcode/' . $barang['id']) ?>" class="btn btn-warning me-2">
                                                    <i class="bi bi-qr-code"></i> Release QR-Code
                                                </a>
                                            </div>
                                            <small class="text-muted">Terakhir diperbarui: <?= date('d M Y H:i'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection(); ?>