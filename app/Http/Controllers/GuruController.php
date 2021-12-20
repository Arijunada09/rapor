<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use  Illuminate\Support\Str;    

class GuruController extends Controller
{
    public function profile($id)
    {
        $guru = Guru::find($id);
        return view('guru.profile', compact('guru'));
    }

    public function index(){
        $kelas = Kelas::select('id','nama_kelas')->get();
        $user = User::select('id')->get();
        $data=Guru::join();
         // return response()->json($data);
        if(request()->ajax()) {
            return datatables()->of($data) ->addColumn('aksi', function($data) {
                    $button='<button  class=" edit btn btn-sm btn-warning" id="'.$data->id.'" name="edit">Edit</button>';
                    $button.='<button class=" hapus btn btn-sm btn-danger" id="'.$data->id.'" name="hapus">Hapus</button>';
                    return $button;
                }

            ) ->rawColumns(['aksi'])
            ->make(true);
        }

        return view('guru.index', compact('kelas','user'));
    }

     public function store(Request $request)
    {
        $kelas = Kelas::select('id','nama_kelas')->get();

        $user = new \App\User;
        $user->level = $request->status;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['id_user' => $user->id]);
        // insert data siswa
        $guru = Guru::create($request->all());

        // if ($request->hasFile('avatar')) {
        //     $request->file('avatar')->move('image/', $request->file('avatar')->getClientOriginalName()); //memindahkan requerst avatar kedalam folder dan disimpa original name, memasukkan ke dalam database
        //     $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        //     $siswa->save();
        // }
         if ($guru) {
            // return response()->json(['text'=>'Data berhasil di simpan'], 200);
            return redirect()->route('guru.index')->with('sukses', 'Data Berhasil di Daftarkan');
        }

        else {
            return response()->route('guru.index')->with('error', 'Data gagal di Daftarkan');
        }
    }
}
