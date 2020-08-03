<?php

namespace App\Imports;

use App\Pasien;
use App\DataTraining;
use App\TestingTrial;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataTrainingImport implements ToModel, WithHeadingRow
{
    private $batch;

    public function __construct($batch)
    {
        $this->batch = $batch;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // $trial = TestingTrial::orderby('created_at', 'desc')->first();


        return new DataTraining([
            'norekam' => $row['norekam'],
            'umur' => Pasien::convertUmur($row['umur']),
            'jk' => $row['jk'],
            'hamil' => $row['hamil'],
            'riwayat' => $row['riwayat'],
            'keturunan' => $row['keturunan'],
            'trias' => $row['trias'],
            'ulkus' => $row['ulkus'],
            'td' => Pasien::convertTd($row['td']),
            'lila' => Pasien::convertLila($row['lila']),
            'imt' => Pasien::convertImt($row['imt']),
            'gds' => Pasien::convertGds($row['gds']),
            'gdp' => Pasien::convertGdp($row['gdp']),
            'gd2pp' => Pasien::convertGd2pp($row['gd2pp']),
            'kolesterol' => Pasien::convertKolesterol($row['kolesterol']),
            'penyakit' => $row['penyakit'],
            'batch' => $this->batch,
        ]);
    }
}
