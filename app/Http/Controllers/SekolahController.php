<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function kelas(){
        $kelas = \App\Kelas::all();
        $sekolah = \App\Sekolah::all();

        return view('kelas.index',compact('kelas','sekolah'));
    }
}
