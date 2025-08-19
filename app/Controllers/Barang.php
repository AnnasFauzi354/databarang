<?php

namespace App\Controllers;

use App\Models\databarangModel;
use SimpleSoftwareIO\QrCode\Generator;


use Exception;

class barang extends BaseController
{
    protected $databarangModel;

    public function __construct()
    {
        $this->databarangModel = new databarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar barang',
            'barang' => $this->databarangModel->getBarang()
        ];
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        return view('barang/index', $data);

        // Debug session
        log_message('info', 'Session data: ' . print_r(session()->get(), true));

        if (!session()->get('isLoggedIn')) {
            log_message('error', 'Unauthorized access attempt to /barang');
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $data = [
            'title' => 'Daftar barang',
            'barang' => $this->databarangModel->getBarang()
        ];

        return view('barang/index', $data);
    }

    public function detail($id = null)
    {
        // Validasi ID (harus ada dan numerik)
        if (!$id || !is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('ID barang tidak valid');
        }

        // Ambil data barang
        $barang = $this->databarangModel->getBarang($id);

        // Jika barang tidak ditemukan
        if (empty($barang)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Barang dengan ID ' . $id . ' tidak ditemukan');
        }

        $data = [
            'barang' => $barang,
            'title'  => 'Detail Barang',

        ];

        return view('barang/detail', $data);
    }

    public function qrcode($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('error', 'ID barang tidak valid');
        }

        // Ambil data termasuk kode_barang dan nib
        $barang = $this->databarangModel->select('id, nama_barang, kode_barang, nib')
            ->find($id);

        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        $qrcode = new Generator;
        $barang = $this->databarangModel->find($id);

        // Validasi data barang
        if (empty($barang)) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        $data = [
            'id' => $id,
            'barang' => $barang,
            'title' => 'QR Code - ' . esc($barang['nama_barang']),
            'qrCode' => $qrcode->size(200)
                ->margin(2)
                ->color(0, 0, 0)
                ->backgroundColor(255, 255, 255)
                ->generate(base_url('barang/detail' . $id))
        ];

        return view('pages/qrcode', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('barang/create', $data);
    }
    public function save()
    {
        // Validasi input termasuk file
        $rules = [
            'kode_barang' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Kode barang harus diisi.']
            ],
            'nib' => [
                'rules'  => 'required',
                'errors' => ['required' => 'NIB barang harus diisi.']
            ],
            'nama_barang' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Nama Barang barang harus diisi.']
            ],

            'tipe' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Merk / Type barang harus diisi.']
            ],
            'bahan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'bahan barang harus diisi.']
            ],
            'tahun' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Tahun barang harus diisi.']
            ],
            'ukuran' => [
                'rules'  => 'required',
                'errors' => ['required' => 'ukuran barang harus diisi.']
            ],
            'kondisi' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Kondisi harus diisi.']
            ],
            'jumlah' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Jumlah harus diisi.']
            ],
            'harga' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Harga harus diisi.']
            ],
            'keterangan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Keterangan harus diisi.']
            ],
            'gambar' => [
                'rules'  => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,512]',
                'errors' => [
                    'is_image' => 'File yang diunggah harus berupa gambar.',
                    'mime_in'  => 'Format gambar harus JPG atau PNG.',
                    'max_size' => 'Ukuran gambar maksimal 500 Kb.'
                ]
            ]
        ];

        if (! $this->validate($rules)) {
            return redirect()->to('/barang/create')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Ambil file gambar
        $fileGambar = $this->request->getFile('gambar');
        //cek gambar
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'logocilacap.jpeg';
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
        }


        // Simpan data ke database
        $this->databarangModel->save([
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nib' => $this->request->getVar('nib'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'tipe' => $this->request->getVar('tipe'),
            'bahan' => $this->request->getVar('bahan'),
            'tahun' => $this->request->getVar('tahun'),
            'ukuran' => $this->request->getVar('ukuran'),
            'kondisi' => $this->request->getVar('kondisi'),
            'jumlah' => $this->request->getVar('jumlah'),
            'harga' => $this->request->getVar('harga'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/barang');
    }



    public function delete($id)
    {
        $hapusgambar = $this->databarangModel->find($id);

        if ($hapusgambar['gambar'] != 'logocilacap.jpeg') {
            // Gunakan FCPATH untuk mendapatkan path lengkap ke folder public
            $filepath = FCPATH . 'img/' . $hapusgambar['gambar'];

            // Bungkus operasi file dengan try-catch
            try {
                if (file_exists($filepath)) {
                    unlink($filepath);
                }
            } catch (Exception $e) {
                log_message('error', 'Gagal menghapus file: ' . $e->getMessage());
                // Optional: Tambahkan flashdata untuk memberi tahu admin
                session()->setFlashdata('warning', 'File gambar gagal dihapus');
            }
        }

        $this->databarangModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $data = [
            'title'      => 'Form Ubah Data',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'barang'     => $this->databarangModel->getBarang($id)
        ];
        return view('barang/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'kode_barang' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Kode barang harus diisi.']
            ],
            'nib' => [
                'rules'  => 'required',
                'errors' => ['required' => 'NIB barang harus diisi.']
            ],
            'nama_barang' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Nama Barang barang harus diisi.']
            ],

            'tipe' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Merk / Type barang harus diisi.']
            ],
            'bahan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'bahan barang harus diisi.']
            ],
            'tahun' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Tahun barang harus diisi.']
            ],
            'ukuran' => [
                'rules'  => 'required',
                'errors' => ['required' => 'ukuran barang harus diisi.']
            ],
            'kondisi' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Kondisi harus diisi.']
            ],
            'jumlah' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Jumlah harus diisi.']
            ],
            'harga' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Harga harus diisi.']
            ],
            'keterangan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Keterangan harus diisi.']
            ],
            'gambar' => [
                'rules'  => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]',
                'errors' => [
                    'is_image' => 'File yang diunggah harus berupa gambar.',
                    'mime_in'  => 'Format gambar harus JPG atau PNG.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/barang/edit/' . $id)
                ->withInput()
                ->with('validation', \Config\Services::validation());
        }

        $fileGambar = $this->request->getFile('gambar');
        $gambarLama = $this->request->getVar('gambarLama');

        // Jika tidak upload gambar baru, pakai gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $gambarLama;
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);

            // Hapus gambar lama jika bukan default
            if ($gambarLama != 'logocilacap.jpeg') {
                unlink(FCPATH . 'img/' . $gambarLama);
            }
        }

        $this->databarangModel->save([
            'id'          => $id,
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nib' => $this->request->getVar('nib'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'tipe' => $this->request->getVar('tipe'),
            'bahan' => $this->request->getVar('bahan'),
            'tahun' => $this->request->getVar('tahun'),
            'ukuran' => $this->request->getVar('ukuran'),
            'kondisi' => $this->request->getVar('kondisi'),
            'jumlah' => $this->request->getVar('jumlah'),
            'harga' => $this->request->getVar('harga'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar'      => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/barang');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
