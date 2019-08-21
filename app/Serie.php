<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model{
    
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $perPage= 10;
    
    public function episodios(){
        return $this->hasMany(Episodio::class);
    }
}