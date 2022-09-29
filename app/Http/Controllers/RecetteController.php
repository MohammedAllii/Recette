<?php

namespace App\Http\Controllers;
use Hash;
use Session;
use App\User;
use App\Recette;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecetteController extends Controller
{
    //redirection vers la page d'ajout d'une recette
    public function addrecette(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view('addrecette',compact('data'));
    }
    //redirection vers la page détails d'une recette
    public function details(Request $request){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $recette=Recette::where('id','=',$request->id)->first();
        return view('details',compact('data','recette'));
    }
    //redirection vers la page edit d'une recette
    public function edit(Request $request){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $recette=Recette::where('id','=',$request->id)->first();
        return view('edit',compact('data','recette'));
    }
    //l'ajout d'une recette
    public function ajoutrecette(Request $request){
        $request->validate([
            'name_recette' =>'required',
            'difficulté' =>'required',
            'preparation' =>'required',
            'cuisson'=>'required|min:1|max:99',
            'ingrédiant' =>'required|min:1|max:99',
            'description' =>'required',
            'categorie' => 'required'
        ]);
        $recette = new Recette();
        $recette->name_recette=$request->name_recette;
        $recette->difficulté=$request->difficulté;
        $recette->preparation=$request->preparation;
        $recette->cuisson=$request->cuisson;
        $recette->ingrédiant=$request->ingrédiant;
        $recette->description=$request->description;
        $recette->categorie=$request->categorie;
        $recette->id_user=$request->id_user;
        if($request->hasfile('photo_recette')){
            $file=$request->file('photo_recette');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/',$filename);
            $recette->photo_recette=$filename;
        }
        $res=$recette->save();
        if($res){
             return back()->with('success',"Ajout avec success");
        }else{
         return back()->with('fail',"Erreur d'ajout");
        }
     }

    //recherche d'une recette
    public function search(Request $request){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $name = $request->recette_name;
        $recette = Recette::where('name_recette','LIKE',"%$name%")->get();
        return view("recherche",compact('recette','data'));
    }
    //redirection vers la page mes recette
    public function myrecette(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $recette = Recette::where('id_user','=',$data->id)->get();
        return view("myrecette",compact('recette','data'));
    }
    //fonction de modification
    public function modifier(Request $request){
        $request->validate([
            'name_recette' =>'required',
            'difficulté' =>'required',
            'preparation' =>'required',
            'cuisson'=>'required|min:1|max:99',
            'ingrédiant' =>'required|min:1|max:99',
            'description' =>'required',
            'categorie' => 'required'
        ]);
        $recette = Recette::find($request->id);
        $recette->name_recette=$request->name_recette;
        $recette->difficulté=$request->difficulté;
        $recette->preparation=$request->preparation;
        $recette->cuisson=$request->cuisson;
        $recette->ingrédiant=$request->ingrédiant;
        $recette->description=$request->description;
        $recette->categorie=$request->categorie;
       if($request->hasfile('photo_recette')){
           $destination='images/'.$recette->photo_recette;
           $file=$request->file('photo_recette');
           $extension=$file->getClientOriginalExtension();
           $filename=time().'.'.$extension;
           $file->move('images/',$filename);
           $recette->photo_recette=$filename;
       }
       $recette->update();
        
       return back()->with('success',"Modification avec success");
    }
    //supprimer recette
    public function supprimer($id){
        $recette=Recette::find($id);
        $recette->delete();
        return back()->with('success',"Suppression avec success");
      }
//tous les recettes dashboard admin
      public function allrecettes(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $recette=Recette::all();
        return view('admin.allrecettes',compact('data','recette'));
    }
    //Ajout recette admin
    public function addrecetteadmin(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view('admin.ajoutrecette',compact('data'));
    }
    //modifier recette admin
    public function editrecette($id){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $recette=Recette::where('id','=',$id)->first();
        return view('admin.editrecette',compact('data','recette'));
    }

}
