<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransaksiResource;
use App\Models\Transaksi as ModelsTransaksi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class transaksi extends Controller
{
    public function index()
    {
        return TransaksiResource::collection(ModelsTransaksi::orderBy('tahun')->paginate(3));
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
            $transaksi =  ModelsTransaksi::create($request->all());
            $response = [
                'message' => "Transaksi Data created",
                'data' => $transaksi,
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
        $transaksi = ModelsTransaksi::findOrFail($id);
        $response = [
            'message' => "Transaksi with id " . $id,
            'data' => $transaksi,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $transaksi = ModelsTransaksi::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'tahun' => 'required|numeric|digits:4',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $transaksi->update($request->all());
            $response = [
                'message' => "Transaksi Updated",
                'data' => $transaksi,
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
        $transaksi = ModelsTransaksi::findOrFail($id);
        try {
            $transaksi->delete();
            $response = [
                'message' => "Transaksi Deleted",
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo,
            ]);
        }
    }
}
