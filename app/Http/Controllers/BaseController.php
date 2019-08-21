<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

abstract class BaseController{
    
    protected $classe;
    
    public function listarTodos(Request $request){
        return $this->classe::paginate($request->perPage);
    }
    
    public function cadastrar(Request $request){
        return response()
        ->json($this->classe::create($request->all()), 201);
    }
    
    public function listarIndividual($id){
        $recurso = $this->classe::find($id);
        return is_null($recurso) ? response()->json('',404) : response()->json($recurso, 200);
    }
    
    public function atualizar(Request $request, $id){
        $recurso = $this->classe::find($id);
        if(is_null($recurso))
            return response()->json(['erro' => $this->classe.' nao encontrada!'],404);
            
            $recurso->fill($request->all());
            $recurso->save();
            return $recurso;
    }
    
    public function apagar($id){
        return $this->classe::destroy($id) == 0 ? response()->json(['erro' => $this->classe.' nao encontrada!'],404)
        : response()->json('',204);
    }
}