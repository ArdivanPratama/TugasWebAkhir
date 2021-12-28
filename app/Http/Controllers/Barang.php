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
        $barang = ModelsBarang::all();
        return view('layouts/barang', [
            'barang' => $barang,
        ]);
    }

    public function create()
    {
        $Kt = Kategory::all();
        return view('forms.barang.add', [
            'Kt' => $Kt,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun' => 'required|numeric|digits:4',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $barang =  ModelsBarang::create($request->all());
            $response = [
                'message' => "Barang Data created",
                'data' => $barang,
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo,
            ]);
        }
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

    public function update(Request $request, $id)
    {
        $barang = ModelsBarang::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'tahun' => 'required|numeric|digits:4',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $barang->update($request->all());
            $response = [
                'message' => "Barang Updated",
                'data' => $barang,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo,
            ]);
        }
    }

    public function destroy($id)
    {
        $barang = ModelsBarang::findOrFail($id);
        try {
            $barang->delete();
            $response = [
                'message' => "Barang Deleted",
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo,
            ]);
        }
    }
}
