<?php

namespace App\Http\Controllers;
use Session;
use App\User;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    public function profile(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view('profile',compact('data'));
    }
    public function update(Request $request){
        $user = User::find($request->id);
        $user->nom=$request->nom;
       $user->email=$request->email;
       $user->age=$request->age;
       $user->phone=$request->phone;
       $user->password=Hash::make($request->password);
       if($request->hasfile('photo')){
           $destination='images/'.$user->photo;
           if(File::exists($destination)){
               File::delete($destination);
           }
        
           $file=$request->file('photo');
           $extension=$file->getClientOriginalExtension();
           $filename=time().'.'.$extension;
           $file->move('images/',$filename);
           $user->photo=$filename;
       }
       $user->update();
        
 return Redirect::back()->with('success','mise a jour avec success');
    }
}
