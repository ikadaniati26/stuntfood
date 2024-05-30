<?php

namespace App\Http\Controllers;

use App\Models\DataMakanan;
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
       $paket_pagi= $request->paket;
       $waktumakan_pagi=  $request->waktumakan_pagi;
       $menu_pagi = $request->menu_pagi;
       //proses submenu pagi
       $mp_pagi = $request->mp_pagi;
       $j_makananPokok = $request->j_mp;
       $proteinmp_pagi = $request->proteinmp_pagi;
       $karbomp_pagi = $request->karbomp_pagi;
       $lemakmp_pagi = $request->lemakmp_pagi;
       $energimp_pagi= $request->energimp_pagi;

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
        $paket_siang= $request->paket_pagi;
        $waktumakan_siang =  $request->waktumakan_pagi;
        $menu_siang = $request->menu_pagi;
        //proses submenu siang
        $mp_siang = $request->mp_siang;
        $jmp_siang = $request->jmp_siang;
        $proteinmp_siang = $request->proteinmp_siang;
        $karbomp_siang = $request->karbomp_siang;
        $lemakmp_siang = $request->lemakmp_siang;
        $energimp_siang= $request->energimp_siang;

        $lauk_siang = $request->lauk_siang;
        $jlauk_siang = $request->jlauk_siang;
        $proteinlauk_siang = $request->proteinlauk_siang;
        $karbolauk_siang = $request->karbolauk_siang;
        $lemaklauk_siang = $request->lemaklauk_siang;
        $energilauk_siang = $request->energilauk_siang;

        $sayur_siang = $request->syr_siang;
        $jsayur_siang = $request->jsyr_siang;
        $proteinsyr_siang = $request->proteinsyr_siang;
        $karbosyr_siang = $request->karbosyr_siang;
        $lemaklauk_siang = $request->lemaksyr_siang;
        // $energilauk_pagi = $request->energisyr_siang;

        $buah_siang = $request->buah_siang;
        $jbuah_siang = $request->jbuah_siang;
        $proteinbuah_siang = $request->proteinbuah_siang;
        $karbobuah_siang = $request->karbobuah_siang;
        $lemakbuah_siang = $request->lemakbuah_siang;
        $energibuah_siang = $request->energibuah_siang;


         //proses menu malam
         $paket_malam= $request->paket_malam;
         $menu_malam = $request->menu_malam;
         //proses submenu siang
         $mp_malam = $request->mp_malam;
         $jmp_malam = $request->jmp_malam;
         $proteinmp_malam = $request->proteinmp_malam;
         $karbomp_malam = $request->karbomp_malam;
         $lemakmp_malam = $request->lemakmp_malam;
         $energimp_malam= $request->energimp_malam;
 
         $lauk_malam = $request->lauk_malam;
         $jlauk_malam = $request->jlauk_malam;
         $proteinlauk_malam = $request->proteinlauk_malam;
         $karbolauk_malam = $request->karbolauk_malam;
         $lemaklauk_malam = $request->lemaklauk_malam;
         $energilauk_malam = $request->energilauk_malam;
 
         $sayur_malam = $request->syr_malam;
         $jsayur_malam = $request->jsyr_malam;
         $proteinsyr_malam = $request->proteinsyr_malam;
         $karbosyr_malam = $request->karbosyr_malam;
         $lemaklauk_malam = $request->lemaksyr_malam;
         $energilauk_malam = $request->energisyr_malam;
 
         $buah_malam = $request->buah_malam;
         $jbuah_malam = $request->jbuah_malam;
         $proteinbuah_malam = $request->proteinbuah_malam;
         $karbobuah_malam = $request->karbobuah_malam;
         $lemakbuah_malam = $request->lemakbuah_malam;
         $energibuah_malam = $request->energibuah_malam;
       
        //proses selingan pagi
        $paketselingan_sore= $request->paket_malam;
        $selingan_pagi = $request->selingan_pagi;
        //proses submenu selingan pagi
        $selingan_pagi = $request->sp_pagi;
        $proteinsp_pagi = $request->proteinsp_pagi;
        $karbosp_pagi = $request->karbosp_pagi;
        $lemaksp_pagi = $request->lemaksp_pagi;
        $energisp_pagi = $request->energisp_pagi;

        //proses selingan sore
        $paketselingan_sore= $request->paket_sore;
        $selingan_sore = $request->selingan_sore;
        //proses submenu selingan pagi
        $selingan_sore = $request->selingan_sore;
        $proteinss_sore = $request->proteinss_sore;
        $karboss_sore = $request->karboss_sore;
        $lemakss_sore = $request->lemakss_sore;
        $energiss_sore = $request->energiss_sore;

        //============================================================================//
                            //****************MAKANAN PAGI*******************//
        //============================================================================//

        // ================INPUT DATA MAKANAN================//
        $dataMakanan = DataMakanan::create([
            'paket' => $paket_pagi,
            'waktu_makan' => $waktumakan_pagi,
            'menu' => $menu_pagi
        ]);

        // ================INPUT SUBMENU================//
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
    public function show(string $id)
    {
        //
    }

   
    public function edit($id)
    {
       $data = DataMakanan::all()->first();
       return view('website.admin.formEdit', compact('data'));
    }
    
    public function update(Request $request, $id)
    {
        $paket = $request->paket;
        $waktu_makan = $request->waktu_makan;
        $nama_makanan = $request->nama_makanan;
        $protein = $request->protein;
        $lemak = $request->lemak;
        $karbohidrat = $request->karbohidrat;

        DataMakanan::where('idData_makanan', $id)->update([
            'paket'=> $paket,
            'waktu_makan' => $waktu_makan,
            'nama_makanan'=> $nama_makanan,
            'protein' => $protein,
            'lemak' => $lemak,
            'karbohidrat' => $karbohidrat
        ]);
        return redirect('datamakananadmin')->with('success', 'Data berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        DataMakanan::where('idData_makanan', $id)->delete();
        return redirect('datamakananadmin')->with('success', 'Data berhasil dihapus');
    }
}

    

