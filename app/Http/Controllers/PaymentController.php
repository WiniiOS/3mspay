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
}
