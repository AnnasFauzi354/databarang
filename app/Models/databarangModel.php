<?php

namespace App\Models;

use CodeIgniter\Model;

class databarangModel extends Model
{
    protected $table = 'databarang2';
    protected $primaryKey = 'id';


    // Wajib diisi: kolom yang boleh diisi lewat save() atau insert()
    protected $allowedFields = [
        'kode_barang',
        'nib',
        'nama_barang',
        'tipe',
        'bahan',
        'tahun',
        'ukuran',
        'kondisi',
        'jumlah',
        'harga',
        'keterangan',
        'gambar'
    ];
    public function getBarang($id = false)
    {
        if ($id === false) {
            return $this->findAll(); // kalau id kosong, ambil semua data
        }

        return $this->where(['id' => $id])->first(); // ambil 1 data berdasarkan ID
    }
}
