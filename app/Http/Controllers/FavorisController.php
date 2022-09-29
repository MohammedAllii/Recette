<?php

namespace App\Http\Controllers;
use App\Favoris;
use Session;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FavorisController extends Controller
{
    public function addfavoris(Request $request){
        try{
        $fav = Favoris::where('id_user','=',$request->id_user)->where('id_recette','=',$request->id_recette)->first();
        if(!$fav){
            $favoris = new Favoris();
            $favoris->id_user=$request->id_user;
            $favoris->id_recette=$request->id_recette;
            $res=$favoris->save();
        }else{
            return back()->with('fail',"Déja existe");

        }
    }catch(Execption $e){
            return back()->with('fail',"Déja existe");
        }
        return back()->with('success',"Ajouté");

    }
          //redirection vers page favoris
          public function favoris($id){
            $data=array();
            if(Session::has('loginId')){
                $data=User::where('id','=',Session::get('loginId'))->first();
            }
            $recette = DB::table('recettes')
            ->join('favoris','favoris.id_recette','recettes.id')
            ->join('users','users.id','favoris.id_user')
            ->where('users.id',$id)
            ->get();
            return view("favoris",compact('recette','data'));
          }
          //supprimer favoris
            public function supprimerFav($id_user,$id_recette){
                $favoris = Favoris::where('id_user','=',$id_user)->where('id_recette','=',$id_recette)->delete();
                return back()->with('success',"Suppression avec success");
            }
}
