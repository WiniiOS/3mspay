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

        //on check si le user existe et on le redirige
        $cni_pass = $request->cni_pass;
        $sha1password = sha1($request->password);
        
        // dd($cni_pass);
        
        // recupere les données du user
        // $user = $this->get_cnipass($cni_pass);

        // if (count($user) > 0) {
        //     if ($user->password == $sha1password) {
        //         // on crée une variable de session & on connecte l'utilisateur
        //         return redirect('/Form');
        //     }
        // }else{
        //     return redirect('/');
        // }

        return redirect('/Form');

    }

    // Fonction qui récupère un user spécifique
    public function get_cnipass($cni_pass)
    {
        $user = User::where('cni','=',$cni_pass)->firstOrFail();
        // die and dub
        dd($post);

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
    public function update($id){

        $user = User::find($id);
        
        $user->update([
            'id' => $id,
            'telephone' => 658682586
        ]);
        return 'Utilisateur édité avec succès';

    }

    // Fonction qui met à jour les données d'un user
    public function update_user_at_fisrt_payment($id,$telephone,$type_user){

        $user = User::find($id);
        // $user = User::where('id', $id )->get();
        
        $user->update([
            'telephone' => $telephone,
            'type_user' => $type_user
        ]);

        // $user->toQuery()->update([
        //     'telephone' => $telephone,
        //     'type_user' => $type_user
        // ]);

        dd('Utilisateur édité avec succès');

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
            'password' => sha1($request->password),
            'cni' => $request->cni,
            'passeport' => $request->passeport
        ]);

        // $message = 'Sign up created succesfully';
        $result = true;

        if ($result) {
            return redirect('/');
        }

    }

    // Fonction qui supprime un user
    public function delete($id){

        $user = User::find($id);
        $user->delete();
        return 'User deleted succesfully';

    }

}
