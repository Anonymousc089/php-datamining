<?php

namespace App\Http\Controllers;

use App\DataTraining;
use App\Imports\DataTrainingImport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Request;

class DataTrainingController extends Controller
{
    public function index()
    {
        return view('datatraining.index');
    }

    public function toJson()
    {
        $dataTraining = DataTraining::get();

        return response()->json(['data' => $dataTraining]);
    }
    public function store(Request $request)
    {
        $dataTraining = new DataTraining([
            'norekam' => $request->norekam,
            'umur'    => $umur,
            'jk'    => $request->jk,
            'hamil'    => $request->hamil,
            'riwayat'    => $request->riwayat,
            'keturunan'    => $request->keturunan,
            'trias'    => $request->trias,
            'ulkus'    => $request->ulkus,
            'td'    => $td,
            'lila'    => $lila,
            'imt'    => $imt,
            'gds'    => $gds,
            'gdp'    => $gdp,
            'gd2pp'    => $gd2pp,
            'penyakit'    => $request->penyakit,
        ]);

        if ($dataTraining->save()) {
            return "OK";
        } else {
            return "NO";
        }
    }

    public function import(Request $request)
    {

        $aturan = [
            'file' => 'required|mimes:xlsx,xls',
        ];

        $pesan = [
            'required' => 'File Data Training tidak ditemukan!',
            'mimes' => 'File Data Training harus ekstensi excel!'
        ];

        $this->validate($request, $aturan, $pesan);

        $dataTraining = DataTraining::orderby('created_at', 'desc')->first();

        $numberOfBatch = 0;

        if (is_null($dataTraining)) {
            $numberOfBatch = 1;
        } else {
            $numberOfBatch = $dataTraining->batch + 1;
        }
        Excel::import(new DataTrainingImport($numberOfBatch), request()->file('file'));
        return back()->with('success', 'File Data Training berhasil di Import');
    }
    public function destroy(DataTraining $dataTraining)
    {
        DataTraining::truncate();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
