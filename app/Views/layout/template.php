<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Data Barang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <link href="../../img/dpmptsp.jpeg" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <style>
        .img-preview {
            object-fit: cover;
            width: 100%;
            height: auto;
            border: 1px solid #000;
            border-radius: 4px;
            padding: 5px;
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            /* Hide element yang tidak perlu ketika dicetak */
            .btn,
            nav,
            footer,
            .sidebar,
            header {
                display: none !important;
            }

            body {
                margin: 0;
                padding: 0;
                font-size: 12pt;
            }

            /* Full width container/card */
            .container,
            .card {
                max-width: 100% !important;
            }

            .card {
                box-shadow: none !important;
                border: 1px solid #ddd !important;
            }

            .card-header {
                background: linear-gradient(135deg, #1e5799 0%, #207cca 100%) !important;
                color: #fff !important;
            }

            /* Tambahkan padding agar tidak terlalu mepet tepi kertas */
            main {
                padding: 0 20px !important;
            }

            .row {
                display: flex !important;
                width: 100% !important;
            }

            .col-md-6 {
                flex: 1 !important;
                width: 50% !important;
            }

            /* Hilangkan margin/penyimpangan saat cetak */
            .bg-light {
                background-color: transparent !important;
            }

            .text-muted {
                color: #000 !important;
            }

            .flex-md-row {
                display: flex !important;
                flex-direction: row !important;
                align-items: center !important;
            }
        }

        /* Style untuk kartu */
        #card-to-download {
            font-family: 'Arial', sans-serif;
            color: #333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd !important;
        }

        /* Tombol Download */
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            transition: all 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Garis pemisah */
        .divider {
            border-top: 2px solid #333;
            margin: 15px 0;
        }
    </style>




    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <?= $this->include('layout/header'); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?= $this->include('layout/sidebar'); ?>

    <!-- End Sidebar-->

    <?= $this->renderSection('content'); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Diskominfo</span></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../../assets/vendor/quill/quill.min.js"></script>
    <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#mytabel').DataTable({
                responsive: true,
            });
        });

        function previewImage() {
            const gambar = document.querySelector('#gambar');
            const gambarLabel = document.querySelector('.form-label');
            const imgPreview = document.querySelector('.img-preview');

            // Periksa dulu apakah file dipilih
            if (gambar.files && gambar.files[0]) {
                gambarLabel.textContent = gambar.files[0].name;

                const fileGambar = new FileReader();
                fileGambar.readAsDataURL(gambar.files[0]);

                fileGambar.onload = function(e) {
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block'; // Tampilkan gambar preview
                }
            }
        }
    </script>




    <?= $this->section('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    }
                },
                dom: '<"top"lf>rt<"bottom"ip>',
                responsive: true
            });
        });
    </script>
    <?= $this->endSection(); ?>

</body>

</html>