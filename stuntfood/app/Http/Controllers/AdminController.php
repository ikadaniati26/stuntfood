<?php

namespace App\Http\Controllers;

use App\Models\DataMakanan;
use App\Models\selingan;
use App\Models\sub_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Changed to use the correct namespace for Session
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //Admin
    public function index()
    {
        $query = DataMakanan::all();
        return view('dataMakananAdmin', compact('query'));
    }

    public function create()
    {
        return view('website.admin.formInput');
    }

    public function store(Request $request)
    {
        //proses menu pagi
        $paket = $request->paket;
        $waktumakan_pagi =  $request->waktumakan_pagi;
        $menu_pagi = $request->menu_pagi;
        //proses submenu pagi
        $mp_pagi = $request->mp_pagi;
        $j_makananPokok = $request->j_mp;
        $proteinmp_pagi = $request->proteinmp_pagi;
        $karbomp_pagi = $request->karbomp_pagi;
        $lemakmp_pagi = $request->lemakmp_pagi;
        $energimp_pagi = $request->energimp_pagi;

        $lauk_pagi = $request->lauk_pagi;
        $j_lauk = $request->j_lauk;
        $proteinlauk_pagi = $request->proteinlauk_pagi;
        $karbolauk_pagi = $request->karbolauk_pagi;
        $lemaklauk_pagi = $request->lemaklauk_pagi;
        $energilauk_pagi = $request->energilauk_pagi;

        $sayur_pagi = $request->syr_pagi;
        $j_sayur = $request->j_sayur;
        $proteinsyr_pagi = $request->proteinsyr_pagi;
        $karbosyr_pagi = $request->karbosyr_pagi;
        $lemaksyr_pagi = $request->lemaksyr_pagi;
        $energisyr_pagi = $request->energisyr_pagi;

        $buah_pagi = $request->buah_pagi;
        $j_buah = $request->j_buah;
        $proteinbuah_pagi = $request->proteinbuah_pagi;
        $karbobuah_pagi = $request->karbobuah_pagi;
        $lemakbuah_pagi = $request->lemakbuah_pagi;
        $energibuah_pagi = $request->energibuah_pagi;

        //proses menu siang
        $waktumakan_siang =  $request->waktumakan_siang;
        $menu_siang = $request->menu_siang;
        //proses submenu siang
        $mp_siang = $request->mp_siang;
        $proteinmp_siang = $request->proteinmp_siang;
        $karbomp_siang = $request->karbomp_siang;
        $lemakmp_siang = $request->lemakmp_siang;
        $energimp_siang = $request->energimp_siang;

        $lauk_siang = $request->lauk_siang;
        $proteinlauk_siang = $request->proteinlauk_siang;
        $karbolauk_siang = $request->karbolauk_siang;
        $lemaklauk_siang = $request->lemaklauk_siang;
        $energilauk_siang = $request->energilauk_siang;

        $sayur_siang = $request->syr_siang;
        $proteinsyr_siang = $request->proteinsyr_siang;
        $karbosyr_siang = $request->karbosyr_siang;
        $lemaksyr_siang = $request->lemaksyr_siang;
        $energisyr_siang = $request->energisyr_siang;

        $buah_siang = $request->buah_siang;
        $proteinbuah_siang = $request->proteinbuah_siang;
        $karbobuah_siang = $request->karbobuah_siang;
        $lemakbuah_siang = $request->lemakbuah_siang;
        $energibuah_siang = $request->energibuah_siang;


        //proses menu malam
        $waktumakan_malam =  $request->waktumakan_malam;
        $menu_malam = $request->menu_malam;
        //proses submenu siang
        $mp_malam = $request->mp_malam;
        $proteinmp_malam = $request->proteinmp_malam;
        $karbomp_malam = $request->karbomp_malam;
        $lemakmp_malam = $request->lemakmp_malam;
        $energimp_malam = $request->energimp_malam;

        $lauk_malam = $request->lauk_malam;
        $proteinlauk_malam = $request->proteinlauk_malam;
        $karbolauk_malam = $request->karbolauk_malam;
        $lemaklauk_malam = $request->lemaklauk_malam;
        $energilauk_malam = $request->energilauk_malam;

        $sayur_malam = $request->syr_malam;
        $proteinsyr_malam = $request->proteinsyr_malam;
        $karbosyr_malam = $request->karbosyr_malam;
        $lemaksyr_malam = $request->lemaksyr_malam;
        $energisyr_malam = $request->energisyr_malam;

        $buah_malam = $request->buah_malam;
        $proteinbuah_malam = $request->proteinbuah_malam;
        $karbobuah_malam = $request->karbobuah_malam;
        $lemakbuah_malam = $request->lemakbuah_malam;
        $energibuah_malam = $request->energibuah_malam;

        //proses selingan pagi
        $waktumakan_SPagi = $request->waktumakan_SPagi;
        $menuselingan_pagi = $request->menuselingan_pagi;
        //proses submenu selingan pagi
        $proteinsp_pagi = $request->proteinselingan_pagi;
        $karbosp_pagi = $request->karboselingan_pagi;
        $lemaksp_pagi = $request->lemakselingan_pagi;
        $energisp_pagi = $request->energiselingan_pagi;

        //proses selingan sore
        $waktumakan_Ssore = $request->waktumkn_Ssore;
        $menuselingan_sore = $request->menuselingan_sore;
        //proses submenu selingan pagi
        $proteinss_sore = $request->proteinselingan_sore;
        $karboss_sore = $request->karboselingan_sore;
        $lemakss_sore = $request->lemakselingan_sore;
        $energiss_sore = $request->energiselingan_sore;

        //============================================================================//
        //****************MAKANAN PAGI*******************//
        //============================================================================//

        //================INPUT DATA MAKANAN================//
        $dataMakanan = DataMakanan::create([
            'paket' => $paket,
            'waktu_makan' => $waktumakan_pagi,
            'menu' => $menu_pagi
        ]);

        // // ================INPUT SUBMENU================//
        sub_menu::create([
            'nama_makanan' => $mp_pagi,
            'jenis_makanan' => $j_makananPokok,
            'protein' => $proteinmp_pagi,
            'karbohidrat' => $karbomp_pagi,
            'lemak' => $lemakmp_pagi,
            'energi' => $energimp_pagi,
            'Data_makanan_idData_makanan' => $dataMakanan->id
        ]);

        sub_menu::create([
            'nama_makanan' => $lauk_pagi,
            'jenis_makanan' => $j_lauk,
            'protein' => $proteinlauk_pagi,
            'karbohidrat' => $karbolauk_pagi,
            'lemak' => $lemaklauk_pagi,
            'energi' => $energilauk_pagi,
            'Data_makanan_idData_makanan' => $dataMakanan->id
        ]);


        sub_menu::create([
            'nama_makanan' => $sayur_pagi,
            'jenis_makanan' => $j_sayur,
            'protein' => $proteinsyr_pagi,
            'karbohidrat' => $karbosyr_pagi,
            'lemak' => $lemaksyr_pagi,
            'energi' => $energisyr_pagi,
            'Data_makanan_idData_makanan' => $dataMakanan->id
        ]);

        sub_menu::create([
            'nama_makanan' => $buah_pagi,
            'jenis_makanan' => $j_buah,
            'protein' => $proteinbuah_pagi,
            'karbohidrat' => $karbobuah_pagi,
            'lemak' => $lemakbuah_pagi,
            'energi' => $energibuah_pagi,
            'Data_makanan_idData_makanan' => $dataMakanan->id
        ]);

        //============================================================================//
        //****************MAKANAN PAGI*******************//
        //============================================================================//

        //============================================================================//
        //****************MAKANAN SIANG*******************//
        //============================================================================//

        //================INPUT DATA MAKANAN================//
        $dataMakanan_siang = DataMakanan::create([
            'paket' => $paket,
            'waktu_makan' => $waktumakan_siang,
            'menu' => $menu_siang
        ]);

        //================INPUT SUBMENU================//
        sub_menu::create([
            'nama_makanan' => $mp_siang,
            'jenis_makanan' => $j_makananPokok,
            'protein' => $proteinmp_siang,
            'karbohidrat' => $karbomp_siang,
            'lemak' => $lemakmp_siang,
            'energi' => $energimp_siang,
            'Data_makanan_idData_makanan' => $dataMakanan_siang->id
        ]);

        sub_menu::create([
            'nama_makanan' => $lauk_siang,
            'jenis_makanan' => $j_lauk,
            'protein' => $proteinlauk_siang,
            'karbohidrat' => $karbolauk_siang,
            'lemak' => $lemaklauk_siang,
            'energi' => $energilauk_siang,
            'Data_makanan_idData_makanan' => $dataMakanan_siang->id
        ]);


        sub_menu::create([
            'nama_makanan' => $sayur_siang,
            'jenis_makanan' => $j_sayur,
            'protein' => $proteinsyr_siang,
            'karbohidrat' => $karbosyr_siang,
            'lemak' => $lemaksyr_siang,
            'energi' => $energisyr_siang,
            'Data_makanan_idData_makanan' => $dataMakanan_siang->id
        ]);

        sub_menu::create([
            'nama_makanan' => $buah_siang,
            'jenis_makanan' => $j_buah,
            'protein' => $proteinbuah_siang,
            'karbohidrat' => $karbobuah_siang,
            'lemak' => $lemakbuah_siang,
            'energi' => $energibuah_siang,
            'Data_makanan_idData_makanan' => $dataMakanan_siang->id
        ]);

        //============================================================================//
        //****************MAKANAN SIANG*******************//
        //============================================================================//

        //============================================================================//
        //****************MAKANAN MALAM*******************//
        //============================================================================//

        // ================INPUT DATA MAKANAN================//
        $dataMakanan_malam = DataMakanan::create([
            'paket' => $paket,
            'waktu_makan' => $waktumakan_malam,
            'menu' => $menu_malam
        ]);

        //================INPUT SUBMENU================//
        sub_menu::create([
            'nama_makanan' => $mp_malam,
            'jenis_makanan' => $j_makananPokok,
            'protein' => $proteinmp_malam,
            'karbohidrat' => $karbomp_malam,
            'lemak' => $lemakmp_malam,
            'energi' => $energimp_malam,
            'Data_makanan_idData_makanan' => $dataMakanan_malam->id
        ]);

        sub_menu::create([
            'nama_makanan' => $lauk_malam,
            'jenis_makanan' => $j_lauk,
            'protein' => $proteinlauk_malam,
            'karbohidrat' => $karbolauk_malam,
            'lemak' => $lemaklauk_malam,
            'energi' => $energilauk_malam,
            'Data_makanan_idData_makanan' => $dataMakanan_malam->id
        ]);


        sub_menu::create([
            'nama_makanan' => $sayur_malam,
            'jenis_makanan' => $j_sayur,
            'protein' => $proteinsyr_malam,
            'karbohidrat' => $karbosyr_malam,
            'lemak' => $lemaksyr_malam,
            'energi' => $energisyr_malam,
            'Data_makanan_idData_makanan' => $dataMakanan_malam->id
        ]);

        sub_menu::create([
            'nama_makanan' => $buah_malam,
            'jenis_makanan' => $j_buah,
            'protein' => $proteinbuah_malam,
            'karbohidrat' => $karbobuah_malam,
            'lemak' => $lemakbuah_malam,
            'energi' => $energibuah_malam,
            'Data_makanan_idData_makanan' => $dataMakanan_malam->id
        ]);

        //============================================================================//
        //****************MAKANAN MALAM*******************//
        //============================================================================//

        //============================================================================//
        //****************SELINGAN PAGI*******************//
        //============================================================================//

        //================INPUT DATA MAKANAN================//
        $SelinganPagi = DataMakanan::create([
            'paket' => $paket,
            'waktu_makan' => $waktumakan_SPagi,
            'menu' => $menuselingan_pagi
        ]);

        //================INPUT SUBMENU================//
        selingan::create([
            'protein' => $proteinsp_pagi,
            'karbohidrat' => $karbosp_pagi,
            'lemak' => $lemaksp_pagi,
            'energi' => $energisp_pagi,
            'Data_makanan_idData_makanan' => $SelinganPagi->id
        ]);

        //============================================================================//
        //****************SELINGAN PAGI*******************//
        //============================================================================//

        //============================================================================//
        //****************SELINGAN SORE*******************//
        //============================================================================//

        //================INPUT DATA MAKANAN================//
        $SelinganSore = DataMakanan::create([
            'paket' => $paket,
            'waktu_makan' => $waktumakan_Ssore,
            'menu' => $menuselingan_sore
        ]);

        //================INPUT SUBMENU================//
        selingan::create([
            'protein' => $proteinss_sore,
            'karbohidrat' => $karboss_sore,
            'lemak' => $lemakss_sore,
            'energi' => $energiss_sore,
            'Data_makanan_idData_makanan' => $SelinganSore->id
        ]);

        //============================================================================//
        //****************SELINGAN SORE*******************//
        //============================================================================//

        return redirect('created')->with('success', 'Paket created successfully.');
    }

    public function datamakanan()
    {
        $query = DataMakanan::all();
        return view('website.admin.dataMakananAdmin', compact('query'));
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }
    public function showadmin(string $paket, Request $request)
    {
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

        return view('website.admin.submenuadmin', compact('joindata', 'paket', 'dataSelingan'));
    }


    public function edit($id)
    {
        $dataMakanan = DataMakanan::where('paket', 'LIKE', $id)->get();
        // Ambil semua idData_makanan dari hasil query dataMakanan
        $idDataMakananArray = $dataMakanan->pluck('idData_makanan')->toArray();

        $subMenu = DB::table('data_makanan')
            ->join('sub_menu', 'sub_menu.Data_makanan_idData_makanan', '=', 'data_makanan.idData_makanan')
            ->whereIn('data_makanan.idData_makanan', $idDataMakananArray)
            ->select('data_makanan.*', 'sub_menu.*')
            ->get();

        $selingan = DB::table('data_makanan')
            ->join('selingan', 'selingan.Data_makanan_idData_makanan', '=', 'data_makanan.idData_makanan')
            ->whereIn('data_makanan.idData_makanan', $idDataMakananArray)
            ->select('data_makanan.*', 'selingan.*')
            ->get();
        // dd($selingan);
        return view('website.admin.formEdit', compact('dataMakanan', 'subMenu', 'selingan', 'idDataMakananArray'));
    }


    public function update(Request $request, $idmakan_pagi, $idmakan_siang, $idmakan_malam, $idmakan_selinganPG, $idmakan_selinganSR)
    {
        //proses menu pagi
        $paket = $request->paket;
        $waktumakan_pagi =  $request->waktumakan_pagi;
        $menu_pagi = $request->menu_pagi;
        //proses submenu pagi
        $mp_pagi = $request->mp_pagi;
        $j_makananPokok = $request->j_mp;
        $proteinmp_pagi = $request->proteinmp_pagi;
        $karbomp_pagi = $request->karbomp_pagi;
        $lemakmp_pagi = $request->lemakmp_pagi;
        $energimp_pagi = $request->energimp_pagi;

        $lauk_pagi = $request->lauk_pagi;
        $j_lauk = $request->j_lauk;
        $proteinlauk_pagi = $request->proteinlauk_pagi;
        $karbolauk_pagi = $request->karbolauk_pagi;
        $lemaklauk_pagi = $request->lemaklauk_pagi;
        $energilauk_pagi = $request->energilauk_pagi;

        $sayur_pagi = $request->syr_pagi;
        $j_sayur = $request->j_sayur;
        $proteinsyr_pagi = $request->proteinsyr_pagi;
        $karbosyr_pagi = $request->karbosyr_pagi;
        $lemaksyr_pagi = $request->lemaksyr_pagi;
        $energisyr_pagi = $request->energisyr_pagi;

        $buah_pagi = $request->buah_pagi;
        $j_buah = $request->j_buah;
        $proteinbuah_pagi = $request->proteinbuah_pagi;
        $karbobuah_pagi = $request->karbobuah_pagi;
        $lemakbuah_pagi = $request->lemakbuah_pagi;
        $energibuah_pagi = $request->energibuah_pagi;

        //proses menu siang
        $waktumakan_siang =  $request->waktumakan_siang;
        $menu_siang = $request->menu_siang;
        //proses submenu siang
        $mp_siang = $request->mp_siang;
        $proteinmp_siang = $request->proteinmp_siang;
        $karbomp_siang = $request->karbomp_siang;
        $lemakmp_siang = $request->lemakmp_siang;
        $energimp_siang = $request->energimp_siang;

        $lauk_siang = $request->lauk_siang;
        $proteinlauk_siang = $request->proteinlauk_siang;
        $karbolauk_siang = $request->karbolauk_siang;
        $lemaklauk_siang = $request->lemaklauk_siang;
        $energilauk_siang = $request->energilauk_siang;

        $sayur_siang = $request->syr_siang;
        $proteinsyr_siang = $request->proteinsyr_siang;
        $karbosyr_siang = $request->karbosyr_siang;
        $lemaksyr_siang = $request->lemaksyr_siang;
        $energisyr_siang = $request->energisyr_siang;

        $buah_siang = $request->buah_siang;
        $proteinbuah_siang = $request->proteinbuah_siang;
        $karbobuah_siang = $request->karbobuah_siang;
        $lemakbuah_siang = $request->lemakbuah_siang;
        $energibuah_siang = $request->energibuah_siang;


        //proses menu malam
        $waktumakan_malam =  $request->waktumakan_malam;
        $menu_malam = $request->menu_malam;
        //proses submenu siang
        $mp_malam = $request->mp_malam;
        $proteinmp_malam = $request->proteinmp_malam;
        $karbomp_malam = $request->karbomp_malam;
        $lemakmp_malam = $request->lemakmp_malam;
        $energimp_malam = $request->energimp_malam;

        $lauk_malam = $request->lauk_malam;
        $proteinlauk_malam = $request->proteinlauk_malam;
        $karbolauk_malam = $request->karbolauk_malam;
        $lemaklauk_malam = $request->lemaklauk_malam;
        $energilauk_malam = $request->energilauk_malam;

        $sayur_malam = $request->syr_malam;
        $proteinsyr_malam = $request->proteinsyr_malam;
        $karbosyr_malam = $request->karbosyr_malam;
        $lemaksyr_malam = $request->lemaksyr_malam;
        $energisyr_malam = $request->energisyr_malam;

        $buah_malam = $request->buah_malam;
        $proteinbuah_malam = $request->proteinbuah_malam;
        $karbobuah_malam = $request->karbobuah_malam;
        $lemakbuah_malam = $request->lemakbuah_malam;
        $energibuah_malam = $request->energibuah_malam;

        //proses selingan pagi
        $waktumakan_SPagi = $request->waktumakan_SPagi;
        $menuselingan_pagi = $request->menuselingan_pagi;
        //proses submenu selingan pagi
        $proteinsp_pagi = $request->proteinselingan_pagi;
        $karbosp_pagi = $request->karboselingan_pagi;
        $lemaksp_pagi = $request->lemakselingan_pagi;
        $energisp_pagi = $request->energiselingan_pagi;

        //proses selingan sore
        $waktumakan_Ssore = $request->waktumkn_Ssore;
        $menuselingan_sore = $request->menuselingan_sore;
        //proses submenu selingan pagi
        $proteinss_sore = $request->proteinselingan_sore;
        $karboss_sore = $request->karboselingan_sore;
        $lemakss_sore = $request->lemakselingan_sore;
        $energiss_sore = $request->energiselingan_sore;

        DataMakanan::where('idData_makanan', $idmakan_pagi)
            ->update([
                'paket' => $paket,
                'waktu_makan' => $waktumakan_pagi,
                'menu' => $menu_pagi,
            ]);

        $idsub_pagi = sub_menu::where('Data_makanan_idData_makanan', $idmakan_pagi)->get();
        $idsub_pagi = $idsub_pagi->pluck('id')->toArray();

        sub_menu::where('id', $idsub_pagi[0])->update([
            'nama_makanan' => $mp_pagi,
            'jenis_makanan' => $j_makananPokok,
            'protein' => $proteinmp_pagi,
            'karbohidrat' => $karbomp_pagi,
            'lemak' => $lemakmp_pagi,
            'energi' => $energimp_pagi
        ]);

        sub_menu::where('id', $idsub_pagi[1])->update([
            'nama_makanan' => $lauk_pagi,
            'jenis_makanan' => $j_lauk,
            'protein' => $proteinlauk_pagi,
            'karbohidrat' => $karbolauk_pagi,
            'lemak' => $lemaklauk_pagi,
            'energi' => $energilauk_pagi
        ]);

        sub_menu::where('id', $idsub_pagi[2])->update([
            'nama_makanan' => $sayur_pagi,
            'jenis_makanan' => $j_sayur,
            'protein' => $proteinsyr_pagi,
            'karbohidrat' => $karbosyr_pagi,
            'lemak' => $lemaksyr_pagi,
            'energi' => $energisyr_pagi
        ]);

        sub_menu::where('id', $idsub_pagi[3])->update([
            'nama_makanan' => $buah_pagi,
            'jenis_makanan' => $j_buah,
            'protein' => $proteinbuah_pagi,
            'karbohidrat' => $karbobuah_pagi,
            'lemak' => $lemakbuah_pagi,
            'energi' => $energibuah_pagi
        ]);

        //=============================< EDIT MAKAN SIANG >======================================//
        $idsub_siang = sub_menu::where('Data_makanan_idData_makanan', $idmakan_siang)->get();
        $idsub_siang = $idsub_siang->pluck('id')->toArray();

        DataMakanan::where('idData_makanan', $idmakan_siang)
            ->update([
                'paket' => $paket,
                'waktu_makan' => $waktumakan_siang,
                'menu' => $menu_siang,
            ]);

        sub_menu::where('id', $idsub_siang[0])->update([
            'nama_makanan' => $mp_siang,
            'jenis_makanan' => $j_makananPokok,
            'protein' => $proteinmp_siang,
            'karbohidrat' => $karbomp_siang,
            'lemak' => $lemakmp_siang,
            'energi' => $energimp_siang
        ]);

        sub_menu::where('id', $idsub_siang[1])->update([
            'nama_makanan' => $lauk_siang,
            'jenis_makanan' => $j_lauk,
            'protein' => $proteinlauk_siang,
            'karbohidrat' => $karbolauk_siang,
            'lemak' => $lemaklauk_siang,
            'energi' => $energilauk_siang
        ]);

        sub_menu::where('id', $idsub_siang[2])->update([
            'nama_makanan' => $sayur_siang,
            'jenis_makanan' => $j_sayur,
            'protein' => $proteinsyr_siang,
            'karbohidrat' => $karbosyr_siang,
            'lemak' => $lemaksyr_siang,
            'energi' => $energisyr_siang
        ]);

        sub_menu::where('id', $idsub_siang[3])->update([
            'nama_makanan' => $buah_siang,
            'jenis_makanan' => $j_buah,
            'protein' => $proteinbuah_siang,
            'karbohidrat' => $karbobuah_siang,
            'lemak' => $lemakbuah_siang,
            'energi' => $energibuah_siang
        ]);

        //=============================< EDIT MAKAN MALAM >======================================//
        $idsub_malam = sub_menu::where('Data_makanan_idData_makanan', $idmakan_malam)->get();
        // $idsub_malam = $idsub_malam->pluck('id')->toArray();

        DataMakanan::where('idData_makanan', $idmakan_malam)
            ->update([
                'paket' => $paket,
                'waktu_makan' => $waktumakan_malam,
                'menu' => $menu_malam,
            ]);

        sub_menu::where('id', $idsub_malam[0])->update([
            'nama_makanan' => $mp_malam,
            'jenis_makanan' => $j_makananPokok,
            'protein' => $proteinmp_malam,
            'karbohidrat' => $karbomp_malam,
            'lemak' => $lemakmp_malam,
            'energi' => $energimp_malam
        ]);

        sub_menu::where('id', $idsub_malam[1])->update([
            'nama_makanan' => $lauk_malam,
            'jenis_makanan' => $j_lauk,
            'protein' => $proteinlauk_malam,
            'karbohidrat' => $karbolauk_malam,
            'lemak' => $lemaklauk_malam,
            'energi' => $energilauk_malam
        ]);

        sub_menu::where('id', $idsub_malam[2])->update([
            'nama_makanan' => $sayur_malam,
            'jenis_makanan' => $j_sayur,
            'protein' => $proteinsyr_malam,
            'karbohidrat' => $karbosyr_malam,
            'lemak' => $lemaksyr_malam,
            'energi' => $energisyr_malam
        ]);

        sub_menu::where('id', $idsub_malam[3])->update([
            'nama_makanan' => $buah_malam,
            'jenis_makanan' => $j_buah,
            'protein' => $proteinbuah_malam,
            'karbohidrat' => $karbobuah_malam,
            'lemak' => $lemakbuah_malam,
            'energi' => $energibuah_malam
        ]);

        //=============================< SELINGAN PAGI >======================================//
        $idselinagan_PG = selingan::where('Data_makanan_idData_makanan', $idmakan_selinganPG)->first();
        $idselinagan_SR = selingan::where('Data_makanan_idData_makanan', $idmakan_selinganSR)->first();

        selingan::where('id', $idselinagan_PG->id)->update([
            'nama_selingan' => $menuselingan_pagi,
            'protein' => $proteinsp_pagi,
            'karbohidrat' => $karbosp_pagi,
            'lemak' => $lemaksp_pagi,
            'energi' => $energisp_pagi
        ]);

        DataMakanan::where('idData_makanan', $idselinagan_PG->Data_makanan_idData_makanan)->update([
            'menu' => $menuselingan_pagi
        ]);

        selingan::where('id', $idselinagan_SR->id)->update([
            'nama_selingan' => $menuselingan_sore,
            'protein' => $proteinss_sore,
            'karbohidrat' => $karboss_sore,
            'lemak' => $lemakss_sore,
            'energi' => $energiss_sore
        ]);

        DataMakanan::where('idData_makanan', $idselinagan_SR->Data_makanan_idData_makanan)->update([
            'menu' => $menuselingan_sore
        ]);


        return redirect('datamakananadmin')->with('success', 'Data berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete($paket)
    {
        $dataMakanan = DataMakanan::where('paket', $paket)->get();
        $dataMakanan = $dataMakanan->pluck('idData_makanan')->toArray();

        // dd($dataMakanan);
        foreach ($dataMakanan as $value) {
            sub_menu::where('Data_makanan_idData_makanan', $value)->delete();
            selingan::where('Data_makanan_idData_makanan', $value)->delete();
            DataMakanan::where('idData_makanan', $value)->delete();
        }
        return redirect('datamakananadmin')->with('success', 'Data berhasil dihapus');
    }
}
