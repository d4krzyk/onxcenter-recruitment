<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|string|min:5',
            'employee_id' => 'required|exists:employees,id',
        ]);

        // Tworzenie nowego klienta
        $client = Client::create([
            /*'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'employee_id' => $request->input('employee_id'),*/
            'name' => 'name',
            'email' => 'email',
            'password' => 'password',
            'employee_id' => '1',
        ]);

        return response()->json(['message' => 'Klient został pomyślnie utworzony.', 'data' => $client], 201);
    }
}
