<?php

namespace App\Http\Controllers;

use App\Post;
use  Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\NotifPendaftaranSiswa;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function home()
    {
        return view('sites.home');
    }
    public function about()
    {
        return view('sites.about');
    }
    public function register()
    {
        return view('sites.register');
    }
    public function postregister(Request $request)
    {
        $user = new \App\User;
        $user->level = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        // insert data siswa
        $siswa = \App\Siswa::create($request->all());
  return redirect('/')->with('sukses', 'Data Berhasil di Daftarkan');


        // \Mail::raw('Selamat Datang' . $siswa->nama, function ($message) use ($user) {
        //     $message->to($user->email . $user->nama);
        //     $message->subject('Selamat Sudah Terdaftar di Sekolah kami');
        // });
        Mail::to($user->email)->send(new NotifPendaftaranSiswa);


      
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('sites.singlepost', compact('post'));
    }
}
