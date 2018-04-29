<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = 'carousel';
    
    protected $fillable = ['id', 'titre', 'description', 'ext'];
    
    public $timestamps = false;
    
    public function carouselToArray() {
        return array(
            'id' => $this->id,
            'titre' => $this->titre,
            'description' => $this->description,
            'ext' => $this->ext
        );
    }
}
