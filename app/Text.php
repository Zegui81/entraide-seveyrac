<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $table = 'text';
    
    protected $fillable = ['id', 'code', 'content'];
    
    public $timestamps = false;
    
    public function textToArray() {
        return array(
            'id' => $this->id,
            'code' => $this->code,
            'content' => $this->content
        );
    }}
