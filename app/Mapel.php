<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode', 'nama', 'semester','kkm','kelas'];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai', 'keterangan'])->withTimestamps();
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kelas(){
        return $this->hasOne(mapel::class);
    }

    public static function join(){
        $data = DB::table('mapel')
        ->join('kelas', 'mapel.kelas','kelas.id')
        ->select('mapel.*','kelas.nama_kelas as kelas')
        ->get();
        return $data;
    }
}
