<?php

namespace App\Http\Controllers;

class ExampleController extends ExampleController {

    private $data = [
        [
            'id' => 'cus001',
            'name' => 'alwi',
            'address' => 'bekasi'
        ],
        [
            'id' => 'cus002',
            'name' => 'alwi',
            'address' => 'bekasi'
        ],
        [
            'id' => 'cus003',
            'name' => 'alwi',
            'address' => 'bekasi'
        ]
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function showlistcustomurs() {
        return[
            'status' => '200',
            'success' => true,
            'data' => $this->data
        ];
    }

    public function getCustomerByID($id) {
        foreach ($this->data as $d) {
            if ($d['id'] == $id) {
                return [
                    'status' => 200,
                    'success' => true,
                    'customer' => $d
                ];
            }
        }
        return[
        'status' => 401,
        'success' => false,
        'massage' => 'data not found!'
        ];
    }

}
