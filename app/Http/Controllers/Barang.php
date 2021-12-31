<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangResource;
use App\Models\Barang as ModelsBarang;
use App\Models\Kategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class Barang extends Controller
{
    public function index()
    {
        $kt = Kategory::all();

        $barang = ModelsBarang::all();
        return view('layouts/barang', [
            'barang' => $barang,
            'kt' => $kt
        ]);
    }

    public function create()
    {
        $barang = ModelsBarang::all();


        $Kt = Kategory::all();
        return view('forms.barang.add', [
            'Kt' => $Kt,
            'barang' => $barang,
        ]);
    }

    public function store(Request $request)
    {



        $validator = $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'ukuran_barang' => 'required',
            'kategory_id' => 'required',
            'upgambar' => 'required|file|image',
        ]);


        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('upgambar');

        // nama file
        echo 'File Name: ' . $file->getClientOriginalName();
        echo '<br>';

        // ekstensi file
        echo 'File Extension: ' . $file->getClientOriginalExtension();
        echo '<br>';

        // real path
        echo 'File Real Path: ' . $file->getRealPath();
        echo '<br>';

        // ukuran file
        echo 'File Size: ' . $file->getSize();
        echo '<br>';

        // tipe mime
        echo 'File Mime Type: ' . $file->getMimeType();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';

        // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());

        ModelsBarang::create([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'ukuran_barang' => $request->ukuran_barang,
            'kategory_id' => $request->kategory_id,
            'upgambar' => $tujuan_upload . '/' . $file->getClientOriginalName(),
        ]);
        return redirect('/barang');
    }

    public function show($id)
    {
        $barang = ModelsBarang::findOrFail($id);
        $response = [
            'message' => "Barang with id " . $id,
            'data' => $barang,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function edit($id)
    {
        $barang = ModelsBarang::find($id);
        $Kt = Kategory::all();
        return view('forms.barang.edit', [
            'Kt' => $Kt,
            'barang' => $barang,
        ]);
    }

    public function update(Request $request, $id)
    {
        $barang = ModelsBarang::find($id);
        $validator = $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'ukuran_barang' => 'required',
            'kategory_id' => 'required',
            'upgambar' => 'file|image',
        ]);

        $newfile = $barang->upgambar;

        if ($request->file('upgambar') != null) {
            unlink($barang->upgambar);
            $file = $request->file('upgambar');
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $file->getClientOriginalName());
            $newfile = $tujuan_upload . '/' . $file->getClientOriginalName();
        }

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'ukuran_barang' => $request->ukuran_barang,
            'kategory_id' => $request->kategory_id,
            'upgambar' => $newfile,
        ]);
        return redirect('/barang');
    }

    public function destroy($id)
    {
        $stock = ModelsBarang::find($id);
        unlink($stock->upgambar);
        $stock->delete($id);
        return back();
    }
}
