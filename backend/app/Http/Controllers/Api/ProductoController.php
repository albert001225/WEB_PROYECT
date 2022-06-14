<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::all();
    }

    public function insert(Request $request)
    {
        $producto = new Producto();
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->stock = $request->stock;
        $producto->save();
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->stock = $request->stock;
        $producto->save();
    }


    public function show($id)
    {
        return Producto::find($id);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->destroy();
    }
}
