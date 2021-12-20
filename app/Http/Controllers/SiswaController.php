<?php

namespace App\Http\Controllers;

use App\Siswa;
use Barryvdh\DomPDF\PDF;
use  Illuminate\Support\Str;
use App\Exports\SiswaExport;
use App\Kelas;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;



class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::select('id','nama_kelas')->get();
        $user = User::select('users.*')->get();
        $data=Siswa::join();


        // // return response()->json($data);
        if(request()->ajax()) {
            return datatables()->of($data) ->addColumn('aksi', function($data) {
                    $button='<button  class=" edit btn btn-sm btn-warning" id="'.$data->id.'" name="edit">Edit</button>';
                    $button.='<button class=" hapus btn btn-sm btn-danger" id="'.$data->id.'" name="hapus">Hapus</button>';
                    return $button;
                }

            ) ->rawColumns(['aksi']) ->make(true);
        }

        return view('siswa.index',compact('kelas','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'nama_depan' => 'required|min:5',
        //         'email' => 'required|email|unique:users',
        //         'jenis_kelamin' => 'required',
        //         'agama' => 'required',
        //         'alamat' => 'required',
        //         'avatar' => 'mimes:jpg,png',
        //     ]
        // );

        // //insert ke tabel user
        // $user = new \App\User;
        // $user->level = 'siswa';
        // $user->name = $request->nama_depan;
        // $user->email = $request->email;
        // $user->password = bcrypt('rahasia');
        // $user->remember_token = Str::random(60);
        // $user->save();

        // $request->request->add(['user_id' => $user->id]);
        // // insert data siswa
        // $siswa = \App\Siswa::create($request->all());
        // if ($request->hasFile('avatar')) {
        //     $request->file('avatar')->move('image/', $request->file('avatar')->getClientOriginalName()); //memindahkan requerst avatar kedalam folder dan disimpa original name, memasukkan ke dalam database
        //     $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        //     $siswa->save();
        // }
        // return redirect('/siswa')->with('sukses', 'Data berhasil di tambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('image/', $request->file('avatar')->getClientOriginalName()); //memindahkan requerst avatar kedalam folder dan disimpa original name, memasukkan ke dalam database
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }



         if ($siswa) {
            // return response()->json(['text'=>'Data berhasil di simpan'], 200);
            return redirect()->route('siswa.index')->with('sukses', 'Data Berhasil di Daftarkan');
        }

        else {
            return response()->json(['text'=>'Data gagal di simpan'], 400);
        }
//   return redirect('/')->with('sukses', 'Data Berhasil di Daftarkan');
        //  dd($request->all());
        //  $simpan=Siswa::create($request->all());
        //  $this->validate(
        //     $request,
        //     [
        //         'nama_depan' => 'required|min:5',
        //         'email' => 'required|email|unique:users',
        //         'jenis_kelamin' => 'required',
        //         'agama' => 'required',
        //         'alamat' => 'required',
        //         'avatar' => 'mimes:jpg,png',
        //     ]
        // );

        // insert ke tabel user
        // $user = new \App\User;
        // $user->level = 'siswa';
        // $user->name = $request->nama_depan;
        // $user->email = $request->email;
        // $user->password = bcrypt('rahasia');
        // $user->remember_token = Str::random(60);
        // $user->save();

        // $request->request->add(['user_id' => $user->id]);
        // // insert data siswa
        // $simpan = Siswa::create($request->all());
        // if ($simpan) {
        //     return response()->json(['text'=>'Data berhasil di simpan'], 200);
        // }

        // else {
        //     return response()->json(['text'=>'Data gagal di simpan'], 400);
        // }
        // if ($request->hasFile('avatar')) {
        //     $request->file('avatar')->move('image/', $request->file('avatar')->getClientOriginalName()); //memindahkan requerst avatar kedalam folder dan disimpa original name, memasukkan ke dalam database
        //     $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        //     $siswa->save();
        // }
        // return redirect('siswa.index')->with('sukses', 'Data berhasil di tambahkan');


        
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
    public function edit(Request $request)
    {
        // return view('siswa/edit', compact('siswa'));
         $data=Siswa::find($request->id);
        return response()->json($data);
    }

    public function updates(Request $request)
    {

         $data=Siswa::find($request->id);
        $simpan=$data->update($request->all());

        if ($simpan) {
            return response()->json(['text'=>'Data berhasil di ubah'], 200);
        }

        else {
            return response()->json(['text'=>'Data gagal di ubah'], 400);
        }



        // $siswa = \App\Siswa::find($id);
        // $siswa->update($request->all());

        // if ($request->hasFile('avatar')) {
        //     $request->file('avatar')->move('image/', $request->file('avatar')->getClientOriginalName()); //memindahkan requerst avatar kedalam folder dan disimpa original name, memasukkan ke dalam database
        //     $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        //     $siswa->save();
        // }
        // return redirect('/siswa')->with('sukses', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus(Request $request)
    {
        // $siswa = \App\Siswa::find($id);
        // $siswa->delete($siswa);
        // // $siswa->user()->detach($iduser);
        // return redirect('/siswa')->with('sukses', 'Data Siswa berhasil di hapus');

         $data=Siswa::findOrfail($request->id);
         $data->user()->delete();
        $data->delete($request->all());

        return redirect()->route('siswa.index');

        // if ($simpan) {
        //    return redirect('siswa.index')->with('sukses','data berhasil di hapus');
        // }

        // else {
        //     return response()->json(['text'=>'Data gagal di hapus'], 400);
        // }
    }

    public function profile($id)
    {
        $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();
        return view('siswa.profile', compact('siswa', 'matapelajaran'));
    }

    // tambah nilai siswa
    public function addnilai(Request $request, $id)
    {
        $siswa = \App\Siswa::find($id);
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('siswa/' . $id . '/profile')->with('error', 'Data Mata Pelajaran Sudah Ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);
        return redirect('siswa/' . $id . '/profile')->with('sukses', 'data berhasil di tambahkan');
    }
    public function deletenilai($id, $idmapel)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses', 'Data nilai berhasil dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }
    public function exportPdf()
    {
        $siswa = \App\Siswa::all();
        $pdf = PDF::loadView('export.siswapdf', ['siswa' => $siswa]);
        // $pdf = PDF::loadHtml('<h1>Data Siswa</h1>'); //membuat tampilan
        return $pdf->download('siswas.pdf');
    }

    public function getdatasiswa()
    {
        $kelas = Kelas::select('kelas.*');
        $siswa = Siswa::select('siswas.*');
        $user = \App\User::select('users.*');

        return DataTables::eloquent($siswa, $kelas)
            ->addColumn('nama_kelas', function ($kelas) {
                return $kelas->nama_kelas;
            })
            ->addColumn('profile', function ($aksi) {
                return '<a href="/siswa/' . $aksi->id . '/profile/" class="btn btn-info">Profile</a>';
            })
            ->addColumn('hapus', function ($siswa_id) {
                return '<a href="/siswa/' . $siswa_id->id . '/delete" class="btn btn-danger">Hapus</a>';
            })
            ->addColumn('rata_nilai', function ($nilai) {
                return $nilai->rataRataNilai();
            })
            ->rawColumns(['rata_nilai', 'profile', 'hapus', 'nama_kelas'])
            ->toJson();
    }

    public function profilesaya()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profilesaya', compact('siswa'));
    }

    public function importExcel(Request $request)
    {
        // dd($request->all());
        Excel::import(new \App\Imports\SiswaImport, $request->file('data_siswa'));
    }

    public function nilaisiswa()
    {
        $matapelajaran = \App\Mapel::all();
        return view('siswa.nilaisiswa', compact('matapelajaran'));
    }
}