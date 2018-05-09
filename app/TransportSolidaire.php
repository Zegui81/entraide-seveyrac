<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportSolidaire extends Model
{
    public const JOURS = ['À la demande', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    
    protected $table = 'transport_solidaire';
    
    protected $fillable = ['id', 'jour', 'heureDepart', 'heureRetour', 'commentaire', 'user_id'];
    
    public $timestamps = false;
    
    public function transportToArray() {
        $organisateur = User::where('id', $this->user_id)->first();
        return array(
            'id' => $this->id,
            'numJour' => $this->jour,
            'jour' => TransportSolidaire::JOURS[$this->jour],
            'heureDepart' => $this->heureDepart == null ? '' : date('H\:i', strtotime($this->heureDepart)),
            'heureRetour' => $this->heureRetour == null ? '' : date('H\:i', strtotime($this->heureRetour)),
            'commentaire' => $this->commentaire,
            'organisateur' => $organisateur->userToArray()
        );
    }
}
