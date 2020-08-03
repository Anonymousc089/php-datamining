<?php

namespace App;

class NaiveBayes
{
    public static function calculate($umur, $jk, $hamil, $riwayat, $keturunan, $trias, $ulkus, $td, $lila, $imt, $gds, $gdp, $gd2pp, $kolesterol, $batch)
    {

        //penyakit(kelas)

        $totalBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->get()->count();
        $totalDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->get()->count();
        $totalDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->get()->count();
        $totalDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->get()->count();
        $totalDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->get()->count();

        $total =  DataTraining::whereBatch($batch)->get()->count();

        //Umur
        $totalUmurBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereUmur($umur)->get()->count();
        $totalUmurDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereUmur($umur)->get()->count();
        $totalUmurDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereUmur($umur)->get()->count();
        $totalUmurDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereUmur($umur)->get()->count();
        $totalUmurDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereUmur($umur)->get()->count();

        //jk
        $totalJkBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->wherejk($jk)->get()->count();
        $totalJkDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->wherejk($jk)->get()->count();
        $totalJkDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->wherejk($jk)->get()->count();
        $totalJkDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->wherejk($jk)->get()->count();
        $totalJkDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->wherejk($jk)->get()->count();


        //hamil
        $totalHamilBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereHamil($hamil)->get()->count();
        $totalHamilDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereHamil($hamil)->get()->count();
        $totalHamilDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereHamil($hamil)->get()->count();
        $totalHamilDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereHamil($hamil)->get()->count();
        $totalHamilDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereHamil($hamil)->get()->count();

        //riwayat
        $totalRiwayatBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereRiwayat($riwayat)->get()->count();
        $totalRiwayatDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereRiwayat($riwayat)->get()->count();
        $totalRiwayatDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereRiwayat($riwayat)->get()->count();
        $totalRiwayatDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereRiwayat($riwayat)->get()->count();
        $totalRiwayatDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereRiwayat($riwayat)->get()->count();

        //keturunan
        $totalKeturunanBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereKeturunan($keturunan)->get()->count();
        $totalKeturunanDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereKeturunan($keturunan)->get()->count();
        $totalKeturunanDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereKeturunan($keturunan)->get()->count();
        $totalKeturunanDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereKeturunan($keturunan)->get()->count();
        $totalKeturunanDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereKeturunan($keturunan)->get()->count();

        //trias
        $totalTriasBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereTrias($trias)->get()->count();
        $totalTriasDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereTrias($trias)->get()->count();
        $totalTriasDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereTrias($trias)->get()->count();
        $totalTriasDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereTrias($trias)->get()->count();
        $totalTriasDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereTrias($trias)->get()->count();

        //ulkus
        $totalUlkusBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereUlkus($ulkus)->get()->count();
        $totalUlkusDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereUlkus($ulkus)->get()->count();
        $totalUlkusDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereUlkus($ulkus)->get()->count();
        $totalUlkusDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereUlkus($ulkus)->get()->count();
        $totalUlkusDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereUlkus($ulkus)->get()->count();

        //td
        $totalTdBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereTd($td)->get()->count();
        $totalTdDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereTd($td)->get()->count();
        $totalTdDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereTd($td)->get()->count();
        $totalTdDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereTd($td)->get()->count();
        $totalTdDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereTd($td)->get()->count();

        //lila
        $totalLilaBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereLila($lila)->get()->count();
        $totalLilaDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereLila($lila)->get()->count();
        $totalLilaDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereLila($lila)->get()->count();
        $totalLilaDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereLila($lila)->get()->count();
        $totalLilaDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereLila($lila)->get()->count();

        //imt
        $totalImtBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereImt($imt)->get()->count();
        $totalImtDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereImt($imt)->get()->count();
        $totalImtDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereImt($imt)->get()->count();
        $totalImtDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereImt($imt)->get()->count();
        $totalImtDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereImt($imt)->get()->count();

        //gds
        $totalGdsBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereGds($gds)->get()->count();
        $totalGdsDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereGds($gds)->get()->count();
        $totalGdsDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereGds($gds)->get()->count();
        $totalGdsDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereGds($gds)->get()->count();
        $totalGdsDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereGds($gds)->get()->count();

        //gdp
        $totalGdpBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereGdp($gdp)->get()->count();
        $totalGdpDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereGdp($gdp)->get()->count();
        $totalGdpDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereGdp($gdp)->get()->count();
        $totalGdpDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereGdp($gdp)->get()->count();
        $totalGdpDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereGdp($gdp)->get()->count();

        //gd2pp
        $totalGd2ppBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereGd2pp($gd2pp)->get()->count();
        $totalGd2ppDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereGd2pp($gd2pp)->get()->count();
        $totalGd2ppDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereGd2pp($gd2pp)->get()->count();
        $totalGd2ppDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereGd2pp($gd2pp)->get()->count();
        $totalGd2ppDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereGd2pp($gd2pp)->get()->count();

        //kolesterol
        $totalKolesterolBDM = DataTraining::whereBatch($batch)->wherePenyakit('Bukan DM')->whereKolesterol($kolesterol)->get()->count();
        $totalKolesterolDM1 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 1')->whereKolesterol($kolesterol)->get()->count();
        $totalKolesterolDM2 = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe 2')->whereKolesterol($kolesterol)->get()->count();
        $totalKolesterolDML = DataTraining::whereBatch($batch)->wherePenyakit('DM tipe lain')->whereKolesterol($kolesterol)->get()->count();
        $totalKolesterolDMG = DataTraining::whereBatch($batch)->wherePenyakit('DM gestasional')->whereKolesterol($kolesterol)->get()->count();


        $onBDM = 0;
        $onDM1 = 0;
        $onDM2 = 0;
        $onDML = 0;
        $onDMG = 0;


        $umurBDM = (($totalUmurBDM + 1) / ($totalBDM + 3));
        $umurDM1 = (($totalUmurDM1 + 1) / ($totalDM1 + 3));
        $umurDM2 = (($totalUmurDM2 + 1) / ($totalDM2 + 3));
        $umurDML = (($totalUmurDML + 1) / ($totalDML + 3));
        $umurDMG = (($totalUmurDMG + 1) / ($totalDMG + 3));

        $jkBDM = (($totalJkBDM + 1) / ($totalBDM + 2));
        $jkDM1 = (($totalJkDM1 + 1) / ($totalDM1 + 2));
        $jkDM2 = (($totalJkDM2 + 1) / ($totalDM2 + 2));
        $jkDML = (($totalJkDML + 1) / ($totalDML + 2));
        $jkDMG = (($totalJkDMG + 1) / ($totalDMG + 2));

        $hamilBDM = (($totalHamilBDM + 1) / ($totalBDM + 2));
        $hamilDM1 = (($totalHamilDM1 + 1) / ($totalDM1 + 2));
        $hamilDM2 = (($totalHamilDM2 + 1) / ($totalDM2 + 2));
        $hamilDML = (($totalHamilDML + 1) / ($totalDML + 2));
        $hamilDMG = (($totalHamilDMG + 1) / ($totalDMG + 2));

        $riwayatBDM = (($totalRiwayatBDM + 1) / ($totalBDM + 2));
        $riwayatDM1 = (($totalRiwayatDM1 + 1) / ($totalDM1 + 2));
        $riwayatDM2 = (($totalRiwayatDM2 + 1) / ($totalDM2 + 2));
        $riwayatDML = (($totalRiwayatDML + 1) / ($totalDML + 2));
        $riwayatDMG = (($totalRiwayatDMG + 1) / ($totalDMG + 2));

        $keturunanBDM = (($totalKeturunanBDM + 1) / ($totalBDM + 2));
        $keturunanDM1 = (($totalKeturunanDM1 + 1) / ($totalDM1 + 2));
        $keturunanDM2 = (($totalKeturunanDM2 + 1) / ($totalDM2 + 2));
        $keturunanDML = (($totalKeturunanDML + 1) / ($totalDML + 2));
        $keturunanDMG = (($totalKeturunanDMG + 1) / ($totalDMG + 2));

        $triasBDM = (($totalTriasBDM + 1) / ($totalBDM + 2));
        $triasDM1 = (($totalTriasDM1 + 1) / ($totalDM1 + 2));
        $triasDM2 = (($totalTriasDM2 + 1) / ($totalDM2 + 2));
        $triasDML = (($totalTriasDML + 1) / ($totalDML + 2));
        $triasDMG = (($totalTriasDMG + 1) / ($totalDMG + 2));

        $ulkusBDM = (($totalUlkusBDM + 1) / ($totalBDM + 2));
        $ulkusDM1 = (($totalUlkusDM1 + 1) / ($totalDM1 + 2));
        $ulkusDM2 = (($totalUlkusDM2 + 1) / ($totalDM2 + 2));
        $ulkusDML = (($totalUlkusDML + 1) / ($totalDML + 2));
        $ulkusDMG = (($totalUlkusDMG + 1) / ($totalDMG + 2));

        $tdBDM = (($totalTdBDM + 1) / ($totalBDM + 3));
        $tdDM1 = (($totalTdDM1 + 1) / ($totalDM1 + 3));
        $tdDM2 = (($totalTdDM2 + 1) / ($totalDM2 + 3));
        $tdDML = (($totalTdDML + 1) / ($totalDML + 3));
        $tdDMG = (($totalTdDMG + 1) / ($totalDMG + 3));

        $lilaBDM = (($totalLilaBDM + 1) / ($totalBDM + 2));
        $lilaDM1 = (($totalLilaDM1 + 1) / ($totalDM1 + 2));
        $lilaDM2 = (($totalLilaDM2 + 1) / ($totalDM2 + 2));
        $lilaDML = (($totalLilaDML + 1) / ($totalDML + 2));
        $lilaDMG = (($totalLilaDMG + 1) / ($totalDMG + 2));

        $imtBDM = (($totalImtBDM + 1) / ($totalBDM + 2));
        $imtDM1 = (($totalImtDM1 + 1) / ($totalDM1 + 2));
        $imtDM2 = (($totalImtDM2 + 1) / ($totalDM2 + 2));
        $imtDML = (($totalImtDML + 1) / ($totalDML + 2));
        $imtDMG = (($totalImtDMG + 1) / ($totalDMG + 2));

        $gdsBDM = (($totalGdsBDM + 1) / ($totalBDM + 2));
        $gdsDM1 = (($totalGdsDM1 + 1) / ($totalDM1 + 2));
        $gdsDM2 = (($totalGdsDM2 + 1) / ($totalDM2 + 2));
        $gdsDML = (($totalGdsDML + 1) / ($totalDML + 2));
        $gdsDMG = (($totalGdsDMG + 1) / ($totalDMG + 2));

        $gdpBDM = (($totalGdpBDM + 1) / ($totalBDM + 2));
        $gdpDM1 = (($totalGdpDM1 + 1) / ($totalDM1 + 2));
        $gdpDM2 = (($totalGdpDM2 + 1) / ($totalDM2 + 2));
        $gdpDML = (($totalGdpDML + 1) / ($totalDML + 2));
        $gdpDMG = (($totalGdpDMG + 1) / ($totalDMG + 2));

        $gd2ppBDM = (($totalGd2ppBDM + 1) / ($totalBDM + 2));
        $gd2ppDM1 = (($totalGd2ppDM1 + 1) / ($totalDM1 + 2));
        $gd2ppDM2 = (($totalGd2ppDM2 + 1) / ($totalDM2 + 2));
        $gd2ppDML = (($totalGd2ppDML + 1) / ($totalDML + 2));
        $gd2ppDMG = (($totalGd2ppDMG + 1) / ($totalDMG + 2));

        $kolesterolBDM = (($totalKolesterolBDM + 1) / ($totalBDM + 2));
        $kolesterolDM1 = (($totalKolesterolDM1 + 1) / ($totalDM1 + 2));
        $kolesterolDM2 = (($totalKolesterolDM2 + 1) / ($totalDM2 + 2));
        $kolesterolDML = (($totalKolesterolDML + 1) / ($totalDML + 2));
        $kolesterolDMG = (($totalKolesterolDMG + 1) / ($totalDMG + 2));

        $onBDM = $umurBDM * $jkBDM * $hamilBDM * $riwayatBDM * $keturunanBDM * $triasBDM * $ulkusBDM * $tdBDM * $lilaBDM * $imtBDM * $imtBDM * $gdsBDM * $gdpBDM * $gd2ppBDM * $kolesterolBDM;
        $onBDM = number_format((float) $onBDM * ($totalBDM / $total), 6, '.', '');

        $onDM1 = $umurDM1 * $jkDM1 * $hamilDM1 * $riwayatDM1 * $keturunanDM1 * $triasDM1 * $ulkusDM1 * $tdDM1 * $lilaDM1 * $imtDM1 * $imtDM1 * $gdsDM1 * $gdpDM1 * $gd2ppDM1 * $kolesterolDM1;
        $onDM1 = number_format((float) $onDM1 * ($totalDM1 / $total), 6, '.', '');

        $onDM2 = $umurDM2 * $jkDM2 * $hamilDM2 * $riwayatDM2 * $keturunanDM2 * $triasDM2 * $ulkusDM2 * $tdDM2 * $lilaDM2 * $imtDM2 * $imtDM2 * $gdsDM2 * $gdpDM2 * $gd2ppDM2 * $kolesterolDM2;
        $onDM2 = number_format((float) $onDM2 * ($totalDM2 / $total), 6, '.', '');

        $onDML = $umurDML * $jkDML * $hamilDML * $riwayatDML * $keturunanDML * $triasDML * $ulkusDML * $tdDML * $lilaDML * $imtDML * $imtDML * $gdsDML * $gdpDML * $gd2ppDML * $kolesterolDML;
        $onDML = number_format((float) $onDML * ($totalDML / $total), 6, '.', '');

        $onDMG = $umurDMG * $jkDMG * $hamilDMG * $riwayatDMG * $keturunanDMG * $triasDMG * $ulkusDMG * $tdDMG * $lilaDMG * $imtDMG * $imtDMG * $gdsDMG * $gdpDMG * $gd2ppDMG * $kolesterolDMG;
        $onDMG = number_format((float) $onDMG * ($totalDMG / $total), 6, '.', '');

        // return response()->json($totalBDM . $totalDM1 . $totalDM2 . $totalDML . $totalDMG);

        // exit();

        //kondisi hasil in array
        if ($onBDM > $onDM1 && $onBDM > $onDM2 && $onBDM > $onDML && $onBDM > $onDMG) {
            return ['value1' => 'Bukan DM', 'value2' => $onBDM, 'value3' => $onDM1, 'value4' => $onDM2, 'value5' => $onDML, 'value6' => $onDMG, 'value7' => 'Anda tidak menderita penyakit diabetes melitus.', 'value8' => $onBDM];
        } elseif ($onDM1 > $onBDM && $onDM1 > $onDM2 && $onDM1 > $onDML && $onDM1 >= $onDMG) {
            return ['value1' => 'DM tipe 1', 'value2' => $onBDM, 'value3' => $onDM1, 'value4' => $onDM2, 'value5' => $onDML, 'value6' => $onDMG, 'value7' => 'Lakukan rujukan ke Poli Intern Rumah Sakit Soppeng', 'value8' => $onDM1];
        } elseif ($onDM2 > $onBDM && $onDM2 > $onDM1 && $onDM2 > $onDML && $onDM2 > $onDMG) {
            return ['value1' => 'DM tipe 2', 'value2' => $onBDM, 'value3' => $onDM1, 'value4' => $onDM2, 'value5' => $onDML, 'value6' => $onDMG, 'value7' => 'Konsultasi ke dokter umum di Puskesmas Cangadi', 'value8' => $onDM2];
        } elseif ($onDML > $onBDM && $onDML > $onDM1 && $onDML > $onDM2 && $onDML > $onDMG) {
            return ['value1' => 'DM tipe lain', 'value2' => $onBDM, 'value3' => $onDM1, 'value4' => $onDM2, 'value5' => $onDML, 'value6' => $onDMG, 'value7' => 'Mengurangi obat penyebab kenaikan gula darah.', 'value8' => $onDML];
        } elseif ($onDMG > $onBDM && $onDMG > $onDM1 && $onDMG > $onDM2 && $onDMG > $onDML) {
            return ['value1' => 'DM gestasional', 'value2' => $onBDM, 'value3' => $onDM1, 'value4' => $onDM2, 'value5' => $onDML, 'value6' => $onDMG, 'value7' => 'Lakukan rujukan ke Poli Obyn Rumah Sakit Soppeng', 'value8' => $onDML];
        } else {
            return ['value1' => 'Not', 'value2' => $onBDM, 'value3' => $onDM1, 'value4' => $onDM2, 'value5' => $onDML, 'value6' => $onDMG, 'value7' => 'as', 'value8' => 0];
        }
    }
    public static function calculateAccuracy($totalData, $true_bdm, $true_dm1, $true_dm2, $true_dml, $true_dmg)
    {
        return number_format(($true_bdm + $true_dm1 + $true_dm2 + $true_dml + $true_dmg) / $totalData * 100, 2) . '%';
    }
}
