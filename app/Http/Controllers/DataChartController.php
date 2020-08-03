<?php

namespace App\Http\Controllers;

use App\Result;
use App\NaiveBayes;
use App\DataTesting;
use App\DataTraining;
use Illuminate\Http\Request;
use Charts;

class DataChartController extends Controller
{
    public function index()
    {
        $hitung1 = DataTraining::wherePenyakit('Bukan DM')->get()->count();
        $hitung2 = DataTraining::wherePenyakit('DM tipe 1')->get()->count();
        $hitung3 = DataTraining::wherePenyakit('DM tipe 2')->get()->count();
        $hitung4 = DataTraining::wherePenyakit('DM tipe lain')->get()->count();
        $hitung5 = DataTraining::wherePenyakit('DM gestasional')->get()->count();
        $jmltotal = $hitung1 + $hitung2 + $hitung3 + $hitung4 + $hitung5;

        return view('statistik.index', ['jmlbukan' => $hitung1, 'jmldm1' => $hitung2, 'jmldm2' => $hitung3, 'jmldml' => $hitung4, 'jmldmg' => $hitung5, 'jmltot' => $jmltotal]);
    }
}
