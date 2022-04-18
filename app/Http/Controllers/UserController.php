<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(){
        return view('login');
    }
    
    public function register(){
        return view('register');
    }

    public function singin(Request $request){

        dd('Login succesfully');

    }

    // Fonction qui récupère un user spécifique
    public function get_one($id)
    {
        $user = User::findOrFail($id);

        return view('users',[
            'user' => $user
        ]);

    }

    // fonction pour récupèrer tous les users
    public function get_all_users()
    {
        // On recupere tous les users en base de donnée
        $users = User::all();

        return view('users',[
            'users' => $users
        ]);

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
    public function update($id){

        $user = User::find($id);
        
        $user->update([
            'id' => $id,
            'telephone' => 658682586
        ]);
        return 'Utilisateur édité avec succès';

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
        //on crée un enregistrement de notre User en BD

        // dd($request);

        User::create([
            'password' => $request->password,
            'cni' => $request->Regis_login,
            'passeport' => $request->Regis_login
        ]);

        return 'Sign up created succesfully';

    }

    // Fonction qui supprime un user
    public function delete($id){

        $user = User::find($id);
        $user->delete();
        return 'User deleted succesfully';

    }


}
