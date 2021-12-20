<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['id','nama', 'telp', 'alamat','id_kelas','id_user','status','jenis_kelamin','agama'];

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
    public static function join(){
        $data = DB::table('guru')
        ->join('kelas', 'guru.id_kelas','kelas.id')
        ->join('users','guru.id_user','users.id')
        ->select('guru.*','kelas.nama_kelas as kelas')
        ->get();
        return $data;
    }
    
      public function user()
    {
        return $this->belongsTo(user::class);
    }
}
