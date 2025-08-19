<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="container">
            <!-- Tombol back -->
            <a href="/barang/<?= $barang['id'] ?>" class="btn btn-outline-primary mt-2">
                <i class="bi bi-arrow-left"></i> Kembali ke Detail
            </a>

            <?php if ($barang): ?>
                <!-- Area yang Akan Di-download -->
                <div id="card-to-download" class="card border-0 p-4" style="border-radius: 15px; max-width: 500px; margin: 0 auto; background-color: #ffffff;">
                    <!-- Header -->
                    <img src="/img/logocilacap.jpeg" alt="Logo Pemkab"
                        style="max-height: 100px; max-width: 80px; display: block; margin-left: auto; margin-right: auto;">
                    <h1 class="text-center mt-2" style="font-size: 24px; font-weight: bold;">Pemerintah Kabupaten Cilacap</h1>

                    <!-- Logo dan QR Code -->
                    <div class="d-flex justify-content-around align-items-center mb-4 mt-4">
                        <!-- Logo Cilacap -->
                        <div class="text-start">
                            <p class="mt-2 mb-2 fw-bold"><?= esc($barang['nama_barang']) ?></p>
                            <p style="font-size: 16px; margin-bottom: 5px;"><?= esc($barang['tipe']) ?></p>
                            <p style="font-size: 16px; margin-bottom: 5px;"><?= esc($barang['kode_barang']) ?></p>
                            <p style="font-size: 16px;"><?= esc($barang['keterangan'] ?? 'keterangan') ?></p>
                        </div>

                        <!-- QR Code -->
                        <div class="text-center">
                            <div style="padding: 10px; background: white; display: inline-block; border: 1px solid #ddd;">
                                <?= $qrCode ?>
                            </div>
                        </div>
                    </div>


                    <!-- Footer -->
                    <div class="text-center mt-3">
                        <p style="font-size: 14px; margin-bottom: 0;">
                            Update tanggal : <?= date('d F Y', strtotime($barang['updated_at'] ?? date('Y-m-d'))) ?>
                        </p>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">Data barang tidak ditemukan</div>
            <?php endif; ?>

            <div class="text-center mt-4">
                <button id="downloadBtn" class="btn btn-success px-4 py-2 rounded-pill">
                    <i class="bi bi-download me-2"></i> Download Kartu
                </button>
            </div>

        </div>
    </section>
</main>

<!-- Library html2canvas -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
    document.getElementById('downloadBtn').addEventListener('click', function() {
        const element = document.getElementById('card-to-download');

        // Konfigurasi untuk hasil terbaik
        html2canvas(element, {
            scale: 3, // Kualitas tinggi
            backgroundColor: '#ffffff',
            logging: false,
            useCORS: true,
            allowTaint: true
        }).then(canvas => {
            // Konversi ke PNG dan download
            const link = document.createElement('a');
            link.download = 'kartu-inventaris-<?= esc($barang['kode_barang']) ?>.png';
            link.href = canvas.toDataURL('image/png', 1.0);
            link.click();
        }).catch(err => {
            console.error('Error generating image:', err);
            alert('Gagal mengunduh kartu. Silakan coba lagi.');
        });
    });
</script>
<?= $this->endSection(); ?>