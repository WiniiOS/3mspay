<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function show(Request $request)
    {
        return view('ticket');
    }

    // Fonction qui crée un nouveau ticket en base de données
    // public function save(Request $request)
    // {
    //     $reference = $this->generateRefcodeNumber();
    //     $user      = $request->session()->get('user');
    //     $userId    = $user->id;

    //     //on crée un enregistrement de notre Ticket en BD
    //     Ticket::create([
    //         'reference' => $reference,
    //         'user_id' => $userId,
    //         'status' => 'unused'
    //     ]);

    //     // return redirect('/Ticket/Reference')->withErrors(['Veuillez lancer le processus de paiement'])->withInput();
    // }

    // fonction pour récupèrer tous les paiements
    public function all()
    {
        // On recupere tous les users en base de donnée
        $tickets = Ticket::all();

        return view('payments',[
            'tickets' => $tickets
        ]);
    }

    public function one($id)
    {
        // On recupere tous les users en base de donnée
        $ticket = Ticket::findOrFail($id);
        return view('payments',[
            'ticket' => $ticket
        ]);

    }

    // function generateRefcodeNumber(Request $request) {

    //     // Indice
    //     $reference .= '3MS' ;
    //     // ID unique basé sur le microtime(56c3096338cdb)
    //     $reference .= strtoupper(uniqid());
    //     // ID du user courant
    //     $user = $request->session()->get('user');
    //     $reference .= $user->id;
    
    //     return $reference;
    // }
    
}
