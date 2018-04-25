<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    
    protected $fillable = ['id', 'titre', 'commentaire', 'debut', 'fin', 'urlAlbum', 'user_id'];
    
    public $timestamps = false;
    
    public function eventToArray() {
        $organisateur = User::where('id', $this->user_id)->first();
        return array(
            'id' => $this->id,
            'titre' => $this->titre,
            'debut' => date('d/m/Y \à H\hi', strtotime($this->debut)),
            'end' => $this->fin,
            'commentaire' => empty($this->commentaire) ? '<i>Pas de description...</i>' : $this->commentaire,
            'url' => url('event/detail/'.$this->id),
            'organisateur' => $organisateur->userToArray()
        );
    }
}
