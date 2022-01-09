<?php

use App\Http\Controllers\Ejemplo3Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EjemploController;

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

Route::get('/{locale?}/formulariolangs', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }
    return view('formulariolangs');
});

/* Route::get('/post/{id}', function($id) {
    return "Este es el post nº " . $id;
}); // Aquí se pasa un parámetro a la url de forma sencilla */

Route::get('/post/{id}/{nombre}', function($id, $nombre) {
    return "Este es el post nº " . $id . " creado por " . $nombre;
})->where('nombre','[A-Za-z]+'); 
// Aquí se pasa más un parámetro a la url y además, ponemos una regexp al nombre para filtrar los input del usuario

/**
 * Rutas con controladores. No funciona igual que en versiones anteriores de Laravel 
 * Necesitamos indicar el nombre de nuestro controlador seguido de ::class
 * y además como parámetro añadir el nombre del método que nos interesa
 * IMPORTANTE: Para poder llamar bien a los controladores, tienes que importarlos al principio
 * de todo con use (mira las primeras líneas de este código). Si no, te dirá que no existen.
 * Si tabulas el nombre de la clase controller con el IDE es probable que lo importe automáticamente,
 * si copias y pegas líneas de código es posible que no lo haga.
 */

Route::get('/inicio', [EjemploController::class, 'inicio']);

Route::get('/iniciooo', [Ejemplo3Controller::class, 'index']);