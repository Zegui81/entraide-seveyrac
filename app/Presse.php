<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presse extends Model
{
    protected $table = 'presse';
    
    protected $fillable = ['id', 'titre', 'datePubli', 'description'];
    
    public $timestamps = false;
    
    public function presseToArray() {
        return array(
            'id' => $this->id,
            'titre' => $this->titre,
            'datePubli' => date('d/m/Y', strtotime($this->datePubli)),
            'description' => $this->description
        );
    }
}
