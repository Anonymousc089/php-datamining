<?php

namespace App\Http\Controllers;

use App\Result;
use App\NaiveBayes;
use App\DataTesting;
use App\DataTraining;
use Illuminate\Http\Request;
use Charts;

class StatistikController extends Controller
{
    public function index()
    {
        return view('statistik.index');
    }
    public function count()
    {
        $hitung1 = DataTesting::whereprediksi_penyakit('Bukan DM')->get()->count();
        $hitung2 = DataTesting::whereprediksi_penyakit('DM tipe 1')->get()->count();
        $hitung3 = DataTesting::whereprediksi_penyakit('DM tipe 2')->get()->count();
        $hitung4 = DataTesting::whereprediksi_penyakit('DM tipe lain')->get()->count();
        $hitung5 = DataTesting::whereprediksi_penyakit('DM gestasional')->get()->count();
        $jmltotal = $hitung1 + $hitung2 + $hitung3 + $hitung4 + $hitung5;

        return view('statistik.index', ['jmlbukan' => $hitung1, 'jmldm1' => $hitung2, 'jmldm2' => $hitung3, 'jmldml' => $hitung4, 'jmldmg' => $hitung5, 'jmltot' => $jmltotal]);
    }
}
