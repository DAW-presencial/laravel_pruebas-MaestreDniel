<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrarController; // Para llamar a BorrarController.php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('testview', function () {
    return view('portfolio'); // Podemos crear vistas en resources/views. Estas vistas usan la extensión blade.php
});

/* Route::get('/', function () {
    return "Funciona la ruta de la página de inicio. La he configurado desde routes/web.php";
}); */

Route::get('testruta', function () {
    return "Me funciona la ruta de testruta en Laravel. La he configurado desde routes/web.php";
});

Route::get('agenda', function () {
    return view('agenda');
});

Route::get('contador', function () {
    return view('contadorvisit');
});

/**
 * Route::get('/', function () {
 *     return view('welcome');
 * });
 */

// Otra forma de hacer algo como lo de arriba:

Route::view('bienvenido', 'portfolio'); // En este caso necesitaremos una vista llamada portfolio

/*  Route::view('bienvenido/{name?}', function($name='Maestre') { // Le pasa un name como parámetro (mirarlo)
    $titulo='Terminando';
    return view('portfolio', ['name' => $name]);
}); */

// Con controladores. Hay que ir a app/controllers y crear la clase BorrarController, hay distintas maneras de hacerlo

Route::get('/bienvenido', [BorrarController::class]);

Route::get('/{locale?}/formulariolangs', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }
    return view('formulariolangs');
});