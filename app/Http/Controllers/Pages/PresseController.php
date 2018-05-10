<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Presse;

class PresseController extends Controller
{
    public function articles() {
        $articles = Presse::orderBy('datePubli', 'desc')->get();
        
        $liste = array();
        foreach ($articles as $article) {
            array_push($liste, $article->presseToArray());
        }
        
        return view('pages.presse.articles')
            ->withArticles($liste);
    }
}
