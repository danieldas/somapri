<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreProducto;
use App\Http\Requests\UpdateProducto;
use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Http\Request;
use DB;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $param = $request-> input('buscar');
        $param = "%$param%";

        $productos = Producto::
            where('codigo', 'ilike', $param)
                ->orWhere("descripcion", 'ilike', $param)
            ->paginate(50);

        return view('productos.index', compact('productos'));

    }

    public function create(Request $request)
    {
        return view('productos.create');
    }

    public function store(StoreProducto $request)
    {
        $valores = $request->all();
        $consulta =Producto::whereCodigo($request->codigo)->count();

        if ($consulta==0)
        {
            $producto = Producto::create($valores);
            $valores['producto_id'] =$producto->id;
            $compra = Compra::create($valores);
            return redirect()
                ->route('productos.index')
                ->with('mensaje', 'El producto se ha agregado con éxito');
        }
        else
        {
            return redirect()
                ->route('productos.create')
                ->withErrors([
                    'registro' => 'El código ya existe'
                ])
                ->withInput([
                    'descripcion' => $request->descripcion,
                    'origen' => $request->origen,
                    'fabrica' => $request->fabrica,
                    'utilidad' => $request->utilidad,
                    'precio_unitario' => $request->precio_unitario,
                    'cantidad' => $request->cantidad,
                    'fecha' => $request->fecha,
                ]);
        }
    }


    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(UpdateProducto $request, $id)
    {
        $consulta = Producto::whereCodigo($request->codigo)->where('id', '!=', $id)->count();

        if ($consulta==0)
        {
            $producto = Producto::findOrFail($id);
            $producto->fill($request->all());
            $producto->save();

            return redirect()->route('productos.index')->with('mensaje', 'El producto se ha modificado correctamente');
        }
        else
        {
            return redirect()
                ->route('productos.edit', ['id' => $id])
                ->withErrors([
                    'registro' => 'El código ya existe'
                ])
                ->withInput([
                    'descripcion' => $request->descripcion,
                    'origen' => $request->origen,
                    'fabrica' => $request->fabrica,
                    'utilidad' => $request->utilidad,
                    'precio_unitario' => $request->precio_unitario,
                ]);
        }
    }
}
