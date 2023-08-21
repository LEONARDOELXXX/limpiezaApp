<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Limpieza;
use App\Models\Solicitudes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {

            $datos = DB::table('solicitudes as s')
                ->join('datos_areas as da', 'da.id', '=', 's.id_area')
                ->join('users as u', 'u.id', '=', 'da.id_usuario')
                ->select('u.name', 'da.edificio', 'da.nombre_area', 'da.planta', 's.horario', 's.estatus', 's.atentida', 's.created_at')
                ->get();

                $datosusuario = DB::table('solicitudes as s')
                ->join('datos_areas as da', 'da.id', '=', 's.id_area')
                ->join('users as u', 'u.id', '=', 'da.id_usuario')
                ->select('u.name', 'da.edificio', 'da.nombre_area', 'da.planta', 's.horario', 's.estatus', 's.atentida', 's.created_at')
                ->where('u.id',  Auth::user()->id)

                ->get();
                // $datos_areas = DB::table('datos_areas as da')
                // ->join('users as u', 'u.id', '=', 'da.id_usuario')
                // ->select('u.name', 'da.edificio', 'da.nombre_area', 'da.planta')
                // ->where('da.id_usuario',  Auth::user()->id)
                // ->get();

            return view('home')->with([
                'datos' => $datos,
                'datosUsuario' => $datosusuario,
                // 'datos_areas' =>$datos_areas
            ]);

        } catch (Exception $e) {
            return $e;
        }
    }


    // function obtenerDatosAreaById() {
    //     $datosusuario = DB::table('datos_areas as da')
    //     ->join('users as u', 'u.id', '=', 'da.id_usuario')
    //     ->select('u.name', 'da.edificio', 'da.nombre_area', 'da.planta')
    //     ->where('u.id', 1)
    //     ->get();
    //     // return json_encode($datos);
    // return view('home')->with(['datosUsuario' => $datosusuario]);
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //!PARA CREAR UNA SOLICITUD
        $user = Solicitudes::create(request()->all());
        return json_encode($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitudes $solicitudes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitudes $solicitudes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitudes $solicitudes)
    {
        //
    }
}
