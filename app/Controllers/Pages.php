<?php

namespace App\Controllers;

use App\Models\databarangModel;
use SimpleSoftwareIO\QrCode\Generator;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

use Dompdf\Dompdf;

class Pages extends BaseController
{
    protected $databarangModel;
    public function __construct()
    {
        // Inisialisasi model di constructor
        $this->databarangModel = new databarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home | Data barang',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About | Data Barang'
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact | Data Barang',
            'contact' => [
                [
                    'tipe' => 'Kantor DPMPTSP',
                    'alamat' => 'Jl. Dr. Soetomo No.2, Sidakaya Dua, Sidakaya, Kec. Cilacap Sel., Kabupaten Cilacap, Jawa Tengah 53211',
                    'kota' => '(0282) 542909'
                ],
                [
                    'tipe' => 'Kantor MPP',
                    'alamat' => 'Jl. Gatot Subroto No.268 Lantai 2, Karang Lor, Gunungsimping, Kec. Cilacap Tengah, Kabupaten Cilacap, Jawa Tengah 53224',
                    'kota' => '(0282) 544197'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
    public function login()
    {
        $data = [
            'title' => 'Login | Data Barang'
        ];
        return view('pages/login', $data);
    }
    public function registrasi()
    {
        $data = [
            'title' => 'registrasi | Data Barang'
        ];
        return view('pages/registrasi', $data);
    }
}
