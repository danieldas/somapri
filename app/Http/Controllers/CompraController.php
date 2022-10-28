<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;


use DB;

class CompraController extends Controller
{
    public function lista($id)
    {
        $compras = Compra::whereProductoId($id)
            ->orderBy('fecha')
            ->get();

        return view('compras.lista', compact('compras'));
    }

    public function store(Request $request)
    {
        $valores = $request->all();

        $compra=Compra::create($valores);
        return redirect()
            ->route('compras.lista', ['id' => $compra->producto_id])
            ->with('mensaje', 'La compra se ha agregado con éxito');

    }

    public function destroy($id){

        $compra = Compra::findOrFail($id);

        $compra->delete();
        $contador=Compra::whereProductoId($compra->producto_id)->count();
        if($contador==0){
            $ventas = Venta::whereProductoId($compra->producto_id)->get();
            foreach ($ventas as $venta){
                $v=Venta::find($venta->id);
                $v->delete();
            }

            $producto = Producto::find($compra->producto_id);
            $producto->delete();

            return redirect()
                ->route('productos.index')
                ->with('mensajeRojo', 'La compra, producto y ventas se han eliminado con éxito');
        }

        return redirect()
            ->route('compras.lista', ['id' => $compra->producto_id])
            ->with('mensajeRojo', 'La compra se ha eliminado con éxito');
    }

}
