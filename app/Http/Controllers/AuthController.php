<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trajet;
use App\Recette;
use App\Reservation;
use Hash;
use Session;
use Carbon\Carbon;


class AuthController extends Controller
{   public function board(){
        return view('board');
}

    public function login(){
       return view("Auth.connexion");
    }
    public function registration(){
        return view("Auth.inscription");
    }
    public function logout(){
        if(Session::has('loginId')){
            Session()->forget('loginId');
            Session::flush();
            return redirect('cnx');
        }
     }
    public function inscription(Request $request){
       $request->validate([
           'nom' =>'required',
           'email' =>'required|email|unique:users',
           'password' =>'required|min:6|max:26'
       ]);
       $user = new User();
       $user->nom=$request->nom;
       $user->email=$request->email;
       $user->age=$request->age;
       $user->phone=$request->phone;
       $user->password=Hash::make($request->password);
       if($request->hasfile('photo')){
           $file=$request->file('photo');
           $extension=$file->getClientOriginalExtension();
           $filename=time().'.'.$extension;
           $file->move('images/',$filename);
           $user->photo=$filename;
       }
       $res=$user->save();
       if($res){
            return back()->with('success',"Inscription avec success");
       }else{
        return back()->with('fail',"email existe deja");
       }
    }
    //ajout admin
    public function addadmin(Request $request){
        $request->validate([
            'nom' =>'required',
            'email' =>'required|email|unique:users',
            'password' =>'required|min:6|max:26'
        ]);
        $user = new User();
        $user->nom=$request->nom;
        $user->email=$request->email;
        $user->age=$request->age;
        $user->phone=$request->phone;
        $user->role=$request->role;
        $user->password=Hash::make($request->password);
        if($request->hasfile('photo')){
            $file=$request->file('photo');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/',$filename);
            $user->photo=$filename;
        }
        $res=$user->save();
        if($res){
             return back()->with('success',"Inscription avec success");
        }else{
         return back()->with('fail',"email existe deja");
        }
     }
    public function connexion(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6|max:26'
        ]);
        $user=User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->Session()->put('loginId',$user->id);
                if($user->role == 0){
                return redirect('accueil');}
                else{
                    return redirect('allusers'); 
                }
            }else{
                return back()->with('fail','password incorrect!');
            }
        }else{
            return back()->with('fail','email invalid !');
        }
    }
    //accueill affichage recette
    public function accueil(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $date=array();
        $date = Carbon::now()->format('Y-m-d');
        $recettes=array();
        $recettes=Recette::where('created_at','=',$date)->first();
  
            return view("accueil",compact('recettes','data'));
    }
    //tous les utilisateurs et admins 
    public function allusers(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $user=User::all();
        return view('admin.allusers',compact('data','user'));
    }
    //ajout admin
    public function ajoutadmin(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view('admin.ajoutadmin',compact('data'));
    }
    //modifier user admin
    public function editusers($id){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $user=User::where('id','=',$id)->first();
        return view('admin.edituser',compact('data','user'));
    }
    //supprimer user admin
    public function supprimeruser($id){
        $user=User::find($id);
        $user->delete();
        return back()->with('success',"Suppression avec success");
      }
   
}
