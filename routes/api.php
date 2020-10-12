<?php

use App\Models\Tienda;
use App\Models\WebHook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/tienda/{store_id}/products/{product_id}', function ($store_id, $product_id) {

    $tienda = Tienda::where('store_id', '=', $store_id)->firstOrFail();

    $api = new TiendaNube\API($store_id, $tienda->token, 'prueba (arielborthiryt@gmail.com)');

    $data = json_decode(file_get_contents('php://input'), true);

    $response = $api->put("products/$product_id", $data);

    dd($response);

    /*  $response =  Http::withHeaders([
        'Authentication' => "bearer {$tienda->token}",
        'Content-Type' => 'application/json',
        'User-Agent' => 'prueba (arielborthiryt@gmail.com)'
    ])->put("https://api.tiendanube.com/v1/$store_id/products/$product_id", $data);*/

    //dd($response);
});

Route::put('/tienda/{store_id}/products/{product_id}/variants/{variant_id}', function ($store_id, $product_id, $variant_id) {

    $tienda = Tienda::where('store_id', '=', $store_id)->firstOrFail();

    $api = new TiendaNube\API($store_id, $tienda->token, 'prueba (arielborthiryt@gmail.com)');

    $data = json_decode(file_get_contents('php://input'), true);

    $response = $api->put("products/$product_id/variants/$variant_id", $data);

    dd($response);
});


Route::delete('/tienda/{store_id}/{resource}/{product_id}', function ($store_id,$resource, $resource_id) {

    $tienda = Tienda::where('store_id', '=', $store_id)->firstOrFail();

    $api = new TiendaNube\API($store_id, $tienda->token, 'prueba (arielborthiryt@gmail.com)');

    $response = $api->delete("$resource/$resource_id");

    dd($response);
});



Route::post('/tienda/{store_id}/{resource}', function ($store_id,$resource) {

    $tienda = Tienda::where('store_id', '=', $store_id)->firstOrFail();

    $api = new TiendaNube\API($store_id, $tienda->token, 'prueba (arielborthiryt@gmail.com)');

    $data = json_decode(file_get_contents('php://input'), true);

    $response = $api->post($resource, $data);

    dd($response);
});



Route::post('/tienda/callback/update/product', function () {

    $data = file_get_contents('php://input');
    $dataArray = json_decode($data, true);    
    $tienda = Tienda::where('store_id', '=', $dataArray['store_id'])->firstOrFail();
   
    $hmac_header = $_SERVER['HTTP_X_LINKEDSTORE_HMAC_SHA256'];
    if ($hmac_header != hash_hmac('sha256', $data, $tienda->client_secret)) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    $webhook = new WebHook;
    $webhook->id_wh = $dataArray['id'];
    $webhook->store_id = $dataArray['store_id'];
    $webhook->event = $dataArray['event'];
    $webhook->save();

    return response()->json([
        'message' => 'Successfully created event webhook'
    ], 201);
    
    
});


