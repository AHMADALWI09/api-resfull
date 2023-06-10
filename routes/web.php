<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();

   
});

$router->get('/hello',function(){
        return '<h1 style="color: blue ">Hello semua.selamat belajar Lumen</h1>';
        return'<table> 
         </table>';

});

$router->get('/api/v1/customers','ExampleController@showlistcustomurs');
$router->get('/api/v1/customers/{id}','ExampleController@getCustomerByID');

$router->get('/api/v1/mahasiswa','MahasiswaController@index');
$router->get('/api/v1/mahasiswa/{id}','MahasiswaController@getByID');
$router->post('/api/v1/mahasiswa','MahasiswaController@insert');
$router->put('/api/v1/mahasiswa/{id}', 'MahasiswaController@update');
$router->delete('/api/v1/mahasiswa/{id}', 'MahasiswaController@delete');
$router->post('/api/v1/account/login','AccountController@login');

$router->get('/api/v1/laporan','laporanproduksi@index');
$router->get('/api/v1/laporan/{id}','laporanproduksi@getByID');
$router->post('/api/v1/laporan','laporanproduksi@insert');
$router->put('/api/v1/laporan/{id}', 'laporanproduksi@update');
$router->delete('/api/v1/laporan/{id}', 'laporanproduksi@delete');

$router->get('/api/v1/login','login@index');
$router->get('/api/v1/login/{id}','login@getByID');
$router->post('/api/v1/login','login@insert');
$router->put('/api/v1/login/{id}', 'login@update');
$router->delete('/api/v1/login/{id}', 'login@delete');
$router->post('/api/v1/account/login','AccountController@login');

