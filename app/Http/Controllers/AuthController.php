<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class AuthController extends Controller
{
    public function module(){
        $mapel = Mapel::all();

        return view('siswa.module', compact('mapel'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        return redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function index()
    {
        $sekolah = \App\Sekolah::all();

        return view('auth.index', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
    {

        return view('sekolah/edit', compact('sekolah'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sekolah = \App\Sekolah::find($id);
        $sekolah->update($request->all());

        return redirect('/sekolah')->with('sukses', 'Data Sekolah berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function daftar_sekolah()
    {
        return view('auth.daftar_sekolah');
    }
}
