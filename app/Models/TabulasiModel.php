<?php
namespace App\Models;
use CodeIgniter\Model;

class TabulasiModel extends Model {
    protected $table            = 'tabulasi';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = ['id', 'kecamatan', 'desa', 'tps', 'hasil', 'foto', 'edited_by'];

    public function getNamaDesa($kecamatan)
    {
        $builder = $this->db->table($this->table);
        $builder->select('desa');
        $builder->where('kecamatan', $kecamatan);
        $builder->groupBy('desa');

        return $builder->get()->getResultArray();
    }
    public function getTpsByDesa($desa)
    {
        $builder = $this->db->table($this->table);
        $builder->select('tps');
        $builder->where('desa', $desa);
        $builder->groupBy('tps');

        return $builder->get()->getResultArray();
    }
}