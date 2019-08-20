<?php
namespace App\Http\Controllers;
use \App\Serie;

class SeriesController{
    
    public function listar(){
        return Serie::all();
    }
    
}
