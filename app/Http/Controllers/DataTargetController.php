<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\DataTarget;
use App\NaiveBayes;
use App\TestingTrial;
use Illuminate\Http\Request;
use App\Exports\PrediksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;


class DataTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dataTestingBatchs = DataTesting::distinct()->get(['batch']);

        $batchs = TestingTrial::get(['id', 'batch']);



        return view('datatarget.index', ['batchs' => $batchs]);
    }

    public function toJson()
    {
        $dataTargets = DataTarget::with('testingTrial')->get();

        return response()->json(['data' => $dataTargets]);
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
        /**
         * $validatedData = $request->validate([
         * 'umur' => 'integer|min:15|max:90',
         *   'td' => 'integer|min:50|max:200',
         *  'lila' => 'integer|min:10|max:40',
         * 'imt' => 'numeric|min:10|max:50',
         *'gds' => 'integer|min:50|max:300',
         *'gdp' => 'integer|min:30|max:300',
         *'gd2ppp' => 'integer|min:30|max:400',
         *'kolesterol' => 'integer|min:60|max:350',
         *]);
         * 
         */


        $umur = Pasien::convertUmur($request->umur);
        $td = Pasien::convertTd($request->td);
        $lila = Pasien::convertLila($request->lila);
        $imt = Pasien::convertImt($request->imt);
        $gds = Pasien::convertGds($request->gds);
        $gdp = Pasien::convertGdp($request->gdp);
        $gd2pp = Pasien::convertGd2pp($request->gd2pp);
        $kolesterol = Pasien::convertKolesterol($request->kolesterol);
        $batch = TestingTrial::orderBy('accuracy_data', 'desc')->first();

        $penyakitPrediction = NaiveBayes::calculate($umur, $request->jk, $request->hamil, $request->riwayat, $request->keturunan, $request->trias, $request->ulkus, $td, $lila, $imt, $gds, $gdp, $gd2pp, $kolesterol, $batch->batch);
        $dataTarget = new DataTarget;

        $dataTarget->norekam = $request->norekam;
        $dataTarget->umur = $umur;
        $dataTarget->jk = $request->jk;
        $dataTarget->hamil = $request->hamil;
        $dataTarget->riwayat = $request->riwayat;
        $dataTarget->keturunan = $request->keturunan;
        $dataTarget->trias = $request->trias;
        $dataTarget->ulkus = $request->ulkus;
        $dataTarget->td = $td;
        $dataTarget->lila = $lila;
        $dataTarget->imt = $imt;
        $dataTarget->gds = $gds;
        $dataTarget->gdp = $gdp;
        $dataTarget->gd2pp = $gd2pp;
        $dataTarget->kolesterol = $kolesterol;
        $dataTarget->prediksi_penyakit = $penyakitPrediction['value1'];
        $dataTarget->probabilitas = $penyakitPrediction['value8'];
        $dataTarget->tindakan = $penyakitPrediction['value7'];
        $dataTarget->testing_trial_id = $batch->id;
        if ($dataTarget->save()) {
            return redirect('admin/data-target')->with('message', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('admin/data-target')->with('message', 'Terjadi Kesalahan');
        }
    }


    public function export()
    {
        return Excel::download(new PrediksiExport, 'prediksi.xlsx');
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
        });
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\DataTarget  $dataTarget
     * @return \Illuminate\Http\Response
     */
    public function show(DataTarget $dataTarget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataTarget  $dataTarget
     * @return \Illuminate\Http\Response
     */
    public function edit(DataTarget $dataTarget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataTarget  $dataTarget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataTarget $dataTarget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataTarget  $dataTarget
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataTarget::destroy($id);
        return response()->json(['message' => 'Data berhasil dihapus!']);
    }
}
