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
        $cliente->name = $request->name;
        $cliente->lastName = $request->lastName;
        $cliente->email = $request->email;
        $cliente->save();
        return $cliente;
    }

    public function Create(Request $request)
    {
        Cliente::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
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
        $cliente->lastName = $request->lastName;
        $cliente->email = $request->email;
        $cliente->password = $request->password;
        $cliente->save();
    }


    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->destroy();
    }
    public function login(Request $request)
    {
        $cliente = Cliente::where('email', $request->email)->first();
        if ($cliente) {
            if ($cliente->password == $request->password) {
                return $cliente;
            } else {
                return ['contraseña incorreta'];
            }
        } else {
            return ['Cuenta no existe'];
        }
    }
    public function logup(Request $request)
    {
        $cliente = Cliente::where('email', $request->email)->first();
        if ($cliente) {
            return 'Cuenta ya existe';
        } else {
            $cliente = new Cliente();
            $cliente->name = $request->name;
            $cliente->lastName = $request->lastName;
            $cliente->email = $request->email;
            $cliente->password = $request->password;
            $cliente->save();
            return $cliente;
        }
    }
}
