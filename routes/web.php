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

/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

    $router->post('/api/login','TokenController@login');
    
    $router->group(['prefix' => '/api','middleware' => 'auth'], function () use ($router){
        
        $router->group(['prefix' => '/series'], function () use ($router){
            $router->get('', 'SeriesController@listarTodos');
            $router->post('', 'SeriesController@cadastrar');
            $router->get('/{id}', 'SeriesController@listarIndividual');
            $router->put('/{id}','SeriesController@atualizar');
            $router->delete('/{id}','SeriesController@apagar');
            
            $router->get('/{id}/episodios','EpisodiosController@buscaPorSerie');
        });
        
        $router->group(['prefix' => '/episodios'], function () use ($router){
            $router->get('', 'EpisodiosController@listarTodos');
            $router->post('', 'EpisodiosController@cadastrar');
            $router->get('/{id}', 'EpisodiosController@listarIndividual');
            $router->put('/{id}','EpisodiosController@atualizar');
            $router->delete('/{id}','EpisodiosController@apagar');
        });

    });
