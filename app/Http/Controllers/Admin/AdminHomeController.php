<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Carousel;
use App\Http\Requests\CarouselRequest;
use App\Text;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function carousel()
    {
        $photos = Carousel::all();
        
        $liste = array();
        foreach ($photos as $photo) {
            array_push($liste, $photo->carouselToArray());
        }
        return view('admin.home.carousel')
                ->withListPhoto($liste)
                ->withEdit(false);
        
    }
    
    public function addPicture(CarouselRequest $request)
    {
        $photo = new Carousel();
        $photo->titre = $request->titre;
        $photo->description = $request->description;
        $photo->ext = $request->photo->extension();
        $photo->save();
        
        // Enregistrement de l'image
        $destinationPath = public_path('img\carousel');
        $request->photo->move($destinationPath, 
            $photo->id.'.'.$request->photo->extension());
        
        return redirect()->back()->with('success', true);
    }
    
    protected function createPhotoCarousel(array $data)
    {
        return Carousel::create([
            'titre' => $data['titre'],
            'description' => $data['description'],
            'prenom' => $data['prenom'],
            'telFixe' => $data['telFixe'],
            'telPortable' => $data['telPortable']
        ]);
    }
    
    public function removePicture($id)
    {
        $photo = Carousel::where('id', $id)->first();
        unlink(public_path('img\carousel').'\\'.$id.'.'.$photo->ext);
        Carousel::destroy($id);
        return redirect()->back();
    }
    
    public function text()
    {
        // Texte à gauche
        $texteGauche = Text::where('code', 'HOME_TEXT_GAUCHE')->first();
        if ($texteGauche == null) {
            // Création du texte si inexistant
            $texteGauche = new Text();
            $texteGauche->code = 'HOME_TEXT_GAUCHE';
            $texteGauche->save();
        }
        
        // Texte en bas
        $texteBas = Text::where('code', 'HOME_TEXT_BAS')->first();
        if ($texteBas == null) {
            // Création du texte si inexistant
            $texteBas = new Text();
            $texteBas->code = 'HOME_TEXT_BAS';
            $texteBas->save();
        }
        
        return view('admin.home.text')
            ->withTextGauche($texteGauche->content)
            ->withTextBas($texteBas->content);
    }
    
    public function updateAccueil(Request $request) {
        $texteGauche = Text::where('code', 'HOME_TEXT_GAUCHE')->first();
        $texteGauche->content = $request->textGauche;
        $texteGauche->save();
        
        $texteBas = Text::where('code', 'HOME_TEXT_BAS')->first();
        $texteBas->content = $request->textBas;
        $texteBas->save();
        
        if ($request->photo != null) {
            $destinationPath = public_path('img');
            $request->photo->move($destinationPath, 'home.jpg');
        }
        return redirect('/');
    }
}
