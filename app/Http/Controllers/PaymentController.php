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

    // Fonction qui génère un token Adwapay
    public function get_token(){

        $username = 'BLOO1';
        $pass = 'BL3HFKUAVBXXO1';
        $url = 'https://twsv03.adwapay.cm/getADPToken';
        
        $curl = curl_init($url);
      
        $headers = array(
           "Authorization: Basic QkxPTzE6QkwzSEZLVUFWQlhYTzE=$username:$pass",
           "Content-Type:application/json",
           "Accept: application/json"
        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($curl);
        curl_close($curl);

        echo $response;
        $result = json_decode($response);
        return $result->tokenCode;
      
    }

    function ticket_pay($operator,$telephone,$transaction_no){

        $token = $this->get_token();
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://twsv03.adwapay.cm/requestToPay',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
          "meanCode": '.$operator.',
          "paymentNumber": '.$telephone.',
          "orderNumber": '.$transaction_no.',
          "amount": 30000,
          "currency": "XAF",
          "feesAmount": "30"
        }
        ',
          CURLOPT_HTTPHEADER => array(
            'AUTH-API-TOKEN: '.$token.'',
            'AUTH-API-SUBSCRIPTION: BL3HFKUAVBXXO1',
            'Content-Type: text/plain'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
        
        $result = json_decode($response);
        return $result;
       
  }

}
