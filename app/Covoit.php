<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covoit extends Model
{
    protected $table = 'covoit';
    
    protected $fillable = ['id', 'origine', 'destination', 'commentaire', 'depart', 'nbPlace', 'user_id'];
    
    public $timestamps = false;
    
    public function covoitToArray() {
        $organisateur = User::where('id', $this->user_id)->first();
        return array(
            'id' => $this->id,
            'origine' => $this->origine,
            'destination' => $this->destination,
            'depart' => date('d/m/Y \à H\hi', strtotime($this->depart)),
            'nbPlace' => $this->nbPlace,
            'commentaire' => $this->commentaire,
            'organisateur' => $organisateur->userToArray()
        );
    }
    
    public function covoitToArrayForCalendar() {
        return array(
            'title' => $this->origine.' > '.$this->destination,
            'start' => date('Y-m-d\TH\:i', strtotime($this->depart)),
            'url' => url('covoit/search/'.date('Y-m-d', strtotime($this->depart))),
        );
    }
    
    public function covoitToArrayForAdmin() {
        $organisateur = User::where('id', $this->user_id)->first();
        return array(
            'id' => $this->id,
            'origine' => $this->origine,
            'destination' => $this->destination,
            'nbPlace' => $this->nbPlace,
            'jourDepart' => date('Y-m-d', strtotime($this->depart)),
            'heureDepart' => date('H\:i', strtotime($this->depart)),
            'commentaire' => $this->commentaire,
            'url' => url('covoit/detail/'.$this->id),
            'organisateur' => $this->user_id
        );
    }
}
