<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\TicketController;

class UserController extends Controller
{
    
    public function index(){
        return view('login');
    }

    public function show_hidden($reference,Request $request)
    {
        // dd($reference);

        $ticket = DB::table('tickets')->where('reference',$reference)->first();
        
        // dd($ticket);

        $user = $request->session()->get('user');

        // dd($user);

        // dd($ticket);

        return view('ticket',[
            'ticket' => $ticket,
            'user' => $user
        ]);

    }
    
    public function register(){
        return view('register');
    }

    public function form(Request $request){


        // Si le user est authentifié il peut accéder à la route
        if ($request->session()->has('user')) {
            return view('form',[
                'user' => $request->session()->get('user')
            ]);
        }else{
            return redirect('/')->withErrors(["Veuillez vous authentifier avant de payer un ticket"])->withInput();
        }
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

                // on enregistre sa variable de session
                $request->session()->put('user', $user);
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
    public function update_user(Request $request){

        // dd($request->om ,$request->momo) ;
        // if ($request->momo != null) {
        //     // on enregistre sa variable de session
        //     $request->session()->put('operator', $request->momo);
        // }elseif ($request->om) {
        //     // on enregistre sa variable de session
        //     $request->session()->put('user', $request->om);
        // }
        
        $date =  date("Y-m-d H:i:s"); 

        // validation formulaire
        $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'birth_day' => ['date','nullable'],
            'birthplace' => ['required','max:200'],
            'nationality' => ['required','max:200','nullable'],
            'telephone' => ['required','numeric'],
            'email' => ['email','nullable'],
        ]);

        $user_session = $request->session()->get('user');
        $id = $user_session->id;

        $cloud_user = User::find($id);
        
        // update with eloquent
        $cloud_user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'birth_day' => $request->birth_day,
            'birthplace' => $request->birthplace,
            'nationality' => $request->nationality,
            'telephone' => $request->telephone,
            'email' => $request->email
        ]);
        
        // On génère le ticket
        $reference = '3MS'.strtoupper(uniqid()).$request->session()->get('user')->id;
        $userId      = $request->session()->get('user')->id;

        //on crée un enregistrement de notre Ticket en BD
        DB::table('tickets')->insert([
            'reference' => $reference,
            'user_id' => $userId,
            'status' => 'unused',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        // fin generation

        // dd('update et generation du user ticket effectué');
        $route = '/Ticket/'.$reference;
        return redirect($route);

    }

    function generateRefcodeNumber(Request $request) {

        $reference = '3MS'.strtoupper(uniqid()).$request->session()->get('user')->id;
        return $reference;
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

    public function logout(Request $request)
    {
        $request->session()->forget('user'); 

        return redirect('/');
    }

    public function token()
    {        
        $url = 'https://twsv03.adwapay.cm/getADPToken';

        $app_code = 'AP3HFKUAVBXXCYRYZ';

        $username = 'BLOO1';

        $password = 'BL3HFKUAVBXXO1';

        $response = Http::withBasicAuth($username, $password)->post($url, [
            'application' => $app_code
        ]);

        $data = $response->json();

        return $data['data']['tokenCode'];
    }
    

    public function pay(Request $request)
    {        
        $url = 'https://twsv03.adwapay.cm/requestToPay';

        $token = $this->token();

        $subscription_key = 'BL3HFKUAVBXXO1';

        $operator = "ORANGE-MONEY";

        $number = $request->session()->get('user')->telephone;

        $order_ref = '3MS'.strtoupper(uniqid());

        $amount = 30000;

        $feesAmount = '70';

        $response = Http::withHeaders([
            'AUTH-API-TOKEN' => $token,
            'AUTH-API-SUBSCRIPTION' => $subscription_key
        ])->post($url, [
            "meanCode" => $operator,
            "paymentNumber" => $number, 
            "orderNumber" => $order_ref,
            "amount" => $amount,
            "currency" => "XAF",
            "feesAmount" => $feesAmount
        ]);

        $data = $response->json()['data'];

        dd($data);
        // return $data;
    }

    // Déclencher le SSD sur le terminal du patient pour payer
    public function push_dialog($token,$adpFootprint,$operator)
    {
        $url = 'https://twsv03.adwapay.cm/pushDialog';

        $subscription_key = 'BL3HFKUAVBXXO1';

        $response = Http::withHeaders([
            'AUTH-API-TOKEN' => $token,
            'AUTH-API-SUBSCRIPTION' => $subscription_key
        ])->post($url, [
            "adpFootprint" => $adpFootprint,
            "meanCode"  => $operator
        ]);

        return $response->json();
    }

    // On récupère le footprint renvoyé par la requete pay ainsi que l'opérateur 
    // choisi par l'utilisateur
    public function payment_status($token,$operator,$adpFootprint)
    {
        $url = 'https://twsv03.adwapay.cm/paymentStatus';

        $subscription_key = 'BL3HFKUAVBXXO1';

        $response = Http::withHeaders([
            'AUTH-API-TOKEN' => $token,
            'AUTH-API-SUBSCRIPTION' => $subscription_key
        ])->post($url, [
            "meanCode" => $operator,
            "adpFootprint" => $adpFootprint
        ]);

        return $response->json();
    }

    // Récuperer les frais liées à la transaction
    public function get_fees()
    {
        $url = 'https://twsv03.adwapay.cm/getFees';

        $token = $this->token();

        $subscription_key = 'BL3HFKUAVBXXO1';

        $amount = 30000;

        $response = Http::withHeaders([
            'AUTH-API-TOKEN' => $token,
            'AUTH-API-SUBSCRIPTION' => $subscription_key
        ])->post($url, [
            "amount" => $amount,
            "currency" => "XAF",
            "transactionType" => "CASHOUT"
        ]);

        return $response->json();
    }

    // Récuperer l'historique des transactions
    public function get_transaction_list($token,$adpFootprint,$operator,$telephone)
    {
        $url = 'https://twsv03.adwapay.cm/getTransactionList';

        $subscription_key = 'BL3HFKUAVBXXO1';

        $response = Http::withHeaders([
            'AUTH-API-TOKEN' => $token,
            'AUTH-API-SUBSCRIPTION' => $subscription_key
        ])->post($url, [
            "adpFootprint" => $adpFootprint,
            "startDate" => "2022-04-08T00:59:59.000Z",
            "endDate" => "",
            "meanCode" => $operator,
            "paymentNumber" => $telephone,
            "status" => ""
        ]);

        return $response->json();
    }

}
