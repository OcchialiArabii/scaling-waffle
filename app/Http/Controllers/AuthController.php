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


        $model = new Auth ([
        'Email' => $_POST['email'],
        'UserName' => $_POST['login'],
        // Login == Username
        'Hpasswd' => Hash::make($_POST['passwd']),   
        ]);
        
        $model->save();
        return redirect()->route('login',['message'=>1]);

    }

    protected function login()
    {
        $data = Auth::all();
        foreach($data as $value)
        {
            if(($value['UserName']==$_POST['login'])&&Hash::check($_POST['passwd'],$value['Hpasswd'])) 
            {
                $_SESSION['id']=$value['id'];
                return view('succes',$_SESSION);
            }
            
        }
        return redirect()->route('login',['message'=>2]);
    }

}
