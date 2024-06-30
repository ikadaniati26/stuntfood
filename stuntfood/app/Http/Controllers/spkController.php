<?php

namespace App\Http\Controllers;


use App\Models\DataMakanan;
use App\Models\sub_menu;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use App\Http\Requests\KalkulatorKaloriRequest;

class spkController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function index()
    {
        $query = [];
        $kriteria = [];
        $bobotKriteria = [];
        $totalBobot = [];
        $hasilPengurutan = [];

        return view('website.user.spk', compact('query', 'kriteria', 'bobotKriteria', 'totalBobot', 'hasilPengurutan'));
    }


    public function proses(Request $request)
    {

        //===================MEMBUAT VALIDASI FORM====================//

        $messages = [
            'umur.required' => 'Umur wajib diisi.',
            'umur.numeric' => 'Umur harus berupa bilangan bulat.',
            'umur.string'  => 'inputan harus berupa angka',
            'umur.max' => 'Umur harus maksimal 5 tahun.',
            'umur.min' => 'Umur harus minimal 2 tahun.',
            'jk.required' => 'Jenis kelamin wajib dipilih.',
            'beratbadan.required' => 'Berat badan wajib diisi.',
            'beratbadan.min' => 'Berat badan minimal 8kg.',
            'beratbadan.max' => 'Berat badan maksimal 24kg.',
            'aktivitas.required' => 'Faktor aktivitas wajib dipilih.',
            'aktivitas.in' => 'Faktor aktivitas harus salah satu dari pilihan yang tersedia.',
            'stress.required' => 'Faktor stress wajib dipilih.',
            'stress.in' => 'Faktor stress harus salah satu dari pilihan yang tersedia.',
        ];

        $request->validate([
            'umur' => 'required|numeric|min:2|max:5',
            'jk' => 'required',
            'beratbadan' => 'required|numeric|min:9|max:24',
            'aktivitas  => required',
            'stress     => required',
        ], $messages);

        // =====================INPUTAN USER=========================== //
        $umur = $request->umur;
        $jeniskelamin = $request->jk;
        $beratbadan = $request->beratbadan;
        $aktivitas = $request->aktivitas;
        $stress = $request->stress;

        $komponen_input = [$umur, $jeniskelamin, $beratbadan, $aktivitas, $stress];
        // =====================INPUTAN USER=========================== //

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

        //===================PERHITUNGAN TOTAL KALORI================//
        $tdee = $nilaibmr * $nilaiaktivitas * $nilaistress;

        $makanPagi = 25 / 100 * $tdee;
        $selinganPagi = 10 / 100 * $tdee;
        $makanSiang = 30 / 100 * $tdee;
        $selinganSore = 10 / 100 * $tdee;
        $makanMalam = 25 / 100 * $tdee;

        $nilaiWaktu = [$makanPagi, $selinganPagi, $makanSiang, $selinganSore, $makanMalam];

        //========LOGIKA RUMUS PERSENTASE ISI PIRINGKU 2-5 TAHUN======//
        //pagi
        $makananPokok = $makanPagi * 35 / 100;
        $lauk         = $makanPagi * 35 / 100;
        $sayur        = $makanPagi * 15 / 100;
        $buah         = $makanPagi * 15 / 100;
        //siang
        $makananPokokS = $makanSiang * 35 / 100;
        $laukS         = $makanSiang * 35 / 100;
        $sayurS        = $makanSiang * 15 / 100;
        $buahS         = $makanSiang * 15 / 100;
        //malam
        $makananPokokM = $makanMalam * 35 / 100;
        $laukM         = $makanMalam * 35 / 100;
        $sayurM        = $makanMalam * 15 / 100;
        $buahM         = $makanMalam * 15 / 100;

        $nilaiisipiring = [$makananPokok, $lauk, $sayur, $buah, $makananPokokS, $laukS, $sayurS, $buahS, $makananPokokM, $laukM, $sayurM, $buahM];


        // NILAI PRESENTASE DIKIRIM KE FUNGSI SHOW UNTUK MENAMPILKAN DETAIL //
        $request->session()->put('makananPokok_pagi', $makananPokok);
        $request->session()->put('lauk_pagi', $lauk);
        $request->session()->put('sayur_pagi', $sayur);
        $request->session()->put('buah_pagi', $buah);

        $request->session()->put('makananPokok_siang', $makananPokokS);
        $request->session()->put('lauk_siang', $laukS);
        $request->session()->put('sayur_siang', $sayurS);
        $request->session()->put('buah_siang', $buahS);

        $request->session()->put('makananPokok_malam', $makananPokokM);
        $request->session()->put('lauk_malam', $laukM);
        $request->session()->put('sayur_malam', $sayurM);
        $request->session()->put('buah_malam', $buahM);

        $request->session()->put('selingan_pagi', $selinganPagi);
        $request->session()->put('selingan_sore', $selinganSore);
        // NILAI PRESENTASE DIKIRIM KE FUNGSI SHOW UNTUK MENAMPILKAN DETAIL //


        //======== MENAMPILKAN PAKET MAKANAN YANG TERSEDIA =====//
        $query = DataMakanan::distinct()->pluck('paket');


        //========PERHITUNGAN TABEL ALTERNATIF(TOTAL PROTEIN, TOTAL KARBO, TOTAL LEMAK DAN TOTAL ENERGI)=====//

        //==================QUERY MENGAMBIL SEMUA PAKET MAKANAN=================//
        $paketList = DataMakanan::distinct()->pluck('paket');

        $allJoinData = [];
        foreach ($paketList as $paket) {
            $joindata = DB::table('data_makanan')
                ->join('sub_menu', 'sub_menu.Data_makanan_idData_makanan', '=', 'data_makanan.idData_makanan')
                ->where('data_makanan.paket', $paket)
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

            $allJoinData[$paket] = $joindata;
        }
        //==================QUERY MENGAMBIL SEMUA PAKET MAKANAN=================//


        //=============MENGAMBIL NILAI ENERGI=========//
        $simpan = [];
        $subArray = [];
        $counter = 0;
        foreach ($allJoinData as $key => $values) {
            foreach ($values as $value) {
                $subArray[] = $value->energi;
                $counter++;

                if ($counter == 12) {
                    $simpan[] = $subArray;
                    $subArray = []; // Reset sub-array
                    $counter = 0; // Reset counter
                }
            }
        }

        //=============MENGAMBIL NILAI BERAT=========//
        // Simpan merupakan variabel dari energi
        $Berat = [];
        foreach ($simpan as $key => $value) {
            $Berat[$key] = [
                ($makananPokok / $value[0]) * 100,
                ($lauk /  $value[1]) * 100,
                ($sayur /  $value[2]) * 100,
                ($buah /  $value[3]) * 100,

                ($makananPokokS /  $value[4]) * 100,
                ($laukS /  $value[5]) * 100,
                ($sayurS /  $value[6]) * 100,
                ($buahS / $value[7]) * 100,

                ($makananPokokM /  $value[8]) * 100,
                ($laukM /  $value[9]) * 100,
                ($sayurM /  $value[10]) * 100,
                ($buahM /  $value[11]) * 100,
            ];
        }


        //==========MENGAMBIL NILAI PROTEIN==============//
        $nilai = [];
        $isi_array = [];
        $counterr = 0;

        foreach ($allJoinData as $key => $dt) {
            foreach ($dt as $dta) {
                $isi_array[] = $dta->protein;
                $counterr++;

                if ($counterr == 12) {
                    $nilai[] = $isi_array;
                    $isi_array = [];
                    $counterr = 0;
                }
            }
        }

        //============RUMUS MENCARI NILAI PROTEIN=========//
        $Protein = [];
        foreach ($Berat as $key => $values) {
            foreach ($values as $index => $value) {
                $Protein[$key][] = ($value / 100) * $nilai[$key][$index];
            }
        }

        //===================TOTAL PROTIN====================//
        $totalProtein = [];
        foreach ($Protein as $key => $value) {
            $totalProtein[$key] = array_sum($value);
        }


        // ==============================================================================================//
        //**************** MENCARI TOTAL KARBO ***********************//
        // ==============================================================================================//


        //==========MENGAMBIL NILAI kARBOHIDRAT==============//
        $karbo = [];
        $isi_array = [];
        $counterr = 0;

        foreach ($allJoinData as $key => $dt) {
            foreach ($dt as $dta) {
                $isi_array[] = $dta->karbohidrat;
                $counterr++;

                if ($counterr == 12) {
                    $karbo[] = $isi_array;
                    $isi_array = [];
                    $counterr = 0;
                }
            }
        }

        //============RUMUS MENCARI NILAI PROTEIN=========//
        $Karbohidrat = [];
        foreach ($Berat as $key => $values) {
            foreach ($values as $index => $value) {
                $Karbohidrat[$key][] = ($value / 100) * $karbo[$key][$index];
            }
        }

        //===================TOTAL PROTIN====================//
        $totalKarbohidrat = [];
        foreach ($Karbohidrat as $key => $value) {
            $totalKarbohidrat[$key] = array_sum($value);
        }


        // ==============================================================================================//
        //**************** MENCARI TOTAL LEMAK ***********************//
        // ==============================================================================================//

        //==========MENGAMBIL NILAI LEMAK==============//
        $lemak = [];
        $isi_array = [];
        $counterr = 0;

        foreach ($allJoinData as $key => $dt) {
            foreach ($dt as $dta) {
                $isi_array[] = $dta->lemak;
                $counterr++;

                if ($counterr == 12) {
                    $lemak[] = $isi_array;
                    $isi_array = [];
                    $counterr = 0;
                }
            }
        }

        //============RUMUS MENCARI NILAI PROTEIN=========//
        $Lemak = [];
        foreach ($Berat as $key => $values) {
            foreach ($values as $index => $value) {
                $Lemak[$key][] = ($value / 100) * $lemak[$key][$index];
            }
        }

        //===================TOTAL PROTIN====================//
        $totalLemak = [];
        foreach ($Lemak as $key => $value) {
            $totalLemak[$key] = array_sum($value);
        }

        // ==============================================================================================//
        //**************** MENCARI TOTAL ENERGI ***********************//
        // ==============================================================================================//

        //==========MENGAMBIL NILAI ENERGI==============//
        $energi = [];
        $isi_array = [];
        $counterr = 0;

        foreach ($allJoinData as $key => $dt) {
            foreach ($dt as $dta) {
                $isi_array[] = $dta->energi;
                $counterr++;

                if ($counterr == 12) {
                    $energi[] = $isi_array;
                    $isi_array = [];
                    $counterr = 0;
                }
            }
        }

        //============RUMUS MENCARI NILAI PROTEIN=========//
        $Energi = [];
        foreach ($Berat as $key => $values) {
            foreach ($values as $index => $value) {
                $Energi[$key][] = ($value / 100) * $energi[$key][$index];
            }
        }

        //===================TOTAL PROTEIN====================//
        $totalEnergi = [];
        foreach ($Energi as $key => $value) {
            $totalEnergi[$key] = array_sum($value);
        }

        // ==============================================================================================//
        //**************** MENCARI TOTAL SELINGAN ***********************//
        // ==============================================================================================//

        //===================QUERY JOIN DATAMAKANAN => SELINGAN====================//
        $allSelingan = [];
        foreach ($paketList as $paket) {
            $joindata = DB::table('data_makanan')
                ->join('selingan', 'selingan.Data_makanan_idData_makanan', '=', 'data_makanan.idData_makanan')
                ->select(
                    'data_makanan.paket',
                    'data_makanan.waktu_makan',
                    'data_makanan.menu',
                    'selingan.nama_selingan',
                    'selingan.protein',
                    'selingan.karbohidrat',
                    'selingan.lemak',
                    'selingan.energi'
                )->where('data_makanan.paket', $paket)->get();

            $allSelingan[$paket] = $joindata;
        }

        //===================RUMUS MENGHITUNG BERAT SELINGAN====================//
        $beratSelingan = [];
        foreach ($allSelingan as $key => $values) {
            foreach ($values as $value) {
                $waktuMakan = $value->waktu_makan;
                if ($waktuMakan == 'selingan pagi') {
                    $beratSelingan[$key][] = ($selinganPagi / $value->energi) * 100;
                } else {
                    $beratSelingan[$key][] = ($selinganSore / $value->energi) * 100;
                }
            }
        }


        // ==============================================================================================//
        //**************** MENGHITUNG TOTAL JUMLAH PROTEIN ***********************//
        // ==============================================================================================//

        //===================MENGAMBIL NILAI PROTEIN====================//
        $protein_selingan = [];
        foreach ($allSelingan as $paket => $items) {
            foreach ($items as $item) {
                if (!isset($protein_selingan[$paket])) {
                    $protein_selingan[$paket] = [];
                }
                $protein_selingan[$paket][] = $item->protein;
            }
        }

        //===================RUMUS MENGHITUNG PROTEIN SELINGAN====================//
        $ProteinSelingan = [];
        foreach ($beratSelingan as $key => $values) {
            foreach ($values as $index => $berat) {
                if (isset($protein_selingan[$key][$index])) {
                    $ProteinSelingan[$key][] = ($berat / 100) * $protein_selingan[$key][$index];
                }
            }
        }

        //===================MENJUMLAHKAN PROTEIN PERPAKET====================//
        $totalSelingan_Protein = [];
        foreach ($ProteinSelingan as $key => $values) {
            $totalSelingan_Protein[$key] = array_sum($values);
        }

        //===================MENJUMLAHKAN TOTMAKANAN + TOTSELINGAN====================//
        $JumlahTotal_Protein = [];
        $indexSelingan = array_values($totalSelingan_Protein); //Merubah index array ke numeric
        for ($i = 0; $i < count($indexSelingan); $i++) {
            $JumlahTotal_Protein[$i] = $totalProtein[$i] + $indexSelingan[$i];
        }
        // ==============================================================================================//
        //**************** MENGHITUNG TOTAL JUMLAH KARBOHIDRAT  ***********************//
        // ==============================================================================================//

        //===================MENGAMBIL NILAI KARBOHIDRAT====================//
        $karbo_selingan = [];
        foreach ($allSelingan as $paket => $items) {
            foreach ($items as $item) {
                if (!isset($karbo_selingan[$paket])) {
                    $karbo_selingan[$paket] = [];
                }
                $karbo_selingan[$paket][] = $item->karbohidrat;
            }
        }

        //===================RUMUS MENGHITUNG KARBO SELINGAN====================//
        $KarboSelingan = [];
        foreach ($beratSelingan as $key => $values) {
            foreach ($values as $index => $berat) {
                if (isset($karbo_selingan[$key][$index])) {
                    $KarboSelingan[$key][] = ($berat / 100) * $karbo_selingan[$key][$index];
                }
            }
        }

        //===================MENJUMLAHKAN KARBO PERPAKET====================//
        $totalSelingan_Karbo = [];
        foreach ($KarboSelingan as $key => $values) {
            $totalSelingan_Karbo[$key] = array_sum($values);
        }

        //===================MENJUMLAHKAN TOTMAKANAN + TOTSELINGAN====================//
        $JumlahTotal_Karbo = [];
        $indexSelingan = array_values($totalSelingan_Karbo); //Merubah index array ke numeric
        for ($i = 0; $i < count($indexSelingan); $i++) {
            $JumlahTotal_Karbo[$i] = $totalKarbohidrat[$i] + $indexSelingan[$i];
        }

        // ==============================================================================================//
        //              **************** MENGHITUNG TOTAL JUMLAH LEMAK  ***********************//
        // ==============================================================================================//

        //===================MENGAMBIL NILAI LEMAK====================//
        $lemak_selingan = [];
        foreach ($allSelingan as $paket => $items) {
            foreach ($items as $item) {
                if (!isset($lemak_selingan[$paket])) {
                    $lemak_selingan[$paket] = [];
                }
                $lemak_selingan[$paket][] = $item->lemak;
            }
        }

        //===================RUMUS MENGHITUNG LEMAK SELINGAN====================//
        $LemakSelingan = [];
        foreach ($beratSelingan as $key => $values) {
            foreach ($values as $index => $berat) {
                if (isset($lemak_selingan[$key][$index])) {
                    $LemakSelingan[$key][] = ($berat / 100) * $lemak_selingan[$key][$index];
                }
            }
        }

        //===================MENJUMLAHKAN KARBO PERPAKET====================//
        $totalSelingan_Lemak = [];
        foreach ($LemakSelingan as $key => $values) {
            $totalSelingan_Lemak[$key] = array_sum($values);
        }

        //===================MENJUMLAHKAN TOTMAKANAN + TOTSELINGAN====================//
        $JumlahTotal_Lemak = [];
        $indexSelingan = array_values($totalSelingan_Lemak); //Merubah index array ke numeric
        for ($i = 0; $i < count($indexSelingan); $i++) {
            $JumlahTotal_Lemak[$i] = $totalLemak[$i] + $indexSelingan[$i];
        }


        // ==============================================================================================//
        //**************** MENGHITUNG TOTAL JUMLAH ENERGI  ***********************//
        // ==============================================================================================//

        //===================MENGAMBIL NILAI LEMAK====================//
        $energi_selingan = [];
        foreach ($allSelingan as $paket => $items) {
            foreach ($items as $item) {
                if (!isset($energi_selingan[$paket])) {
                    $energi_selingan[$paket] = [];
                }
                $energi_selingan[$paket][] = $item->energi;
            }
        }

        //===================RUMUS MENGHITUNG LEMAK SELINGAN====================//
        $EnergiSelingan = [];
        foreach ($beratSelingan as $key => $values) {
            foreach ($values as $index => $berat) {
                if (isset($energi_selingan[$key][$index])) {
                    $EnergiSelingan[$key][] = ($berat / 100) * $energi_selingan[$key][$index];
                }
            }
        }

        //===================MENJUMLAHKAN KARBO PERPAKET====================//
        $totalSelingan_Energi = [];
        foreach ($EnergiSelingan as $key => $values) {
            $totalSelingan_Energi[$key] = array_sum($values);
        }

        //===================MENJUMLAHKAN TOTMAKANAN + TOTSELINGAN====================//
        $JumlahTotal_Energi = [];
        $indexSelingan = array_values($totalSelingan_Energi); //Merubah index array ke numeric
        for ($i = 0; $i < count($indexSelingan); $i++) {
            $JumlahTotal_Energi[$i] = $totalEnergi[$i] + $indexSelingan[$i];
        }

        //===============LOGIKA BOBOT KRITERIA=======================================//
        // Data kriteria
        $kriteria = [
            ['kriteria' => 'protein', 'kode' => 'C1', 'bobot' => 0.6],
            ['kriteria' => 'karbohidrat', 'kode' => 'C2', 'bobot' => 0.25],
            ['kriteria' => 'lemak', 'kode' => 'C3', 'bobot' => 0.25],
        ];
        // Menghitung total bobot
        $totalBobot = array_sum(array_column($kriteria, 'bobot'));

        // Membuat fungsi untuk menghitung bobot kepentingan berdasarkan kode kriteria
        function hitungBobotKepentingan($kriteria, $kode, $totalBobot)
        {
            foreach ($kriteria as $item) {
                if ($item['kode'] === $kode) {
                    return $item['bobot'] / $totalBobot;
                }
            }
            return 0;
        }

        $bobotKriteria = [
            'C1' => hitungBobotKepentingan($kriteria, 'C1', $totalBobot),
            'C2' => hitungBobotKepentingan($kriteria, 'C2', $totalBobot),
            'C3' => hitungBobotKepentingan($kriteria, 'C3', $totalBobot),
        ];


        //menghitung vektor s
        $hasil = [];
        for ($i = 0; $i < count($query); $i++) {
            $nilaiC1 = $JumlahTotal_Protein[$i];
            $nilaiC2 = $JumlahTotal_Karbo[$i];
            $nilaiC3 = $JumlahTotal_Lemak[$i];

            $bobotC1 = $bobotKriteria['C1'];
            $bobotC2 = $bobotKriteria['C2'];
            $bobotC3 = $bobotKriteria['C3'];

            $hasil[$i] = pow($nilaiC1, $bobotC1) * pow($nilaiC2, $bobotC2) * pow($nilaiC3, $bobotC3);
        }

        // Total semua vektor S
        $totalVektorS = array_sum($hasil);

        // Menghitung vektor V
        $vektorV = [];
        for ($i = 0; $i < count($hasil); $i++) {
            $vektorV[$i] = $hasil[$i] / $totalVektorS;
        }
        
        // Melabeli nilai dengan ABC
        $pengurutan = [];
        $labels = DataMakanan::distinct()->pluck('paket');
        for ($i=0; $i < count($vektorV) ; $i++) { 
            $pengurutan[$i] = ['label' => $labels[$i], 'value' => $vektorV[$i]];
        }

        // Mengurutkan vektor V secara menurun
        usort($pengurutan, function($a, $b) {
            return $b['value'] <=> $a['value'];
        });
        
        // Menyimpan hasil pengurutan ke dalam variabel
        $hasilPengurutan = $pengurutan;

        $Hasil = view('website.user.spk', compact('nilaibmr', 'tdee', 'nilaiWaktu', 'komponen_input', 'nilaiisipiring', 'query', 'JumlahTotal_Protein', 'JumlahTotal_Karbo', 'JumlahTotal_Lemak', 'JumlahTotal_Energi', 'kriteria', 'totalBobot', 'bobotKriteria', 'hasil', 'totalVektorS', 'vektorV', 'hasilPengurutan'));
        return $Hasil;
    }


    public function show(string $paket, Request $request)
    {
        // $data = DataMakanan::where('paket', 'LIKE', $paket)->get();

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

        // dd($joindata);

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

        //mengambil session selingan 
        $selinganPagi = $request->session()->get('selingan_pagi');
        $selinganSore = $request->session()->get('selingan_sore');

        $BeratSelingan = [
            ($selinganPagi / $dataSelingan[0]->energi) * 100,
            ($selinganSore / $dataSelingan[1]->energi) * 100,
        ];

        $ProteinSelingan = [
            ($BeratSelingan[0] / 100) * $dataSelingan[0]->protein,
            ($BeratSelingan[1] / 100) * $dataSelingan[1]->protein,
        ];
        $KarbohidratSelingan = [
            ($BeratSelingan[0] / 100) * $dataSelingan[0]->karbohidrat,
            ($BeratSelingan[1] / 100) * $dataSelingan[1]->karbohidrat,
        ];
        $LemakSelingan = [
            ($BeratSelingan[0] / 100) * $dataSelingan[0]->lemak,
            ($BeratSelingan[1] / 100) * $dataSelingan[1]->lemak,
        ];
        $EnergiSelingan = [
            ($BeratSelingan[0] / 100) * $dataSelingan[0]->energi,
            ($BeratSelingan[1] / 100) * $dataSelingan[1]->energi,
        ];

        return view('website.user.submenu', compact('joindata', 'Berat', 'Protein', 'Karbo', 'Lemak', 'Energi', 'dataSelingan', 'BeratSelingan', 'ProteinSelingan', 'KarbohidratSelingan', 'LemakSelingan', 'EnergiSelingan'));
    }


    public function showresep(string $paket)
    {
        $resep = Blog::where('paket', 'LIKE', $paket)->get();
        return view('website.user.resep', compact('resep'));
    }
}
