<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return Cliente::all();
    }
    public function insertCliente(Request $request)
    {
        Cliente::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }

    public function update(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->password = $request->password;
        $cliente->save();
    }
    public function destroy(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $cliente->destroy();
    }
}
