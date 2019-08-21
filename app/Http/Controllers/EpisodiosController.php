<?php
namespace App\Http\Controllers;

use App\Episodio;

class EpisodiosController extends BaseController{
    
    public function __construct() {
        $this->classe = Episodio::class;
    }
    
    public function buscaPorSerie($id){
        return Episodio::query()->where('serie_id','=',$id)->paginate();
    }
}