<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model{
     
    public $timestamps = false;
    protected $perPage = 20;
    protected $fillable = ['temporada','numero','assistido','serie_id'];
    protected $appends = ['links'];
    
    public function serie(){
        return $this->belongsTo(Serie::class);
    }
    
    public function getAssistidoAttribute($assistido){
        return (bool) $assistido;
    }
    
    public function getLinksAttribute($links){
        return [
            'self' => '/api/episodios/' . $this->id,
            'serie' => '/api/serie/' . $this->serie_id
        ];
    }
    
 
}