<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model{
    
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $perPage= 10;
    protected $appends = ['links'];
    
    
    public function episodios(){
        return $this->hasMany(Episodio::class);
    }
    
    public function getLinksAttribute($links){
        return [
            'self' => '/api/series/'.$this->id,
            'episodios' => '/api/series/'.$this->id.'/episodios'
        ];
    }
}