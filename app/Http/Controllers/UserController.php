<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function index(){
        return view('login');
    }
    
    public function register(){
        return view('register');
    }

    public function singin(Request $request){

        $request->validate([
            'cni_pass' => ['required','alpha_num','min:8'],
            'password' => ['required','min:8','max:255',]
        ]);

        //on check si le user existe et on le redirige
        $cni_pass = $request->cni_pass;
        $sha1password = sha1($request->password);

        // recupere les data du user
        $user = $this->get_cnipass($cni_pass);
        
        // die and dub
        // dd($user);

        if ($user == null) {
            return redirect('/')->withErrors(['Ce patient n\'existe pas dans notre Cloud!'])->withInput();
        }else{
            if ($user->password == $sha1password) {

                // on crée une variable de session & on connecte l'utilisateur
                // Session::set('user_id') = $value ;
                return redirect('/Form');

            }else{
                return redirect('/')->withErrors(['Le mot de passe ou la CNI/Passeport sont incorrects !'])->withInput();
            }
        }

    }

    // Fonction qui récupère un user spécifique
    public function get_cnipass($cni_pass)
    {
        $user = DB::table('users')->where('cni',$cni_pass)->orWhere('passeport',$cni_pass)->first();
        return $user;
    }

    // fonction pour récupèrer tous les users
    public function all_users()
    {
        // On recupere tous les users en base de donnée
        $users = User::all();

        return view('users',[
            'users' => $users
        ]);

    }

    // Fonction qui récupère un user spécifique
    public function one($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    // Fonction qui récupère 10 users
    public function get_some_users()
    {
        $users = User::orderBy('firstname')->take(10)->get();

        return view('users',[
            'users' => $users
        ]);
        
    }

    // Fonction qui met à jour les données d'un user
    public function update($id,Request $request){

        $user = User::find($id);
        
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'birth_day' => $request->birth_day,
            'birthplace' => $request->birthplace,
            'nationality' => $request->nationality,
            'password' => $request->password,
            'type_user' => $request->type_user,
            'telephone' => $request->telephone,
            'cni' => $request->cni,
            'passeport' => $request->passeport
        ]);

        return back()->with('message', 'Utilisateur édité avec succès');

    }

    // Fonction qui met à jour les données d'un user
    public function update_user_at_fisrt_payment( $id , Request $request){

        $id = Session::get('user_id');

        $user = User::find($id);
        
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'birth_day' => $request->birth_day,
            'birthplace' => $request->birthplace,
            'nationality' => $request->nationality,
            'telephone' => $request->telephone,
            'email' => $request->email
        ]);

        return back()->with('message', 'Utilisateur édité avec succès');        
    }

    // Fonction qui crée un user en base de données
    public function store(Request $request)
    {
        //on crée un enregistrement de notre User en BD
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'birth_day' => $request->birth_day,
            'birthplace' => $request->birthplace,
            'nationality' => $request->nationality,
            'password' => $request->password,
            'type_user' => $request->type_user,
            'telephone' => $request->telephone,
            'cni' => $request->cni,
            'passeport' => $request->passeport
        ]);

        return 'User created succesfully';

    }

    // Fonction qui crée un user en base de données
    public function sign_up(Request $request)
    {

        $pass1 = $request->password;
        $pass2 = $request->confirm_password;

        if ($pass1 != $pass2) {
            return redirect('/Register')->withErrors(['Les mots de passe ne correspondent pas!'])->withInput();
        }else{
            $request->validate([
                'password' => ['required','min:8','max:255',],
                'confirm_password' => ['required','min:8','max:255',],
                'cni' => ['unique:users','nullable','alpha_num','min:9','max:20'],
                'passeport' => ['unique:users','nullable','alpha_num']
            ]);
        }

        //on crée un enregistrement de notre User en BD
        User::create([
            'password' => sha1($request->password),
            'cni' => $request->cni,
            'passeport' => $request->passeport
        ]);

        return redirect('/');
    }

    // Fonction qui supprime un user
    public function delete($id){

        $user = User::find($id);
        $user->delete();
        return 'User deleted succesfully';

    }

}
