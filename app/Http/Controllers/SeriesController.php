<?php
namespace App\Http\Controllers;
use \App\Serie;
use Illuminate\Http\Request;

class SeriesController{
    
    public function listar(){
        return Serie::all();
    }
    
    public function cadastrar(Request $request){
        return response()
        ->json(Serie::create(['nome' => $request->nome]), 201);        
    }
    
    public function listarIndividual($id){
        $serie = Serie::find($id);
        return is_null($serie) ? response()->json('',404) : response()->json($serie, 200);
    }
}