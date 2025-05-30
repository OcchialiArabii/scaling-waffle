<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Auth;
use Illuminate\Routing\Redirector;

class AuthController extends Controller
{
    protected function register()
    {
       
        foreach (Auth::all() as $data) {
            if($data['Email']==$_POST['email']){
               return redirect()->route('login',['message'=>'Email is already taken.']);   
            }}

        $model = new Auth ([
        'Email' => $_POST['email'],
        'UserName' => $_POST['login'],
        // Login == Username
        'Hpasswd' => Hash::make($_POST['passwd']),   
        ]);
  
        
            $model->save();
            return redirect()->route('login',['message'=>'Sucesssful registration. You can login now.']);  
    
        }

    protected function login()
    {
        $data = Auth::all();
        foreach($data as $value)
        {
            if(($value['UserName']==$_POST['login'])&&Hash::check($_POST['passwd'],$value['Hpasswd'])) 
            {
                session(['name'=> $value['UserName']]);
                session(['id'=> $value['id']]);
                return redirect()->route('home');
            }
            
        }
        return redirect()->route('login',['message'=>"Invalid username or password"]);
    }

    protected function logout()
    {
        session_abort();
        return redirect()->route('login');
    }

}
