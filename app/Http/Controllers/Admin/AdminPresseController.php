<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Presse;
use App\Http\Requests\PresseRequest;

class AdminPresseController extends Controller
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
    
    public function articles() {
        $articles = Presse::all();
        
        $liste = array();
        foreach ($articles as $article) {
            array_push($liste, $article->presseToArray());
        }
        
        return view('admin.content.presse.articles')
            ->withArticles($liste);
    }
    
    public function publish(PresseRequest $request)
    {
        $article = new Presse();
        $this->validatePresse($request, $article);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'L\'article a été publié.'
        );
        
        return redirect('admin/news')->with('message', $message);
    }
    
    public function deleteArticle($id)
    {
        Presse::destroy($id);
        if (file_exists(public_path('img\presse').'\\'.$id.'.jpg')) {
            unlink(public_path('img\presse').'\\'.$id.'.jpg');
        }
        
        // Message de validation
        $message = array(
            'type' => 'warning',
            'icon' => 'trash',
            'content' => 'L\'article a été supprimé.'
        );
        return redirect('admin/news')->with('message', $message);
    }
    
    private function validatePresse(PresseRequest $request, Presse $presse)
    {
        $presse->titre = $request->titre;
        $presse->datePubli = new \DateTime($request->datePubli);
        $presse->description = $request->description;
        $presse->save();
        
        // Import de la photo
        if ($request->photo != null) {
            $destinationPath = public_path('img/presse');
            $request->photo->move($destinationPath, $presse->id.'.jpg');
        }
    }
}
