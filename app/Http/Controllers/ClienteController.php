<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCliente;
use App\Models\Cliente;
use Illuminate\Http\Request;


use DB;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $parametro = $request-> input('buscar');
        $parametro = "%$parametro%";
        $clientes = Cliente::
        where(DB::raw("concat(nombre,' ',apellido_paterno,' ',apellido_materno)"), 'ilike', $parametro)
            ->orderBy('nombre')
            ->paginate();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(StoreCliente $request)
    {
        $valores = $request->all();

        Cliente::create($valores);
        return redirect()
            ->route('clientes.index')
            ->with('mensaje', 'El cliente se ha creado con éxito');

    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(StoreCliente $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->fill($request->all());
        $cliente->save();

        return redirect()
            ->route('clientes.index')
            ->with('mensaje', 'El cliente se ha modificado con éxito');
    }

}
