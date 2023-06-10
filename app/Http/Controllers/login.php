<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class login extends BaseController
{
    public function index()
    {
        $data = DB::table('loggin')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }

    public function getByID($id)
    {
        $data = DB::table('loggin')->where('id', $id)->first();
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
        $akun = [
            'ussername' => $data['ussername'],
            'password' => $data['password'],
            'level' => $data['level'],
            
        ];
        try {
            DB::table('loggin')->insert($akun);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'insert akun sukses'
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
        $akun = [
            'ussername' => $data['ussername'],
            'password' => $data['password'],
            'level' => $data['level'],

        ];
        try {
            DB::table('loggin')
                ->where('No', $id)
                ->update($akun);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update akun sukses'
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
            DB::table('loggin')
                ->where('id', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete akun sukses'
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