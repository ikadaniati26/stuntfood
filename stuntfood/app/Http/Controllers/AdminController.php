<?php

namespace App\Http\Controllers;

use App\Models\DataMakanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Changed to use the correct namespace for Session
use PhpParser\Node\Stmt\Return_;

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
        try {
            // Loop through each item in the form array
            foreach ($request->waktu_makan as $key => $value) {
                // Save each item to the database
                DataMakanan::create([
                    'waktu_makan' => $request->waktu_makan[$key],
                    'paket' => $request->paket[$key],
                    'nama_makanan' => $request->nama_makanan[$key],
                    'protein' => $request->protein[$key],
                    'karbohidrat' => $request->karbohidrat[$key],
                    'lemak' => $request->lemak[$key],
                    'energi' => $request->energi[$key]
                ]);
            }

            // Redirect after saving all items
            return redirect('created')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan dan kembalikan ke halaman sebelumnya
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
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
    
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
        ]);
    
        // Simpan data ke dalam database
        $data = new DataMakanan(); 
        $data->waktu_makan = $request->waktu_makan; // Contoh pengaturan atribut 'nama'
        $data->paket = $request->paket; 
        $data->nama_makanan = $request->nama_makanan;
        $data->protein = $request->protein;
        $data->karbohidrat = $request->karbohidrat;
        $data->lemak = $request->lemak;
        $data->energi = $request->energi;
        
        // Contoh pengaturan atribut 'alamat'
        // Lanjutkan hingga semua atribut yang ingin Anda simpan telah ditetapkan
    
        // Simpan data ke dalam database
        $data->save();
    
        // Berikan respons
      //  return response()->json(['success' => true]);
       // Redirect ke halaman yang sesuai
       return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function prosesForm(Request $request)
    {
        // Validasi data formulir jika diperlukan
        $request->validate([
            // Atur validasi sesuai kebutuhan Anda
        ]);

        // Looping data formulir yang diterima
        foreach ($request->waktu_makan as $key => $value) {
            // Simpan data ke dalam database menggunakan model
            DataMakanan::create([
                'waktu_makan' => $request->waktu_makan[$key],
                'paket' => $request->paket[$key],
                'nama_makanan' => $request->nama_makanan[$key],
                'protein' => $request->protein[$key],
                'lemak' => $request->lemak[$key],
                'karbohidrat' => $request->karbohidrat[$key],
                'energi' => $request->energi[$key],
            ]);
        }

        // Redirect ke halaman yang sesuai
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
    
}
