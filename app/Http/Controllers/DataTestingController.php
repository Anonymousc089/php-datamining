<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\NaiveBayes;
use App\DataTesting;
use App\TestingTrial;
use Illuminate\Http\Request;
use App\Imports\DataTestingImport;
use Maatwebsite\Excel\Facades\Excel;

class DataTestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataTestingBatchs = DataTesting::distinct()->get(['batch']);

        return view('datatesting.index', ['dataTestingBatchs' => $dataTestingBatchs]);
    }

    public function toJson($batch)
    {
        $dataTesting = new DataTesting;

        if ($batch != "ALL") {
            $dataTesting = $dataTesting->whereBatch($batch);
        }
        $dataTesting = $dataTesting->get();
        return response()->json(['data' => $dataTesting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $aturan = [
            'batch' => 'min:1'
        ];

        $pesan = [
            'min' => 'Silahkan upload data testing'
        ];

        $this->validate($request, $aturan, $pesan);
        $batch = $request->batch;

        $dataTestings = DataTesting::whereBatch($batch)->get();


        foreach ($dataTestings as $dataTesting) {

            $penyakitPrediction =
                NaiveBayes::calculate(
                    $dataTesting->umur,
                    $dataTesting->jk,
                    $dataTesting->hamil,
                    $dataTesting->riwayat,
                    $dataTesting->keturunan,
                    $dataTesting->trias,
                    $dataTesting->ulkus,
                    $dataTesting->td,
                    $dataTesting->lila,
                    $dataTesting->imt,
                    $dataTesting->gds,
                    $dataTesting->gdp,
                    $dataTesting->gd2pp,
                    $dataTesting->kolesterol,
                    $batch
                );

            $dataTesting->prediksi_penyakit = $penyakitPrediction['value1'];
            $dataTesting->bdm_pred = $penyakitPrediction['value2'];
            $dataTesting->dm1_pred = $penyakitPrediction['value3'];
            $dataTesting->dm2_pred = $penyakitPrediction['value4'];
            $dataTesting->dml_pred = $penyakitPrediction['value5'];
            $dataTesting->dmg_pred = $penyakitPrediction['value6'];
            $dataTesting->save();
        }

        $true_bdm = DataTesting::whereBatch($batch)->whereColumn('penyakit', 'prediksi_penyakit')->wherePenyakit('Bukan DM')->get()->count();
        $false_bdm = DataTesting::whereBatch($batch)->whereColumn('penyakit', '!=', 'prediksi_penyakit')->wherePenyakit('Bukan DM')->get()->count();

        $true_dm1 = DataTesting::whereBatch($batch)->whereColumn('penyakit', 'prediksi_penyakit')->wherePenyakit('DM tipe 1')->get()->count();
        $false_dm1 = DataTesting::whereBatch($batch)->whereColumn('penyakit', '!=', 'prediksi_penyakit')->wherePenyakit('DM tipe 1')->get()->count();

        $true_dm2 = DataTesting::whereBatch($batch)->whereColumn('penyakit', 'prediksi_penyakit')->wherePenyakit('DM tipe 2')->get()->count();
        $false_dm2 = DataTesting::whereBatch($batch)->whereColumn('penyakit', '!=', 'prediksi_penyakit')->wherePenyakit('DM tipe 2')->get()->count();

        $true_dml = DataTesting::whereBatch($batch)->whereColumn('penyakit', 'prediksi_penyakit')->wherePenyakit('DM tipe lain')->get()->count();
        $false_dml = DataTesting::whereBatch($batch)->whereColumn('penyakit', '!=', 'prediksi_penyakit')->wherePenyakit('DM tipe lain')->get()->count();

        $true_dmg = DataTesting::whereBatch($batch)->whereColumn('penyakit', 'prediksi_penyakit')->wherePenyakit('DM gestasional')->get()->count();
        $false_dmg = DataTesting::whereBatch($batch)->whereColumn('penyakit', '!=', 'prediksi_penyakit')->wherePenyakit('DM gestasional')->get()->count();

        $totalData = DataTesting::whereBatch($batch)->get()->count();


        $testingTrial = new TestingTrial([
            'accuracy_data'  =>  NaiveBayes::calculateAccuracy($totalData, $true_bdm, $true_dm1, $true_dm2, $true_dml, $true_dmg),
            'batch'         => $batch
        ]);

        return back()->with('success', 'Perhitugan Naive Bayes berhasil');

        $testingTrial->save();
        if ($dataTesting) {
            return redirect('admin/data-testing')->with('message', 'Data telah di Update');
        } else {
            return redirect('admin/data-testing')->with('error', 'Data telah salah');
        }
    }

    public function import(Request $request)
    {

        $aturan = [
            'file' => 'required|mimes:xlsx,xls',
        ];

        $pesan = [
            'required' => 'File Data Testing tidak ditemukan!',
            'mimes' => 'File Data Testing harus ekstensi excel!'
        ];

        $this->validate($request, $aturan, $pesan);

        $dataTraining = DataTesting::orderby('created_at', 'desc')->first();
        $numberOfBatch = 0;
        if (is_null($dataTraining)) {
            $numberOfBatch = 1;
        } else {
            $numberOfBatch = $dataTraining->batch + 1;
        }
        Excel::import(new DataTestingImport($numberOfBatch), request()->file('file'));
        return back()->with('success', 'File Data Testing berhasil di Import');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataTesting  $dataTesting
     * @return \Illuminate\Http\Response
     */
    public function show(DataTesting $dataTesting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataTesting  $dataTesting
     * @return \Illuminate\Http\Response
     */
    public function edit(DataTesting $dataTesting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataTesting  $dataTesting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataTesting $dataTesting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataTesting  $dataTesting
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataTesting $dataTesting)
    {
        DataTesting::truncate();
        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
