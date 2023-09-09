<?php
namespace App\Models;
use CodeIgniter\Model;

class PemilihModel extends Model {
    protected $table            = 'daftar_pemilih';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = ['id', 'nama', 'jenis_kelamin', 'usia', 'provinsi', 'kabupaten_kota', 'kecamatan', 'desa_kelurahan', 'rt', 'rw', 'tps', 'checklist'];

    public function getPemilihByKecamatanDesa($kecamatan, $desa_kelurahan) {
        return $this->where('kecamatan', $kecamatan)
                    ->where('desa_kelurahan', $desa_kelurahan)
                    ->findAll();
    }
    public function getCountPemilihByKecamatan($kecamatan) {
        return $this->where('kecamatan', $kecamatan)
                    ->countAllResults();
    }

    public function getCountChecklistByKecamatan($kecamatan) {
        return $this->where('kecamatan', $kecamatan)
                    ->where('checklist', true)
                    ->countAllResults();
    }
    
}