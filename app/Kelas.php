<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['id','kode_kelas', 'nama_kelas', 'tahun_ajaran', 'sekolah'];


    public function sekolah()
    {
        return $this->belongsTo(sekolah::class);
    }

    public function siswa()
    {
        return $this->hasOne(siswa::class);
    }
    public function guru()
    {
        return $this->hasOne(guru::class);
    }

    public function mapel(){
        return $this->belongsTo(Kelas::class);
    }


    public static function join(){
        $data = DB::table('kelas')
        ->join('sekolah', 'kelas.id_sekolah','sekolah.id')
        ->select('kelas.*','sekolah.npsn as sekolah')
        ->get();
        return $data;
    }
}
