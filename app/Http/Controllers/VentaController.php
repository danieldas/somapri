<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;


use DB;

class VentaController extends Controller
{
    public function index(Request $request)
    {
        $fechaInicial = date('Y-m-d');
        if (isset($request->fecha_inicial))
            $fechaInicial = $request->fecha_inicial;

        $fechaFinal = date('Y-m-d');
        if (isset($request->fecha_final))
            $fechaFinal = $request->fecha_final;

        $parametro = $request->buscar;
        $parametro = "%$parametro%";
        $ventas = Venta::
        whereBetween('fecha', [$fechaInicial, $fechaFinal])
            ->
            whereHas('producto', function ($q) use ($parametro) {
                $q->where('descripcion', 'ilike', $parametro)
                    ->orWhere('codigo', 'ilike', $parametro);
            })
            ->orderByDesc('fecha')
            ->paginate(50);

        return view('ventas.index', compact('ventas'));
    }

    public function store(Request $request)
    {
        $producto = Producto::find($request->idproducto);
        if($producto->stock< $request->cantidad)
            return redirect()->route('productos.index')->with('mensajeRojo', 'La cantidad de productos no puede ser mayor al stock disponible');

        $valores = $request->all();
        $valores["producto_id"] =$request->idproducto;
        $venta = Venta::create($valores);
        return redirect()
            ->route('ventas.index')
            ->with('mensaje', 'La venta se ha agregado con éxito');

    }

    public function destroy($id)
    {

        $venta = Venta::findOrFail($id);

        $venta->delete();
        $contador = Venta::whereProductoId($venta->producto_id)->count();
        if ($contador == 0) {
            $producto = Producto::find($venta->producto_id);
            $producto->delete();

            return redirect()
                ->route('productos.index')
                ->with('mensajeRojo', 'La venta y producto se han eliminado con éxito');
        }

        return redirect()
            ->route('ventas.index')
            ->with('mensajeRojo', 'La venta se ha eliminado con éxito');
    }

    public function calcularPrecio($idProducto,$esFacturado, $cantidad)
    {
        $producto = Producto::find($idProducto);
        $monto = ($producto->precio_unitario + $producto->utilidad) * $cantidad;

        if ($esFacturado)
            $monto = $monto + ($monto * 0.13);

        return $monto;
    }

}
