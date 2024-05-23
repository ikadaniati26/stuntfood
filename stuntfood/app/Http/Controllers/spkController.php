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
        $selinganSore = 10 / 100 * $tdee;
        $makanMalam = 25 / 100 * $tdee;

        $nilaiWaktu = [$makanPagi, $selinganPagi, $makanSiang, $selinganSore, $makanMalam];

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

        // simpan nilai untuk selingan pagi di session dengan kunci yang berbeda
        $request->session()->put('selingan_pagi', $selinganPagi);
        $request->session()->put('selingan_sore', $selinganSore);

        $nilaiisipiring = [$makananPokok, $lauk, $sayur, $buah, $makananPokokS, $laukS, $sayurS, $buahS, $makananPokokM, $laukM, $sayurM, $buahM];

        //========PERHITUGNAN BERAT MAKANAN POKOK, LAUK, SAYUR DAN BUAH=====
        $query = DataMakanan::distinct()->pluck('paket');


        //========PERHITUNGAN TABEL ALTERNATIF(TOTAL PROTEIN, TOTAL KARBO, TOTAL LEMAK DAN TOTAL ENERGI)=====
        

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

            // dd($dataSelingan);
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

        $Berat = [
            ($makananPokok_pagi / $joindata[0]->energi) * 100,
            ($lauk_pagi / $joindata[1]->energi) * 100,
            ($sayur_pagi / $joindata[2]->energi) * 100,
            ($buah_pagi / $joindata[3]->energi) * 100,

            ($makananPokok_siang / $joindata[4]->energi) * 100,
            ($lauk_siang / $joindata[5]->energi) * 100,
            ($sayur_siang / $joindata[6]->energi) * 100,
            ($buah_siang / $joindata[7]->energi) * 100,

            ($makananPokok_malam / $joindata[8]->energi) * 100,
            ($lauk_malam / $joindata[9]->energi) * 100,
            ($sayur_malam / $joindata[10]->energi) * 100,
            ($buah_malam / $joindata[11]->energi) * 100,
        ];

        $Protein = [
            ($Berat[0] / 100) * $joindata[0]->protein,
            ($Berat[1] / 100) * $joindata[1]->protein,
            ($Berat[2] / 100) * $joindata[2]->protein,
            ($Berat[3] / 100) * $joindata[3]->protein,
            ($Berat[4] / 100) * $joindata[4]->protein,
            ($Berat[5] / 100) * $joindata[5]->protein,
            ($Berat[6] / 100) * $joindata[6]->protein,
            ($Berat[7] / 100) * $joindata[7]->protein,
            ($Berat[8] / 100) * $joindata[8]->protein,
            ($Berat[9] / 100) * $joindata[9]->protein,
            ($Berat[10] / 100) * $joindata[10]->protein,
            ($Berat[11] / 100) * $joindata[11]->protein,
        ];
      

        $Karbo = [
            ($Berat[0] / 100) * $joindata[0]->karbohidrat,
            ($Berat[1] / 100) * $joindata[1]->karbohidrat,
            ($Berat[2] / 100) * $joindata[2]->karbohidrat,
            ($Berat[3] / 100) * $joindata[3]->karbohidrat,
            ($Berat[4] / 100) * $joindata[4]->karbohidrat,
            ($Berat[5] / 100) * $joindata[5]->karbohidrat,
            ($Berat[6] / 100) * $joindata[6]->karbohidrat,
            ($Berat[7] / 100) * $joindata[7]->karbohidrat,
            ($Berat[8] / 100) * $joindata[8]->karbohidrat,
            ($Berat[9] / 100) * $joindata[9]->karbohidrat,
            ($Berat[10] / 100) * $joindata[10]->karbohidrat,
            ($Berat[11] / 100) * $joindata[11]->karbohidrat,
        ];

        $Lemak = [
            ($Berat[0] / 100) * $joindata[0]->lemak,
            ($Berat[1] / 100) * $joindata[1]->lemak,
            ($Berat[2] / 100) * $joindata[2]->lemak,
            ($Berat[3] / 100) * $joindata[3]->lemak,
            ($Berat[4] / 100) * $joindata[4]->lemak,
            ($Berat[5] / 100) * $joindata[5]->lemak,
            ($Berat[6] / 100) * $joindata[6]->lemak,
            ($Berat[7] / 100) * $joindata[7]->lemak,
            ($Berat[8] / 100) * $joindata[8]->lemak,
            ($Berat[9] / 100) * $joindata[9]->lemak,
            ($Berat[10] / 100) * $joindata[10]->lemak,
            ($Berat[11] / 100) * $joindata[11]->lemak,
        ];

        $Energi = [
            ($Berat[0] / 100) * $joindata[0]->energi,
            ($Berat[1] / 100) * $joindata[1]->energi,   
            ($Berat[2] / 100) * $joindata[2]->energi,
            ($Berat[3] / 100) * $joindata[3]->energi,
            ($Berat[4] / 100) * $joindata[4]->energi,
            ($Berat[5] / 100) * $joindata[5]->energi,
            ($Berat[6] / 100) * $joindata[6]->energi,
            ($Berat[7] / 100) * $joindata[7]->energi,
            ($Berat[8] / 100) * $joindata[8]->energi,
            ($Berat[9] / 100) * $joindata[9]->energi,
            ($Berat[10] / 100) * $joindata[10]->energi,
            ($Berat[11] / 100) * $joindata[11]->energi,
        ];
    

         //query dibawah ini merupakan query join datamakanan dan selingan
        $dataSelingan = DB::table('data_makanan')
         ->join('selingan', 'selingan.Data_makanan_idData_makanan', '=', 'data_makanan.idData_makanan')
         ->where('data_makanan.paket', '=', $paket)
         ->where(function ($query) {
             $query->where('data_makanan.waktu_makan', 'LIKE', 'selingan pagi')
                   ->orWhere('data_makanan.waktu_makan', 'LIKE', 'selingan sore');
         })
         ->select(
             'data_makanan.paket', 
             'data_makanan.waktu_makan', 
             'data_makanan.menu',
             'selingan.protein', 
             'selingan.karbohidrat', 
             'selingan.lemak', 
             'selingan.energi'
         )->get();

        //  dd($dataSelingan);
        //mengambil session selingan 
        $selinganPagi = $request->session()->get('selingan_pagi');
        $selinganSore = $request->session()->get('selingan_sore');

        $BeratSelingan = [
            ($selinganPagi / $dataSelingan[0]->energi) * 100,
            ($selinganSore / $dataSelingan[1]->energi) * 100,
        ];
        $ProteinSelingan= [
            ($BeratSelingan[0] / 100) * $dataSelingan[0]->protein,
            ($BeratSelingan[1] / 100) * $dataSelingan[1]->protein,
        ];
        $KarbohidratSelingan= [
            ($BeratSelingan[0] / 100) * $dataSelingan[0]->karbohidrat,
            ($BeratSelingan[1] / 100) * $dataSelingan[1]->karbohidrat,
        ];
        $LemakSelingan= [
            ($BeratSelingan[0] / 100) * $dataSelingan[0]->lemak,
            ($BeratSelingan[1] / 100) * $dataSelingan[1]->lemak,
        ];
        $EnergiSelingan= [
            ($BeratSelingan[0] / 100) * $dataSelingan[0]->energi,
            ($BeratSelingan[1] / 100) * $dataSelingan[1]->energi,
        ];
       
        return view('website.user.submenu', compact('joindata', 'Berat', 'Protein', 'Karbo', 'Lemak', 'Energi','dataSelingan','BeratSelingan','ProteinSelingan','KarbohidratSelingan','LemakSelingan','EnergiSelingan'));
    }
}
