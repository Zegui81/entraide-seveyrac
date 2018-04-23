<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    protected $table = 'users';
    
    protected $fillable = ['id', 'email', 'password', 'nom', 'prenom', 'telFixe', 'telPortable', 'actif', 'remember_token'];
    
    protected $hidden = ['password', 'remember_token'];
    
    public $timestamps = false;
    
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
    
}
