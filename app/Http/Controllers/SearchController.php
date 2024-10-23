<?php

namespace App\Http\Controllers;
use App\Models\Formation;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function afficher(){
        $formations=Formation::orderBy('idf')->get(array('idf'));
        return view('Search.search',compact('formations'));
    }
    public function Rechercher(Request $request)
    {
        $formations=Formation::orderBy('idf')->get(array('idf'));
        $item=Formation::where('idf','=',$request->idf)->first();
        $classes=$item->classes;
        $avis=$item->etudiants;
        return view('Search.search',compact('formations','item','classes','avis'));
    }


    public function search(){
        $formations=Formation::orderBy('idf')->get(array('idf'));
        return view('Search.recherche',compact('formations'));
    }

    public function chercher(string $id){
        $data=Formation::with('classes.etudiants')->where('idf',$id)->get();
        return response()->json($data);

    }
}
