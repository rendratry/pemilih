<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Pemilih',
        ];
        return view('dashboard/dashboard', $data);
    }
}
