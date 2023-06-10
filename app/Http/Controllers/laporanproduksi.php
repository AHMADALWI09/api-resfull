<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class laporanproduksi extends BaseController
{
    public function index()
    {
        $data = DB::table('laporan_produksi')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }

    public function getByID($id)
    {
        $data = DB::table('laporan_produksi')->where('No', $id)->first();
        if ($data) {
            return response()->json($data);
        } else {
            return response()
                ->json([
                    'success' => false,
                    'status' => 404,
                    'message' => 'Data not found'
                ], 404);
        }
    }

    public function insert()
    {
        $data = request()->all();
        $lp = [
            'LINE' => $data['LINE'],
            'PERIODE' => $data['PERIODE'],
            'UNLOADING' => $data['UNLOADING'],
            'MASUK' => $data['MASUK'],
            'BUFFING' => $data['BUFFING'],
            'NG' => $data['NG'],
            'TU' => $data['TU'],
            'TOTAL_OK' => $data['TOTAL_OK'],
            'TOTAL_NG' => $data['TOTAL_NG'],
            'TANGGAL' => $data['TANGGAL']

        ];
        try {
            DB::table('laporan_produksi')->insert($lp);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'insert laporan sukses'
            ];
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()
                ->json([
                    'success' => false,
                    'status' => 400,
                    'message' => $message
                ], 400);
        }
    }

    public function update($id)
    {
        $data = request()->all();
        $lp = [
            'LINE' => $data['LINE'],
            'PERIODE' => $data['PERIODE'],
            'UNLOADING' => $data['UNLOADING'],
            'MASUK' => $data['MASUK'],
            'BUFFING' => $data['BUFFING'],
            'NG' => $data['NG'],
            'TU' => $data['TU'],
            'TOTAL_OK' => $data['TOTAL_OK'],
            'TOTAL_NG' => $data['TOTAL_NG'],
            'TANGGAL' => $data['TANGGAL']

        ];
        try {
            DB::table('laporan_produksi')
                ->where('No', $id)
                ->update($lp);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update laporan sukses'
            ];
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()
                ->json([
                    'success' => false,
                    'status' => 400,
                    'message' => $message
                ], 400);
        }
    }

    public function delete($id)
    {
        try {
            DB::table('laporan_produksi')
                ->where('No', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete laporan sukses'
            ];
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()
                ->json([
                    'success' => false,
                    'status' => 400,
                    'message' => $message
                ], 400);
        }
    }
}