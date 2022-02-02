<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Ejemplo3Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EjemploController;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\App;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

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

Route::get('agendabbdd', function () {
    return view('agendabbdd');
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

Route::get('/iniciooo/{id}', [Ejemplo3Controller::class, 'index']); 
// Como estamos pasando un parámetro, tendremos que preparar al controlador para que pueda recibir esa información

// Route::get('/', [PaginasController::class, 'inicio']);
/* Route::get('/inicio', [PaginasController::class, 'inicio']);
Route::get('/quienessomos', [PaginasController::class, 'quienesSomos']);
Route::get('/dondeestamos', [PaginasController::class, 'dondeEstamos']);
Route::get('/foro', [PaginasController::class, 'foro']); */

Route::resource("posts", PostController::class);

Route::get('/formdos', function () {
    return view('formulariodos');
});


/* // Rutas con nombre. "Contactame" puede cambiar sin problemas seguirá funcionando
Route::get('contactame', function () {
    return "Sección de contactos";
})->name('contactos');

Route::get('/', function () {
    // Todas hacen referencia a la ruta con name contactos
    echo "<a href='" . route('contactos') . "'>Contactos 1</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 2</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 3</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 4</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 5</a><br>";
}); */

/* Route::get('/', function () {
    $nombre = "Daniel Maestre";
    return view('home')->with('nombre', $nombre);
})->name('home'); */

// App::setLocale('en');
// Route::view('/', 'home', ['nombre' => 'Daniel Maestre'])->name('home');
Route::view('/', 'home')->name('home');
Route::view('/dondeestamos', 'dondeestamos')->name('dondeestamos');
Route::view('/quienessomos', 'quienessomos')->name('quienessomos');
Route::view('/contacto', 'contacto')->name('contacto');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');

Route::post('contacto', [ContactoController::class, 'store'])->name('contacto');
// Route::apiResource('projects', PortfolioController::class);