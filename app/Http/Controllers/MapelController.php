<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Mapel;
use datatables;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $kelas = Kelas::select('id','nama_kelas')->get();

        $data=Mapel::join();

        // // return response()->json($data);
        if(request()->ajax()) {
            return datatables()->of($data) ->addColumn('aksi', function($data) {
                    $button='<button  class=" edit btn btn-sm btn-warning" id="'.$data->id.'" name="edit">Edit</button>';
                    $button.='<button class=" hapus btn btn-sm btn-danger" id="'.$data->id.'" name="hapus">Hapus</button>';
                    return $button;
                }

            ) ->rawColumns(['aksi']) ->make(true);
        }

        return view('mapel.index',compact('kelas'));
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
        // dd($request->all());
        $request->guru_id = 1;
        $simpan=Mapel::create($request->all());

        if ($simpan) {
            return redirect()->route('mapel.index')->with('sukses','Data Berhasil Disimpan');
        }

        else {
            return redirect()->route('mapel.index')->with('sukses','Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data=Mapel::find($request->id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $data=Mapel::find($request->id);
        $simpan=$data->update($request->all());

        if ($simpan) {
              return redirect()->route('mapel.index')->with('sukses','Data Berhasil Diubah');
        }

        else {
            return redirect()->route('mapel.index')->with('sukses','Data Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
          $data=Mapel::find($request->id);
          $simpan=$data->delete($request->all());

        if ($simpan) {
            return redirect()->route('mapel.index')->with('sukses','Data berhasil Dihapus');
        }

        else {
        return redirect()->route('mapel.index')->with('error','Data Gagal Dihapus');
        }
    }
}