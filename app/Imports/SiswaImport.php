<?php

namespace App\Imports;

use App\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class SiswaImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $row) {
            if ($key >= 4) {

                Siswa::create([
                    'nama_depan' => $row[1],
                    'nama_belakang' => $row[2],
                    'jenis_kelamin' => $row[3],
                    'agama' => $row[4],
                    'alamat' => $row[5],
                    'avatar' => $row[6],

                ]);
            }
        }
    }
}
