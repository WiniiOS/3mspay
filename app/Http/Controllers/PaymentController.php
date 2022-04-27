<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Fonction qui crée une instance de paiement en base de données
    public function save(Request $request)
    {
        //on crée un enregistrement de notre Paiement en BD

        Payment::create([
            'user_id' => $request->user_id,
            'ticket_id' => $request->ticket_id,
            'amount' => $request->amount,
            'type' => $request->type,
        ]);

        dd('Payment created succesfully');

    }

    // fonction pour récupèrer tous les paiements
    public function all()
    {
        // On recupere tous les users en base de donnée
        $payments = Payment::all();

        return view('payments',[
            'payments' => $payments
        ]);

    }

    public function one($id)
    {
        // On recupere tous les users en base de donnée
        $payment = Payment::findOrFail($id);
        return view('payments',[
            'payment' => $payment
        ]);

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

    public function pay()
    {        
        $url = 'https://twsv03.adwapay.cm/requestToPay';

        $token = $this->token();

        $subscription_key = 'BL3HFKUAVBXXO1';

        $operator = "ORANGE-MONEY";

        $number = '658682586';

        $order_ref = '3MS'.strtoupper(uniqid());

        $amount = 10;

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

        $data = $response->json();

        // dd($data);
        return $data;
    }

}
