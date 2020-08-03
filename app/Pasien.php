<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    public static function convertUmur($umur)
    {
        if ($umur >= 12 && $umur < 25) {
            return "Remaja";
        } elseif ($umur >= 25 && $umur <= 45) {
            return "Dewasa";
        } elseif ($umur > 45) {
            return "Lansia";
        }
    }
    public static function convertTd($td)
    {
        if ($td < 100) {
            return "Rendah";
        } elseif ($td >= 100 && $td <= 140) {
            return "Normal";
        } elseif ($td > 140) {
            return "Tinggi";
        }
    }
    public static function convertLila($lila)
    {
        if ($lila <= 28.5) {
            return "Rendah";
        } elseif ($lila > 28.5) {
            return "Gemuk";
        }
    }
    public static function convertImt($imt)
    {
        if ($imt >= 17 && $imt <= 27) {
            return "Normal";
        } elseif ($imt > 27) {
            return "Gemuk";
        }
    }
    public static function convertGds($gds)
    {
        if ($gds >= 200) {
            return "Tinggi";
        } else {
            return "Rendah";
        }
    }
    public static function convertGdp($gdp)
    {
        if ($gdp >= 126) {
            return "Tinggi";
        } else {
            return "Rendah";
        }
    }
    public static function convertGd2pp($gd2pp)
    {
        if ($gd2pp > 180) {
            return "Tinggi";
        } elseif ($gd2pp >= 145 && $gd2pp <= 180) {
            return "Normal";
        } elseif ($gd2pp < 145) {
            return "Rendah";
        }
    }
    public static function convertKolesterol($kolesterol)
    {
        if ($kolesterol >= 200) {
            return "Tinggi";
        } elseif ($kolesterol < 200) {
            return "Rendah";
        }
    }
}
