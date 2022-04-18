<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function form(){
        return view('form');
    }

    // Fonction qui crée un nouveau ticket en base de données
    public function save(Request $request)
    {
        //on crée un enregistrement de notre Ticket en BD

        Ticket::create([
            'reference' => $request->reference,
            'user_id' => $request->user_id,
            'status' => $request->status
        ]);

        dd('Ticket created succesfully');
    }

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
    
}
