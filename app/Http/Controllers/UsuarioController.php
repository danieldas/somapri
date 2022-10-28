<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuario;
use App\Http\Requests\UpdateUsuario;
use App\Models\Usuario;
use Illuminate\Http\Request;

use DB;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $alta = $request->input('alta');
        if($alta == null)
        {
            $alta=true;
        }
        $param = $request-> input('buscar');
        $param = "%$param%";

        $usuarios = Usuario::
            where([['alta', $alta], ['ci', 'like', $param]])
            ->Orwhere([['alta', $alta], [DB::raw("concat(nombre,' ',apellido_paterno,' ',apellido_materno)"), 'like', $param]])
            ->paginate(30);

    return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $valores = $request->all();

        $consulta = Usuario::where('ci',  $request->ci)->count();

        if ($consulta==0)
        {
            $valores['cuenta']=$this->formarCuenta(trim($request->nombre), trim($request->apellido_paterno));
            $usuario = Usuario::create($valores);
            return redirect()
                ->route('usuarios.show', ['usuario' => $usuario->id])
                ->with('mensaje', 'El usuario se ha creado con éxito');
        }
        else
        {
            return redirect()
                ->route('usuarios.create')
                ->withErrors([
                    'registro' => 'El carnet ya existe'
                ])
                ->withInput([
                    'nombre' => $request->input('nombre'),
                    'apellido_paterno' => $request->input('apellido_paterno'),
                    'apellido_materno' => $request->input('apellido_materno'),
                ]);
        }
    }

    private function formarCuenta($Nombre, $Apellido)
    {
        $Nombre=$Nombre. ' ';
        $Apellido=$Apellido. ' ';

        $numero=rand(10,99);

        $Nombre = $this->eliminarTildes(strstr($Nombre, ' ', true));
        $Apellido = $this->eliminarTildes(strstr($Apellido, ' ', true));

        $formato = '%s%s%s';
        return sprintf($formato, strtoupper($Nombre), strtoupper($Apellido), $numero);
    }

    private function eliminarTildes($cadena)
    {
        $cadBuscar = array("á", "Á", "é", "É", "ü", "í", "Í", "ó", "Ó", "ú", "Ú", "Ü");
        $cadPoner =  array("a", "A", "e", "E", "u", "i", "I", "o", "O", "u", "U", "U");
        $cadena = str_replace ($cadBuscar, $cadPoner, $cadena);
        return $cadena;
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }


    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(UpdateUsuario $request, $id)
    {
        $consulta = Usuario::where('ci', '=', $request->ci)->where('id', '!=', $id)->count();

        if ($consulta==0)
        {
            $usuario = Usuario::findOrFail($id);
            $usuario->fill($request->all());
            $usuario->save();

            return redirect()->route('usuarios.show',
                ['usuario' => $usuario->id]
            )->with('mensaje', 'El usuario se ha modificado');
        }
        else
        {
            return redirect()
                ->route('usuarios.edit', ['id' => $id])
                ->withErrors([
                    'registro' => 'El carnet ya existe'
                ])
                ->withInput([
                    'nombre' => $request->input('nombre'),
                    'apellido' => $request->input('apellido'),
                    'cuenta' => $request->input('cuenta'),
                ]);
        }
    }

    public function cambiarEstado($id, $estado)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update(array('alta' => $estado));
        $usuario->save();
        if($estado)
        {
            return redirect()->route('usuarios.index')
            ->with('mensaje', 'El usuario ha sido dado de alta');
        }
        else{
            return redirect()->route('usuarios.index')
                ->with('mensajeRojo', 'El usuario ha sido dado de baja');
        }
    }
    public function cambiarPass(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id);
        $usuario->update(array('password' => $request->password));
        $usuario->save();
            return redirect()->route('usuarios.index')
                ->with('mensaje', 'El password ha sido cambiado');
    }

    public function login()
    {
        return view('usuarios.login');
    }

    public function logear(Request $request)
    {
        $userPass= $request->input('password');
        $userCuenta = $request-> input('cuenta');
        if (auth()->attempt(['cuenta' => $userCuenta, 'password' => $userPass, 'alta' => true]) )
        {
            return redirect()
                ->route('plantillas.principal');
        }
        else
        {
            return redirect()
                ->route('usuarios.login')
                ->withErrors([
                    'login' => 'Cuenta o password incorrectos'
                ])
                ->withInput([
                    'cuenta' => $request->input('cuenta'),
                ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('usuarios.login');
    }

    public function home()
    {
        return view('usuarios.home');
    }

}

