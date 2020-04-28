

<?php

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

Route::get('animales/', function() {
    return view('animalesCategorias');
    });

    

    Route::get('/politicaPrivacidad/', function() {
        return view('politicaDePrivacidad');
        });
    
        Route::get('/donarProductos/', function() {
            return view('donarProductos');
            });
        
        
    Route::get('/condicionesAdoptar/', function() {
        return view('condicionesAdoptar');
        });


        Route::get('/condicionesAdoptar/', function() {
            return view('condicionesAdoptar');
            });
    
    

        Route::get('/sobreNosotros/', function() {
            return view('sobreNosotros');
            });
        
    
            Route::get('/faq/', function() {
                return view('faq');
                });



                
Route::get('/preguntas/', 'PreguntasController@indexJugetesDias');



    Route::get('/animales/{especie}', 'ApiController@getAnimalsSpecie');

Route::get('/animal/{id}', 'AnimalController@getAnimalID');

Route::get('/home','PrincipalController@index' );
Route::get('/', 'PrincipalController@index');
Auth::routes();
Route::get('/productos/busqueda', 'ApiController@indexToysGenerico');
Route::get('/productos/busqueda/{nombre}/{pagina?}', 'ApiController@indexToysName');



Route::get('watermark-image', 'WaterMarkController@imageWatermark');
Route::get('watermark-text', 'WaterMarkController@textWatermark');

Route::middleware('auth')->get('/usuario/perfil', 'UserController@perfilUsuario');
Route::get('cesta/pagar','pagoController@getMetodos');
/*
|--------------------------------------------------------------------------
| CRUD Usuario
|--------------------------------------------------------------------------
|
| Las rutas relacionadas de los usuarios
|
*/
Route::group(['prefix' => 'usuario'], function(){

 

                              


    Route::middleware('auth')->get('perfil/historial/', 'UserController@historialUsuario');

    
    //GESTIÓN LISTAR USUARIOS
    Route::get('listar/historial/{nif}', 'UserController@historialAdmin');
    Route::get('listar/historial/importe/{nif}/{importe}', 'UserController@historialImporte');
    Route::get('listar/historial/fecha/{nif}/{fecha}', 'UserController@historialFecha');

    
    
    Route::get('registro/', function () {
        return view('auth.register');
    });



    Route::get('login/', function () {
        return view('auth.login');
    });

    //LISTAR USUARIOS
    Route::get('listar/', function () {
        return view('usuarios.listar-usuarios');
    });
    Route::get('listar/mostrar/', 'UserController@listarUsuarios');

});

Route::get('/terminosYCondiciones/',function(){
    return view('terminosYCondiciones');
});	

Route::get('/nuestroCompromiso/',function(){
    return view('nuestroCompromiso');
});

Route::get('/sobreNosotros/',function(){
    return view('sobreNosotros');
});

Route::get('/politicaDePrivacidad/',function(){
    return view('politicaDePrivacidad');
});
    
Route::get('cesta/',function(){	
    return view('cesta');	   
}); 	
                              


/*
|--------------------------------------------------------------------------
| CRUD Producto
|--------------------------------------------------------------------------
|
| Las rutas relacionadas de los productos
|
*/
Route::group(['prefix' => 'producto'], function(){

/*    Route::get('detalle/{id}', function ($id) {
        return view('productos.detalle')->with('id',$id);
    });*/

    Route::get('detalle/{id}', 'ProductController@mostrarProducto');

    //LISTAR PRODUCTOS
    Route::get('listar/', function () {
        return view('productos.listar-productos');
    });
    Route::get('listar/mostrar/', 'ProductController@listarProductos');

    Route::get('listar/modificar/{id}/{atributo}/{valor}', 'ProductController@modificarProducto');

    Route::get('listar/{categoria}', 'ProductController@listarProductosCategoria');

});

Route::get('cesta/',function(){
    return view('cesta');
});