<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    // Fonction qui crée une instance de paiement en base de données
    public function save(Request $request)
    {
        //on crée un enregistrement de notre Paiement en BD

        Log::create([
            'user_id' => $request->user_id,
            'action_type' => $request->action_type
        ]);

        dd('Log created succesfully');

    }
}
