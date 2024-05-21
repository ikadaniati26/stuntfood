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

        $nilaiisipiring = [$makananPokok, $lauk, $sayur, $buah, $makananPokokS, $laukS, $sayurS, $buahS, $makananPokokM, $laukM, $sayurM, $buahM];


        //========PERHITUGNAN BERAT MAKANAN POKOK, LAUK, SAYUR DAN BUAH=====
        $query = DataMakanan::all();
        $jenisMakanan = ['makananpokok','lauk','sayur', 'buah', ];
        $waktuMakan = ['makan pagi', 'makan siang', 'makan malam'];

        $energiMakanan = [];

        foreach ($waktuMakan as $waktu) {
            $energiMakanan[$waktu] = [];
            foreach ($jenisMakanan as $jenis) {
                $energiMakanan[$waktu][$jenis] = DB::table('data_makanan')
                    ->join('sub_menu', 'sub_menu.Data_makanan_idData_makanan', '=', 'data_makanan.idData_makanan')
                    ->where('data_makanan.waktu_makan', $waktu)
                    ->where('sub_menu.jenis_makanan', $jenis)
                    ->pluck('sub_menu.energi')
                    ->first();
            }
        }
        // dd($energiMakanan);

        // Menghitung berat energi untuk makanan pagi
        $bp_pagi = ($makananPokok / $energiMakanan['makan pagi']['makananpokok']) * 100;
        $bl_pagi = ($lauk / $energiMakanan['makan pagi']['lauk']) * 100;
        $bs_pagi = ($sayur / $energiMakanan['makan pagi']['sayur']) * 100;
        $bh_pagi = ($buah / $energiMakanan['makan pagi']['buah']) * 100;

        // Menghitung berat energi untuk makanan siang
        $bp_siang = ($makananPokokS / $energiMakanan['makan siang']['makananpokok']) * 100;
        $bl_siang = ($laukS / $energiMakanan['makan siang']['lauk']) * 100;
        $bs_siang = ($sayurS / $energiMakanan['makan siang']['sayur']) * 100;
        $bh_siang = ($buahS / $energiMakanan['makan siang']['buah']) * 100;

        // Menghitung berat energi untuk makanan malam
        $bp_malam = ($makananPokokM / $energiMakanan['makan malam']['makananpokok']) * 100;
        $bl_malam = ($laukM / $energiMakanan['makan malam']['lauk']) * 100;
        $bs_malam = ($sayurM / $energiMakanan['makan malam']['sayur']) * 100;
        $bh_malam = ($buahM / $energiMakanan['makan malam']['buah']) * 100;

        // Menyimpan nilai berat energi makanan pagi, siang, dan malam ke dalam session
        session([
            'beratEnergi' => [
                'pagi' => [
                    'makananpokok' => $bp_pagi,
                    'lauk' => $bl_pagi,
                    'sayur' => $bs_pagi,
                    'buah' => $bh_pagi,
                ],
                'siang' => [
                    'makananpokok' => $bp_siang,
                    'lauk' => $bl_siang,
                    'sayur' => $bs_siang,
                    'buah' => $bh_siang,
                ],
                'malam' => [
                    'makananpokok' => $bp_malam,
                    'lauk' => $bl_malam,
                    'sayur' => $bs_malam,
                    'buah' => $bh_malam,
                ],
            ]
        ]);


        return view('website.user.spk', compact('nilaibmr', 'tdee', 'nilaiWaktu', 'komponen_input', 'nilaiisipiring', 'query'));
    }

    public function subMenu(string $namaPaket)
    {
        // $query = DataMakanan::where('idData_makanan', $id)->first();
        $query = DataMakanan::where('paket', $namaPaket)->first();
        $detail = DB::table('data_makanan')
            ->join('sub_menu', 'sub_menu.Data_makanan_idData_makanan', '=', 'data_makanan.idData_makanan')
            ->select(
                'data_makanan.idData_makanan',
                'data_makanan.paket',
                'data_makanan.waktu_makan',
                'data_makanan.menu',
                'sub_menu.nama_makanan',
                'sub_menu.jenis_makanan',
                'sub_menu.protein',
                'sub_menu.karbohidrat',
                'sub_menu.lemak',
                'sub_menu.energi'
            )
            ->where('data_makanan.paket', $namaPaket)
            ->get();

        $selingan = DB::table('data_makanan')
            ->join('selingan', 'selingan.Data_makanan_idData_makanan', '=', 'data_makanan.idData_makanan')
            ->select(
                'data_makanan.idData_makanan',
                'data_makanan.paket',
                'data_makanan.waktu_makan',
                'selingan.nama_selingan',
                'selingan.protein',
                'selingan.karbohidrat',
                'selingan.lemak',
                'selingan.energi'
            )
            ->where('data_makanan.paket', $namaPaket)
            ->get();

        // Mengambil nilai berat dari session
        $beratEnergi = session('beratEnergi', []);

        // Debugging: dump the session data
        // dd($beratEnergi);

        if (!empty($beratEnergi)) {
            $bpagi = $beratEnergi['pagi'];
            $bsiang = $beratEnergi['siang'];
            $bmalam = $beratEnergi['malam'];
        } else {
            $bpagi = $bsiang = $bmalam = [];
        }

        return view('website.user.submenu', compact('query', 'detail', 'selingan', 'bpagi', 'bsiang', 'bmalam'));
    }

    public function show(string $id)
    {
        return view('website.user.showsolusi');
    }
}
