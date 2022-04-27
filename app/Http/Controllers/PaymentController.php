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

    

    public function pay()
    {        
        $url = 'https://twsv03.adwapay.cm/requestToPay';

        $token = $this->token();

        $subscription_key = 'BL3HFKUAVBXXO1';

        $operator = "ORANGE-MONEY";

        $number = '658682586';

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

        $data = $response->json();

        // dd($data);
        return $data;
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
