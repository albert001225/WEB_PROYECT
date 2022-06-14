<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cliente::all();
    }
    public function insert(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->save();
        return $cliente;
    }

    public function create(Request $request)
    {
        Cliente::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }


    public function show($id)
    {
        return Cliente::find($id);
    }


    public function update(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->password = $request->password;
        $cliente->save();
    }


    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->destroy();
    }
}
