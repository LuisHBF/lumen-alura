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
    
    public function atualizar(Request $request, $id){
        $serie = Serie::find($id);
        if(is_null($serie))
            return response()->json(['erro' => 'Serie nao encontrada!'],404);
        
        $serie->fill($request->all());
        $serie->save();
        return $serie;
    }
    
    public function apagar($id){
       return Serie::destroy($id) == 0 ? response()->json(['erro' => 'Serie nao encontrada!'],404)
       : response()->json('',204);
    }
}