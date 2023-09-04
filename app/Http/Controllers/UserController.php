<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function authentification(Request $request){
        $user= Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'email_verified'=>true
        
        ]);
            if($user){
                return redirect()->route('index');
            }
            return redirect()->back()->with('error', 'Combinaison email/password fausse!');
    }

     /**
      * Summary of logout
      * @return \Illuminate\Http\RedirectResponse|mixed
      */
    function logout(){
        Auth::logout();
        return redirect()->route('login');
     } 
    public function forgotPassword(){
        return view('forgotPassword');
    }

    public function changePassword(){
        return view('changePassword');
    }

    public function store(Request $request){

        $data=$request->all();

        $request->validate([
            'nom'=>"required|min:2",
            'prenom'=>"required|min:2",
            'email'=>array(
            'required',
            'unique:users',
            'regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/'
            ),

            'password'=> array(
                'required',
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/',
            'confirmed:password_confirmation'
        )
    ]);

           $save = User::create([
            "lastname"=>$data['nom'],
            "firstname"=>$data['prenom'],
            "email"=>$data['email'],
            "password"=>Hash::make($data['password']),

            ]);

        $url=URL::temporarySignedRoute(
            'verifyEmail',now()->addMinutes(30),['email'=> $data['email']]
        );
        
        Mail::send('mail',['url'=>$url, 'name'=>$data['nom']], function($message)  use ($data) {
            $config = config('mail');
            $name = $data ['nom'].''.$data ['prenom'];
        $message->subject("Registration verification !")
        ->from($config['from']['address'],"Ecole229")
        ->to($data['email'], $name);

        return redirect()->back()->with("success", "Veuillez consulter votre mail pour activer votre compte d'utilisateur");
        });
     
   
        //->with('message')
  
    }
    public function verify(Request $request, $email){
        $user = User::where("email", $email)->first();
        if (!$user){
            abort(404);
        }
        if (!$request->hasValidSignature()){
            abort(404);
        }
        $user->update([
            "email_verified_at" => now() ,
            "email_verified" => true,

        ]);
        return redirect() -> route("login") -> with ("success" , "compte activé avec succès !");
    }
  

    public function storePwd(Request $request){
        $data= $request->all();
       
        $request->validate([
            'email'=>array(
            'required',
            'regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/'
            ),
    ]);

    $user = User::where("email", $data['email'])->first();
   

    if(User::where("email", $data['email'])->exists()){
        $url=URL::temporarySignedRoute(
            'verifyPwd',now()->addMinutes(30),['email'=> $data['email']]
        );
        
        Mail::send('forgotmail',['url'=>$url, 'name'=>$user['firstname']], function($message)  use ($user) {
            $config = config('mail');
            $name = $user ['firstname'].''.$user ['lastname'];
        $message->subject("Changement de mot de passe !")
        ->from($config['from']['address'],"Ecole")
        ->to($user['email'], $name);
    
        });
 
return redirect()->back()->with("success", "Veuillez consulter votre mail pour activer votre compte d'utilisateur");
    //->with('message')
}
 
}

public function verifyPwd(Request $request){
    if (!$request->hasValidSignature()){
        abort(404);
    }
   $email=$request->email;
    return view("changePassword", compact("email")) ;
}

public function updatePwd(Request $request, $email){
    $data=$request->all();
   $validation=  $request->validate([
            'password'=> array(
            'required',
            'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/',
            'confirmed:password_confirmation'
        )]);

    $user = User::where("email", $email);
    $user->update([
        'password'=>Hash::make($validation['password'])]);

return redirect()->route('login');
}
}
