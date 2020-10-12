<?php

use App\Models\Tienda;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
//use Flash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['middleware' => 'auth', function () {
    return redirect()->action('TiendaController@index');
}]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tiendas', 'TiendaController');



Route::get('/auth/{app_id}', function ($app_id) {

    $response = Http::get("https://www.tiendanube.com/apps/$app_id/authorize");
    return $response;
});


Route::get('/callback', function () {
    $code = $_GET['code'];
    $client_id = $_GET['client_id'];
    $tienda = Tienda::where('client_id', '=', $client_id)->firstOrFail();

    $auth = new TiendaNube\Auth($tienda->client_id, $tienda->client_secret);

    $store_info = $auth->request_access_token($code);

    $tienda->store_id = $store_info['store_id'];
    $tienda->token = $store_info['access_token'];
    $tienda->save();

    Flash::success('Tienda updated successfully.');

    return redirect(route('tiendas.index'));
});



Route::get('/tienda/{store_id}/products', function ($store_id) {

    $tienda = Tienda::where('store_id', '=', $store_id)->firstOrFail();
    
    $api = new TiendaNube\API($store_id, $tienda->token, 'prueba (arielborthiryt@gmail.com)');
    $response = $api->get("products");
//dd($response->body);
    return view('productos.index')
    ->with('productos', $response->body);
});


Route::get('/eventos', 'WebHookController@index');