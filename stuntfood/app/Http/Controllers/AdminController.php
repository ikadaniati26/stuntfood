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
       $data = DataMakanan::find($id);
       return view('formEdit', compact('data'));
    }
    
    public function update(Request $request, $id)
    {
        $data = DataMakanan::find($id);
        $data->update($request->all());
        return redirect()->route('prosesadmin')->with('success', 'Data berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
