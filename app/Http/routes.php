<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'oauth'], function(){

    Route::group(['prefix'=>'curso'], function(){
        
        Route::get('', 'CursoController@index');
        Route::get('{id}', 'CursoController@show');
        Route::delete('{id}', 'CursoController@destroy');
        Route::post('', 'CursoController@store');
    });

} );



Route::get('aluno', 'AlunoController@index');
Route::get('alunocurso', 'AlunoCursoController@index');

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());

});