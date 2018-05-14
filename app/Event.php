<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    
    protected $fillable = ['id', 'titre', 'commentaire', 'debut', 'fin', 'urlAlbum', 'user_id', 'journee'];
    
    public $timestamps = false;
    
    public function eventToArray() {
        $organisateur = User::where('id', $this->user_id)->first();
        $user = null;
        if ($organisateur != null) {
            $user = $organisateur->userToArray();
        }
        
        if ($this->journee) {
            $debut = date('d/m/Y', strtotime($this->debut));
            $fin = date('d/m/Y', strtotime($this->fin));
        } else {
            $debut = date('d/m/Y \à H\hi', strtotime($this->debut));
            $fin = date('d/m/Y \à H\hi', strtotime($this->fin));
        }
        return array(
            'id' => $this->id,
            'titre' => $this->titre,
            'debut' => $debut,
            'fin' => $fin,
            'journee' => $this->journee,
            'commentaire' => empty($this->commentaire) ? '<i>Pas de description...</i>' : $this->commentaire,
            'url' => url('event/detail/'.$this->id),
            'organisateur' => $user
        );
    }
    
    public function eventToArrayForCalendar() {
        $organisateur = User::where('id', $this->user_id)->first();
        if ($this->journee) {
            $debut = date('Y-m-d', strtotime($this->debut));
            $fin = date('Y-m-d', strtotime($this->fin));
        } else {
            $debut = date('Y-m-d\TH\:i', strtotime($this->debut));
            $fin = date('Y-m-d\TH\:i', strtotime($this->fin));
        }
        return array(
            'title' => $this->titre,
            'start' => $debut,
            'end' => $fin,
            'url' => url('event/detail/'.$this->id),
        );
    }
    
    public function eventToArrayForAdmin() {
        $organisateur = User::where('id', $this->user_id)->first();
        $user = null;
        if ($organisateur != null) {
            $user = $organisateur->userToArray();
        }
        return array(
            'id' => $this->id,
            'titre' => $this->titre,
            'jourDebut' => date('Y-m-d', strtotime($this->debut)),
            'jourFin' => date('Y-m-d', strtotime($this->fin)),
            'journee' => $this->journee,
            'heureDebut' => date('H\:i', strtotime($this->debut)),
            'heureFin' => date('H\:i', strtotime($this->fin)),
            'commentaire' => $this->commentaire,
            'url' => url('event/detail/'.$this->id),
            'organisateur' => $user
        );
    }
}
