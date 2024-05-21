<?php

namespace App\Http\Controllers;


use App\Models\DataMakanan;
use App\Models\sub_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class spkController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function index()
    {
        $query = [];

        return view('website.user.spk', compact('query'));
    }

    public function proses(Request $request)
    {

        $umur = $request->umur;
        $jeniskelamin = $request->jk;
        $beratbadan = $request->beratbadan;
        $aktivitas = $request->aktivitas;
        $stress = $request->stress;

        // =====================INPUTAN USER===========================
        $komponen_input = [$umur, $jeniskelamin, $beratbadan, $aktivitas, $stress];


        $nilaibmr = 0;
        $nilaiaktivitas = 0;
        $nilaistress = 0;
        $nilaiisipiring = 0;
        // ================MENGHITUNG BMR BALITA=======================
        switch ($umur) {
            case ($umur >= 0 && $umur <= 3):
                // Kategori umur 0-3
                if ($jeniskelamin == 'laki-laki') {
                    $nilaibmr = 60.9 * $beratbadan - 54;
                }
                if ($jeniskelamin == 'perempuan') {
                    $nilaibmr = 61.0 * $beratbadan - 51;
                }

                break;

            case ($umur > 3 && $umur <= 10):
                // Kategori umur 3-10
                if ($jeniskelamin == 'laki-laki') {
                    $nilaibmr = 22.7 * $beratbadan + 495;
                }
                if ($jeniskelamin == 'perempuan') {
                    $nilaibmr = 22.5 * $beratbadan + 499;
                }
                break;
            default:
                break;
        }

        //===============LOGIKA AKTIVITAS=============================
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
                $nilaiaktivitas = 1.0;
                break;
        }

        //================LOGIKA FAKTOR STRESS======================
        switch ($stress) {
            case 'tidakada':
                $nilaistress = 1;
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
                $nilaistress = 1.3;
                break;
            case 'kanker':
                $nilaistress = (1.1 + 1.45) / 2;
                break;
            default:
                $nilaistress = 1.0;
                break;
        }

        //===================PERHITUNGAN TOTAL KALORI================
        $tdee = $nilaibmr * $nilaiaktivitas * $nilaistress;

        $makanPagi = 25 / 100 * $tdee;
        $selinganPagi = 10 / 100 * $tdee;
        $makanSiang = 30 / 100 * $tdee;
        $selinganSiang = 10 / 100 * $tdee;
        $makanMalam = 25 / 100 * $tdee;

        $nilaiWaktu = [$makanPagi, $selinganPagi, $makanSiang, $selinganSiang, $makanMalam];

        //========LOGIKA RUMUS PERSENTASE ISI PIRINGKU 2-5 TAHUN=========
        //pagi
        $makananPokok = $makanPagi * 35 / 100;
        $lauk         = $makanPagi * 25 / 100;
        $sayur        = $makanPagi * 15 / 100;
        $buah         = $makanPagi * 15 / 100;
        //siang
        $makananPokokS = $makanSiang * 35 / 100;
        $laukS         = $makanSiang * 25 / 100;
        $sayurS        = $makanSiang * 15 / 100;
        $buahS         = $makanSiang * 15 / 100;
        //malam
        $makananPokokM = $makanMalam * 35 / 100;
        $laukM         = $makanMalam * 25 / 100;
        $sayurM        = $makanMalam * 15 / 100;
        $buahM        = $makanMalam * 15 / 100;

        // Simpan nilai untuk makan pagi di session dengan kunci yang berbeda
        $request->session()->put('makananPokok_pagi', $makananPokok);
        $request->session()->put('lauk_pagi', $lauk);
        $request->session()->put('sayur_pagi', $sayur);
        $request->session()->put('buah_pagi', $buah);

        // Simpan nilai untuk makan siang di session dengan kunci yang berbeda
        $request->session()->put('makananPokok_siang', $makananPokokS);
        $request->session()->put('lauk_siang', $laukS);
        $request->session()->put('sayur_siang', $sayurS);
        $request->session()->put('buah_siang', $buahS);

        // Simpan nilai untuk makan malam di session dengan kunci yang berbeda
        $request->session()->put('makananPokok_malam', $makananPokokM);
        $request->session()->put('lauk_malam', $laukM);
        $request->session()->put('sayur_malam', $sayurM);
        $request->session()->put('buah_malam', $buahM);



        $nilaiisipiring = [$makananPokok, $lauk, $sayur, $buah, $makananPokokS, $laukS, $sayurS, $buahS, $makananPokokM, $laukM, $sayurM, $buahM];

        //========PERHITUGNAN BERAT MAKANAN POKOK, LAUK, SAYUR DAN BUAH=====
        $query = DataMakanan::distinct()->pluck('paket');

        $Hasil = view('website.user.spk', compact('nilaibmr', 'tdee', 'nilaiWaktu', 'komponen_input', 'nilaiisipiring', 'query'));
        return $Hasil;
    }

    public function show(string $paket, Request $request)
    {
        $data = DataMakanan::where('paket', 'LIKE', $paket)->get();

        //query dibawah ini merupakan query join datamakanan dan submenu
        $joindata = DB::table('data_makanan')
            ->join('sub_menu', 'sub_menu.Data_makanan_idData_makanan', '=', 'data_makanan.idData_makanan')
            ->where('data_makanan.paket', 'LIKE', $paket)
            ->select(
                'data_makanan.paket',
                'data_makanan.waktu_makan',
                'data_makanan.menu',
                'sub_menu.nama_makanan',
                'sub_menu.jenis_makanan',
                'sub_menu.protein',
                'sub_menu.karbohidrat',
                'sub_menu.lemak',
                'sub_menu.energi'
            )->get();

        // Ambil nilai-nilai dari session untuk makan pagi
        $makananPokok_pagi = $request->session()->get('makananPokok_pagi');
        $lauk_pagi = $request->session()->get('lauk_pagi');
        $sayur_pagi = $request->session()->get('sayur_pagi');
        $buah_pagi = $request->session()->get('buah_pagi');

        // Ambil nilai-nilai dari session untuk makan siang
        $makananPokok_siang = $request->session()->get('makananPokok_siang');
        $lauk_siang = $request->session()->get('lauk_siang');
        $sayur_siang = $request->session()->get('sayur_siang');
        $buah_siang = $request->session()->get('buah_siang');

        // Ambil nilai-nilai dari session untuk makan malam
        $makananPokok_malam = $request->session()->get('makananPokok_malam');
        $lauk_malam = $request->session()->get('lauk_malam');
        $sayur_malam = $request->session()->get('sayur_malam');
        $buah_malam = $request->session()->get('buah_malam');

        // dd($nilai);

       
        return view('website.user.submenu', compact('joindata'));
    }
}
