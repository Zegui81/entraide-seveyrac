<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    protected $table = 'users';
    
    protected $fillable = ['id', 'email', 'password', 'nom', 'prenom', 'telFixe', 'telPortable', 'actif', 'remember_token', 'created_at', 'updated_at'];
    
    protected $hidden = ['password', 'remember_token'];
    
    public $timestamps = true;
    
    public function getAuthIdentifier()
    {
        return $this->email;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public function userToArray() 
    {
        return array(
            'id' => $this->id,
            'email' => $this->email,
            'nom' =>  $this->nom,
            'prenom' => $this->prenom,
            'telFixe' =>  isset($this->telFixe) ? chunk_split($this->telFixe, 2, ' ') : null,
            'telPortable' => isset($this->telPortable) ? chunk_split($this->telPortable, 2, ' ') : null,
            'created_at' => date('d/m/Y \à H\hi', strtotime($this->created_at))
        );
    }
}
