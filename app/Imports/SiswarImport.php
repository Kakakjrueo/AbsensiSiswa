<?php
namespace App\Imports;
use App\Models\Kelaser;
use App\Models\Siswar;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswarImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $kelas = Kelaser::where('namlas', $row['kelas'])->first();

            if ($kelas === null) {
                $kelas = Kelaser::create([
                    'namlas' => $row['kelas'],
                ]);
            }

            Siswar::create([
                'nama' => $row['nama'],
                'jenkel' => $row['jenkel'],
                'nis' => $row['nis'],
                'nisn' => $row['nisn'],
                'kelaser_id' => $kelas->id
            ]);
        }
    }

}