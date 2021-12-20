<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolah';
    protected $fillable = [
        'npsn',
        'nama_sekolah',
        'telp', 
        'status',
        'alamat',
        'kode_pos',
        'provinsi',
        'kabupaten_kota', 
        'kelurahan',
        'website',
        'email',
        'nama_kepsek',
        'nip_kepsek', 
        'logo',
    ];

    public function kelas()
    {
        return $this->hasMany(kelas::class);
    }
}
