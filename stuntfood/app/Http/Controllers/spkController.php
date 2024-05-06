<?php

namespace App\Http\Controllers;


use App\Models\ModelMakanPagi;
use Illuminate\Http\Request;

class spkController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function proses(Request $request)
    {
        $umur = $request->umur;
        $jeniskelamin = $request->jk;
        $beratbadan = $request->beratbadan;
        $aktivitas = $request->aktivitas;
        $stress = $request->stress;
        $isipiring = $request->isipiring;

        $komponen_input = [$umur,$jeniskelamin,$beratbadan,$aktivitas,$stress];

        $nilaibmr= 0;
        $nilaiaktivitas = 0;
        $nilaistress = 0;
        $nilaiisipiring = 0;
        // Menghitung bmr
        switch ($umur) {
            case ($umur >= 0 && $umur <= 3):
                // Kategori umur 0-3
                // Lakukan sesuatu
                if ($jeniskelamin == 'laki-laki') {
                    $nilaibmr = 60.9 * $beratbadan - 54;
                }
                if ($jeniskelamin == 'perempuan') {
                    $nilaibmr = 61.0 * $beratbadan - 51;
                }

                break;

            case ($umur > 3 && $umur <= 10):
                // Kategori umur 3-10
                // Lakukan sesuatu
                if ($jeniskelamin == 'laki-laki') {
                    $nilaibmr = 22.7 * $beratbadan + 495;
                }
                if ($jeniskelamin == 'perempuan') {
                    $nilaibmr = 22.5 * $beratbadan + 499;
                }
                break;

            default:
                // Umur tidak masuk dalam kategori yang ditentukan
                // Lakukan sesuatu
                break;
        }


    //logika aktivitas
        switch ($aktivitas) {
            case 'bedrest':
                $nilaiaktivitas = 1.0;
                //dd($nilaiaktivitas);
                break;
            case 'gerakterbatas':
                $nilaiaktivitas = 1.2;
                break;
            case 'bisajalan':
                $nilaiaktivitas = 1.5;
                break;
            case 'normal':
                $nilaiaktivitas = 1.7;
                break;
            default:
                $nilaiaktivitas = 1.0; // Nilai default jika tidak ada aktivitas yang cocok
                break;
        }
        //dd($nilaiaktivitas);
    //logika faktor stress
        switch ($stress) {
            case 'null':
                $nilaistress = null;
                break;
            case 'operasi':
                $nilaistress = (1 + 1.2) / 2;
                break;
            case 'trauma':
                $nilaistress = (1.2 + 1.6) / 2;
                 break;
            case 'infeksi':
                $nilaistress = (1.2 + 1.6) / 2;
                break;
            case 'peradangan':
                $nilaistress = (1.05 + 1.25) / 2;
                break;
            case 'patahtulang':
                $nilaistress = (1.1 + 1.3) / 2;
                break;
            case 'infeksi':
                $nilaistress = (1.3 + 1.5) / 2;
                break;
            case 'sepsis':
                $nilaistress = (1.2 + 1.5) / 2;
                break;
            case 'cederakepala':
                $nilaistress = 1.3; // Nilai tetap
                break;
            case 'kanker':
                $nilaistress = (1.1 + 1.45) / 2;
                break;
            default:
                $nilaistress = 1.0; // Nilai default jika tidak ada kondisi stres yang cocok
                break;
        }
// dd($komponen_input[4]);
    //perhitungan total kalori
            $tdee = $nilaibmr * $nilaiaktivitas * $nilaistress;

            $makanPagi = 25/100 * $tdee;
            $selinganPagi = 10/100 * $tdee;
            $makanSiang = 30/100 * $tdee;
            $selinganSiang = 10/100 * $tdee;
            $makanMalam = 25/100 * $tdee;

            $nilaiWaktu = [$makanPagi,$selinganPagi,$makanSiang,$selinganSiang,$makanMalam];
            // dd($tdee);
            // Menggunakan dd() untuk memeriksa nilai tdee dan nilaiWaktu
           // return view('website.user.spk', compact('nilaibmr', 'tdee', 'nilaiWaktu', 'komponen_input'));


    //logika rumus persentase isi piringku 2-5 tahun
    $makananPokok = $makanPagi * 35/100;
    $lauk         = $makanPagi * 25/100;
    $sayur        = $makanPagi * 15/100;
    $buah         = $makanPagi * 15/100;

    $makananPokokS = $makanSiang * 35/100;
    $laukS         = $makanSiang * 25/100;
    $sayurS        = $makanSiang * 15/100;
    $buahS         = $makanSiang * 15/100;

    $makananPokokM = $makanMalam * 35/100;
    $laukM         = $makanMalam * 25/100;
    $sayurM        = $makanMalam * 15/100;
    $buahM        = $makanMalam * 15/100;

    $nilaiisipiring = [$makananPokok,$lauk,$sayur,$buah,$makananPokokS,$laukS,$sayurS,$buahS,$makananPokokM,$laukM,$sayurM,$buahM];
    //dd($nilaiisipiring);
    return view('website.user.spk', compact('nilaibmr', 'tdee', 'nilaiWaktu', 'komponen_input','nilaiisipiring'));
   
    }
}
