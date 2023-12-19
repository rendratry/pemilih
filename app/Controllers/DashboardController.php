<?php

namespace App\Controllers;
use App\Models\PemilihModel;

class DashboardController extends BaseController
{
    public function __construct(){
        $this->pemilihmodel = new PemilihModel();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'title' => 'Pemilih',
            'jumlah_pemilih_mejayan' => $this->pemilihmodel->getCountPemilihByKecamatan('MEJAYAN'),
            'jumlah_pemilih_saradan' => $this->pemilihmodel->getCountPemilihByKecamatan('SARADAN'),
            'jumlah_checklist_mejayan' => $this->pemilihmodel->getCountChecklistByKecamatan('MEJAYAN'),
            'jumlah_checklist_saradan' => $this->pemilihmodel->getCountChecklistByKecamatan('SARADAN'),
        ];
        return view('dashboard/dashboard', $data);
    }

    public function pemilihView() {
        $data = [
            'title' => 'Pemilih',
        ];
        return view('dashboard/pemilih_index', $data);
    }

    public function pemilihData() {
        $kecamatan = $this->request->getVar('kecamatan');
        $desa = $this->request->getVar('desa');

        $pemilih = $this->pemilihmodel->getPemilihByKecamatanDesa($kecamatan, strtoupper($desa));

        if (!$pemilih){
            session()->setFlashdata('error', 'Data pemilih tidak ditemukan');
            return redirect()->to(base_url('dashboard/admin/data-pemilih'));
        }

        $data = [
            'title' => 'Pemilih',
            'pemilih' => $pemilih
        ];
        return view('dashboard/pemilih', $data);
    }

    public function updateChecklist() {
        $checkedItems = $this->request->getVar('checklist');
    
        if (!empty($checkedItems)) {
            foreach ($checkedItems as $id) {
                // Ambil status checklist saat ini
                $currentStatus = $this->pemilihmodel
                    ->select('checklist')
                    ->where('id', $id)
                    ->first();
    
                if ($currentStatus) {
                    // Tentukan nilai baru berdasarkan status saat ini
                    $newStatus = !$currentStatus->checklist; // Ini akan mengubah true menjadi false dan sebaliknya
    
                    // Update kolom 'checklist' dengan nilai baru
                    $dataToUpdate = [
                        'checklist' => $newStatus,
                    ];
    
                    // Gantilah 'nama_tabel' dengan nama tabel yang sesuai dalam database Anda
                    $this->pemilihmodel
                        ->where('id', $id)
                        ->set($dataToUpdate)
                        ->update();
                }
            }
    
            session()->setFlashdata('success', 'Update checklist berhasil');
        } else {
            session()->setFlashdata('error', 'Tidak ada update checklist');
        }
    
        return redirect()->to(base_url('dashboard/admin/data-pemilih'));
    }
    

    public function importPage() {
        $data = [
            'title' => 'Pemilih',
        ];
        return view('dashboard/import_data', $data);
    }

    //IMPORT DEFAULT PRODUCTION
    public function importPemilih() {
        $kecamatan = $this->request->getVar('kecamatan');
        $file = $this->request->getFile('excel_file');
        
        $extension = $file->getClientExtension();
        if($extension == 'xlsx' || $extension == 'xls'){
            if($extension == 'xls'){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }else{
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
       
            $spreadsheet = $reader->load($file);

            $sheets = $spreadsheet->getAllSheets(); // Mendapatkan semua sheet dalam file Excel
            $tps = 1; // Inisialisasi nilai TPS
    
            foreach ($sheets as $sheet) {
                $dataPemilih = $sheet->toArray();
                for ($i = 11; $i < count($dataPemilih); $i++) {
                    $nama = $dataPemilih[$i][1]; // Kolom Nama (B)
                    $jenis_kelamin = $dataPemilih[$i][2]; // Kolom Jenis Kelamin (C)
                    $usia = $dataPemilih[$i][3]; // Kolom Usia (D)
                    $desa_kelurahan = $dataPemilih[$i][4]; // Kolom Desa/Kelurahan (E)
                    $rt = $dataPemilih[$i][5]; // Kolom RT (F)
                    $rw = $dataPemilih[$i][6]; // Kolom RW (G)
    
                    // Proses insert ke dalam database sesuai dengan data yang telah diambil
                    // Gantilah query dan model sesuai dengan struktur dan kebutuhan database Anda
                    $pemilihModel = new PemilihModel(); // Gantilah dengan nama model yang sesuai
                    $data = [
                        'nama' => $nama,
                        'jenis_kelamin' => $jenis_kelamin,
                        'usia' => $usia,
                        'provinsi' => 'JAWA TIMUR',
                        'kabupaten_kota' => 'MADIUN',
                        'kecamatan' => $kecamatan,
                        'desa_kelurahan' => $desa_kelurahan,
                        'rt' => $rt,
                        'rw' => $rw,
                        'tps' => $tps,
                        'checklist' => false// Menggunakan nilai TPS yang sesuai
                    ];
    
                    // Insert data ke dalam database
                    $pemilihModel->insert($data);
                }
    
                $tps++; // Tambahkan nilai TPS untuk sheet berikutnya
            }
    
            session()->setFlashdata('success', 'Data pemilih berhasil diimpor');
            return redirect()->to(base_url('dashboard/admin/import'));
        } else {
            return redirect()->back()->with('error', 'Format file Excel tidak valid.');
        }
    }





    // IMPORT CUSTOM DISINI
    public function importPemilihCustom() {
        $kecamatan = $this->request->getVar('kecamatan');
        $file = $this->request->getFile('excel_file');
        
        $extension = $file->getClientExtension();
        if($extension == 'xlsx' || $extension == 'xls'){
            if($extension == 'xls'){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }else{
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
       
            $spreadsheet = $reader->load($file);

            $sheets = $spreadsheet->getAllSheets(); // Mendapatkan semua sheet dalam file Excel
            $tps = 1; // Inisialisasi nilai TPS
    
            foreach ($sheets as $sheet) {
                $dataPemilih = $sheet->toArray();
                //$i adalah mulai data
                for ($i = 5; $i < count($dataPemilih); $i++) {
                    $nama = $dataPemilih[$i][1]; // Kolom Nama (B)
                    $jenis_kelamin = $dataPemilih[$i][2]; // Kolom Jenis Kelamin (C)
                    $usia = $dataPemilih[$i][3]; // Kolom Usia (D)
                    $desa_kelurahan = $dataPemilih[$i][4]; // Kolom Desa/Kelurahan (E)
                    $rt = $dataPemilih[$i][5]; // Kolom RT (F)
                    $rw = $dataPemilih[$i][6]; // Kolom RW (G)
    
                    // Proses insert ke dalam database sesuai dengan data yang telah diambil
                    // Gantilah query dan model sesuai dengan struktur dan kebutuhan database Anda
                    $pemilihModel = new PemilihModel(); // Gantilah dengan nama model yang sesuai
                    $data = [
                        'nama' => $nama,
                        'jenis_kelamin' => $jenis_kelamin,
                        'usia' => $usia,
                        'provinsi' => 'JAWA TIMUR',
                        'kabupaten_kota' => 'MADIUN',
                        'kecamatan' => $kecamatan,
                        'desa_kelurahan' => $desa_kelurahan,
                        'rt' => $rt,
                        'rw' => $rw,
                        'tps' => $tps,
                        'checklist' => false// Menggunakan nilai TPS yang sesuai
                    ];
    
                    // Insert data ke dalam database
                    $pemilihModel->insert($data);
                }
    
                $tps++; // Tambahkan nilai TPS untuk sheet berikutnya
            }
    
            session()->setFlashdata('success', 'Data pemilih berhasil diimpor');
            return redirect()->to(base_url('dashboard/admin/import'));
        } else {
            return redirect()->back()->with('error', 'Format file Excel tidak valid.');
        }
    }
}
