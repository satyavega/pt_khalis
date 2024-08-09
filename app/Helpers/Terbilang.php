<?php

namespace App\Helpers;

class Terbilang
{
    public static function toTerbilang($number)
    {
        $angka = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
        $temp = "";

        if ($number < 12) {
            $temp = " " . $angka[$number];
        } else if ($number < 20) {
            $temp = self::toTerbilang($number - 10) . " Belas";
        } else if ($number < 100) {
            $temp = self::toTerbilang($number / 10) . " Puluh" . self::toTerbilang($number % 10);
        } else if ($number < 200) {
            $temp = " Seratus" . self::toTerbilang($number - 100);
        } else if ($number < 1000) {
            $temp = self::toTerbilang($number / 100) . " Ratus" . self::toTerbilang($number % 100);
        } else if ($number < 2000) {
            $temp = " Seribu" . self::toTerbilang($number - 1000);
        } else if ($number < 1000000) {
            $temp = self::toTerbilang($number / 1000) . " Ribu" . self::toTerbilang($number % 1000);
        } else if ($number < 1000000000) {
            $temp = self::toTerbilang($number / 1000000) . " Juta" . self::toTerbilang($number % 1000000);
        } else if ($number < 1000000000000) {
            $temp = self::toTerbilang($number / 1000000000) . " Miliar" . self::toTerbilang($number % 1000000000);
        } else if ($number < 1000000000000000) {
            $temp = self::toTerbilang($number / 1000000000000) . " Triliun" . self::toTerbilang($number % 1000000000000);
        }

        return $temp;
    }
}
