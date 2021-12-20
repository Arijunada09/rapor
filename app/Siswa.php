<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar', 'user_id', 'kelas',];

   public static function join(){
        $data = DB::table('siswas')
        ->join('kelas', 'siswas.kelas','kelas.id')
        ->join('users','siswas.user_id','users.id')
        ->select('siswas.*','kelas.nama_kelas as kelas','users.email as email','users.password as passsword')
        ->get();
        return $data;
    }


    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('image/default.jpg');
        }
        return asset('image/' . $this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai', 'keterangan'])->withTimestamps();
    }

    public function rataRataNilai()
    {
        $total = 0;
        $hitung = 0;
        foreach ($this->mapel as $mapel) {
            $total  += $mapel->pivot->nilai;
            $hitung++;
        }
        return round($total + $hitung);
    }
    public function nama_lengkap()
    {
        return $this->nama_depan . ' ' . $this->nama_belakang;
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    // public function kelas()
    // {
    //     return $this->belongsTo(kelas::class);
    // }
}
