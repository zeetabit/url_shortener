<?php

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

$router->post('/createURL', function(\Illuminate\Http\Request $request) {
    //\Illuminate\Support\Facades\Cache::put('dev_keys', ['someKey']);
    $this->validate($request, [
        'api_dev_key'   => 'required|string|check_dev_key',
        'original_url'  => 'required|string',
        'custom_alias'  => 'string',
        'user_name'     => 'string',
        'expire_date'   => 'date',
    ]);

    $data = $request->all();

    if (!isset($data['custom_alias'])) {
        $data['custom_alias'] = null;
    }

    if (!isset($data['user_name'])) {
        $data['user_name'] = null;
    }

    if (!isset($data['expire_date'])) {
        $data['expire_date'] = null;
    }

    return $data;
});

$router->post('/deleteURL', function (\Illuminate\Http\Request $request) {
    $this->validate($request, [
        'api_dev_key'   => 'required|string|check_dev_key',
        'url_key'       => 'required|string',
    ]);

    $data = $request->all();
});
