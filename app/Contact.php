<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    
    protected $fillable = ['id', 'email', 'nom', 'prenom', 'message', 'created_at', 'updated_at'];
    
    public $timestamps = true;
    
    public function contactToArray()
    {
        return array(
            'id' => $this->id,
            'email' => $this->email,
            'nom' =>  $this->nom,
            'prenom' => $this->prenom,
            'message' => $this->message,
            'created_at' => date('d/m/Y \à H\:i', strtotime($this->created_at))
        );
    }
}
