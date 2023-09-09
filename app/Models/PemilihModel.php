<?php
namespace App\Models;
use CodeIgniter\Model;

class PemilihModel extends Model {
    protected $table            = 'daftar_pemilih';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = ['id', 'nama', 'jenis_kelamin', 'usia', 'provinsi', 'kabupaten_kota', 'kecamatan', 'desa_kelurahan', 'rt', 'rw', 'tps', 'checklist'];
}