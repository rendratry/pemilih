<?php

namespace App\Controllers;
use App\Models\TabulasiModel;

class TabulasiController extends BaseController {
    public function __construct(){
        $this->tabulasimodel = new TabulasiModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $kecamatan = session()->get('role');
        $data = [
            'title' => 'Tabulasi',
            'desa' => $this->tabulasimodel->getNamaDesa($kecamatan),
        ];
        return view('user/index', $data);
    }

    public function selectTps()
    {
        $desa = $this->request->getVar('desa');
        $data = [
            'title' => 'Tabulasi',
            'tps' => $this->tabulasimodel->getTpsByDesa($desa),
        ];
        return view('user/pilih_tps', $data);
    }

    public function tabulasi()
    {
        $data = [
            'title' => 'Tabulasi',
        ];
        return view('user/input_tabulasi', $data);
    }
}