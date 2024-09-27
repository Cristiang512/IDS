<?php

namespace App\Http\Controllers;

use App\Exports\InformacionExport;
use App\Models\Identificacion;
use App\Models\Informacion;
use App\Models\Justicia;
use App\Models\Salud;
use App\Models\Proteccion;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    public function index()
    {
        
        $datos['casos']=Informacion::leftJoin('identificacion','informacion.id_identificacion','=','identificacion.id_identificacion')
        ->leftJoin('tipo_violencia', 'tipo_violencia.id_tipo_violencia', '=', 'informacion.id_tipo_violencia')
        ->leftJoin('ambito', 'ambito.id_ambito', '=', 'informacion.id_ambito')
        ->select(
        'identificacion.estado_referencia',
        'tipo_violencia.violencia',
        'ambito.ambito',
        'informacion.fecha_hecho'
        )
        ->get();

        $datos['vs']=Identificacion::all()->count();
        $datos['info']=Informacion::all()->count();
        $query1=Salud::all()->count();
        $query2=Justicia::all()->count();
        $query3=Proteccion::all()->count();
        $datos['seg'] = $query1 + $query2 + $query3;
        $datos['abi']=Identificacion::where('estado_referencia','Caso Abierto')->count();
        $datos['fis']=Informacion::where('id_tipo_violencia',1)->count();
        $datos['psi']=Informacion::where('id_tipo_violencia',2)->count();
        $datos['neg']=Informacion::where('id_tipo_violencia',3)->count();
        $datos['pat']=Informacion::where('id_tipo_violencia',4)->count();
        $datos['as']=Informacion::where('id_tipo_violencia',5)->count();
        $datos['ac']=Informacion::where('id_tipo_violencia',6)->count();
        $datos['exp']=Informacion::where('id_tipo_violencia',7)->count();
        $datos['tra']=Informacion::where('id_tipo_violencia',8)->count();
        $datos['act']=Informacion::where('id_tipo_violencia',9)->count();
        $datos['otr']=Informacion::where('id_tipo_violencia',10)->count();
        $datos['mut']=Informacion::where('id_tipo_violencia',11)->count();
        $datos['esc']=Informacion::where('id_ambito',1)->count();
        $datos['lab']=Informacion::where('id_ambito',2)->count();
        $datos['inst']=Informacion::where('id_ambito',3)->count();
        $datos['vir']=Informacion::where('id_ambito',4)->count();
        $datos['com']=Informacion::where('id_ambito',5)->count();
        $datos['hog']=Informacion::where('id_ambito',6)->count();
        $datos['otro']=Informacion::where('id_ambito',7)->count();
        $datos['ini']= '';

        return view('reportes.index', $datos);
    }

    public function store(Request $request)
    {
        return Excel::download(new InformacionExport($request['fecha_ini'],$request['fecha_fin'],$request['tipo']),'reporte.xlsx');
    }

    public function aplicar(Request $request)
    {
        $datos['casos']=Informacion::leftJoin('identificacion','informacion.id_identificacion','=','identificacion.id_identificacion')
        ->leftJoin('tipo_violencia', 'tipo_violencia.id_tipo_violencia', '=', 'informacion.id_tipo_violencia')
        ->leftJoin('ambito', 'ambito.id_ambito', '=', 'informacion.id_ambito')
        ->select(
        'identificacion.estado_referencia',
        'tipo_violencia.violencia',
        'ambito.ambito',
        'informacion.fecha_hecho'
        )
        ->get();

        $datos['vs']=Identificacion::all()->count();
        $datos['info']=Informacion::all()->count();
        $query1=Salud::all()->count();
        $query2=Justicia::all()->count();
        $query3=Proteccion::all()->count();
        $datos['seg'] = $query1 + $query2 + $query3;
        $datos['abi']=Identificacion::where('estado_referencia','Caso Abierto')->count();
        $datos['fis']=Informacion::where('id_tipo_violencia',1)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['psi']=Informacion::where('id_tipo_violencia',2)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['neg']=Informacion::where('id_tipo_violencia',3)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['pat']=Informacion::where('id_tipo_violencia',4)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['as']=Informacion::where('id_tipo_violencia',5)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['ac']=Informacion::where('id_tipo_violencia',6)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['exp']=Informacion::where('id_tipo_violencia',7)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['tra']=Informacion::where('id_tipo_violencia',8)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['act']=Informacion::where('id_tipo_violencia',9)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['otr']=Informacion::where('id_tipo_violencia',10)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['mut']=Informacion::where('id_tipo_violencia',11)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['esc']=Informacion::where('id_ambito',1)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['lab']=Informacion::where('id_ambito',2)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['inst']=Informacion::where('id_ambito',3)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['vir']=Informacion::where('id_ambito',4)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['com']=Informacion::where('id_ambito',5)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['hog']=Informacion::where('id_ambito',6)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['otro']=Informacion::where('id_ambito',7)->whereBetween('fecha_hecho', [$request['fecha_ini'], $request['fecha_fin']])->count();
        $datos['ini'] = $request['fecha_ini'];
        $datos['fin'] = $request['fecha_fin'];

        return view('reportes.index', $datos);
    }
}
