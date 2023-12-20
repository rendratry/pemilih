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
            'desa' => $desa,
            'tps' => $this->tabulasimodel->getTpsByDesa($desa),
        ];
        return view('user/pilih_tps', $data);
    }

    public function tabulasi()
    {
        $desa = $this->request->getVar('desa');
        $tps = $this->request->getVar('tps');
        $data = [
            'title' => 'Tabulasi',
            'tps' => $tps,
            'desa' => $desa
        ];
        return view('user/input_tabulasi', $data);
    }

    public function tabulasiSubmit()
    {
        $desa = $this->request->getVar('desa');
        $tps = $this->request->getVar('tps');
        $jumlah = $this->request->getVar('jumlah_pemilih');
        $foto = $this->request->getFile('photo_file');
        $file_nama = $foto->getRandomName();

        if ($foto !== null) {
            if ($foto->isValid()) {
                if ($foto->getSize() <= 5000000) {
                    $foto->move('tabulasi_assets/', $file_nama);
                }else {
                    return redirect()->to(base_url('tabulasi/tps'))->with('status_icon', 'error')->with('status_text', 'Gagal Upload, Mohon Ulangi Kembali');
                }
            } else {
                return redirect()->to(base_url('tabulasi/tps'))->with('status_icon', 'error')->with('status_text', 'Gagal Upload, Mohon Ulangi Kembali');
            }
        } else {
            return redirect()->to(base_url('tabulasi/tps'))->with('status_icon', 'error')->with('status_text', 'Gagal Upload, Mohon Ulangi Kembali');
        }

        $id = $this->tabulasimodel->getIdByDesaTps($desa, $tps);
        $data = [
            'hasil' => $jumlah,
            'foto' => $file_nama
        ];

        if ($id) {
            $insert = $this->tabulasimodel->update($id, $data);
            if ($insert){
                return redirect()->to(base_url('tabulasi/tps'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil Diinput');
            } 
        } else {
            return redirect()->to(base_url('tabulasi/tps'))->with('status_icon', 'error')->with('status_text', 'Gagal Upload, Mohon Ulangi Kembali');
            // Jika tidak ditemukan record, Anda mungkin ingin melakukan sesuatu, seperti menampilkan pesan kesalahan atau menangani secara sesuai dengan logika aplikasi Anda.
        }
        // if ($insert){
        //     return redirect()->to(base_url('tabulasi/tps'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil Diinput');
        // } else {
        //     return redirect()->to(base_url('tabulasi/tps'))->with('status_icon', 'error')->with('status_text', 'Gagal Upload, Mohon Ulangi Kembali');
        // }
    }
}