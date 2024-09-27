<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Identificacion;
use App\Models\Parentesco;
use App\Models\TipoViolencia;
use App\Models\ActividadVS;
use App\Models\NoFamiliar;
use App\Models\MecanismoAgresion;
use App\Models\SitioComprometido;
use App\Models\Escenario;
use App\Models\Ambito;
use App\Models\Salud;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\Informacion;
use App\Models\Justicia;

class JusticiaController extends Controller
{
    public function index($id)
    {
        $datos['informacion'] = Informacion::leftJoin('tipo_violencia', 'tipo_violencia.id_tipo_violencia', '=', 'informacion.id_tipo_violencia')
        ->leftJoin('mecanismo_agresion', 'mecanismo_agresion.id_mecanismo_agresion', '=', 'informacion.id_mecanismo_agresion')
        ->leftJoin('escenario', 'escenario.id_escenario', '=', 'informacion.id_escenario')
        ->leftJoin('ambito', 'ambito.id_ambito', '=', 'informacion.id_ambito')
        ->select(
        'informacion.id_informacion',
        'tipo_violencia.violencia',
        'mecanismo_agresion.mecanismo',
        'escenario.escenario',
        'ambito.ambito',
        'informacion.fecha_hecho'
        )
        ->where('id_informacion', $id)
        ->get();

        $datos['salud']=Salud::where('id_informacion',$id)->get();

        return view('salud.index', $datos);
    }

    public function create($id)
    {
        $datos['id_informacion'] = $id;
        $parentesco=Parentesco::all();
        $violencia=TipoViolencia::all();
        $actividad=ActividadVS::all();
        $noFamiliar=NoFamiliar::all();
        $mecanismo=MecanismoAgresion::all();
        $sitio=SitioComprometido::all();
        $escenario=Escenario::all();
        $ambito=Ambito::all();
        
        return view('justicia.create', $datos, compact('parentesco','violencia','actividad','noFamiliar','mecanismo','sitio','escenario','ambito'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('evidencia')){
            $archivo=$request->file('evidencia');
            $stringRandom = Str::random(3);
            $nameFile = $archivo->getClientOriginalName();
            $s1 = explode(".",$nameFile);
            $s2 = $s1[0]."-".$stringRandom.".".$s1[1];
            $archivo->move(public_path().'/Archivos/',$s2);
            $request['evidencia']=$s2;
        }

        Justicia::create([
            'conocimiento' => $request->conocimiento,
            'estado' => $request->estado,
            'captura' => $request->captura,
            'activacion' => $request->activacion,
            'proteccion' => $request->proteccion,
            'caso_sit' => $request->caso_sit,
            'responsable' => $request->responsable,
            'informe' => $request->informe,
            'observaciones' => $request->observaciones,
            'evidencia' => !empty($request->hasFile('evidencia')) ? $s2 : null ,
            'id_informacion' => $request->id_informacion,
            'caso' => 'justicia'
        ]);

        return redirect('salud/'.$request->id_informacion.'/index')->with('message', 'Seguimiento del Caso Agregado con Éxito');  
    }

    public function edit($id)
    {
        $informacion=Informacion::where('id_informacion', $id)->firstOrFail();
        $parentesco=Parentesco::all();
        $violencia=TipoViolencia::all();
        $actividad=ActividadVS::all();
        $noFamiliar=NoFamiliar::all();
        $mecanismo=MecanismoAgresion::all();
        $sitio=SitioComprometido::all();
        $escenario=Escenario::all();
        $ambito=Ambito::all();

        return view('informacion.edit', compact('informacion', 'parentesco','violencia','actividad','noFamiliar','mecanismo','sitio','escenario','ambito'));
    }

    public function update(Request $request, $id)
    {
        Informacion::where('id_informacion', $id)
        ->update([
            'id_tipo_violencia' => $request->id_tipo_violencia,
            'id_actividad_vs' => $request->id_actividad_vs,
            'sexo' => $request->sexo,
            'id_parentesco' => $request->id_parentesco,
            'convive' => $request->convive,
            'id_no_familiar' => $request->id_no_familiar,
            'id_mecanismo_agresion' => $request->id_mecanismo_agresion,
            'id_sitio_comprometido' => $request->id_sitio_comprometido,
            'grado' => $request->grado,
            'extension' => $request->extension,
            'id_escenario' => $request->id_escenario,
            'id_ambito' => $request->id_ambito,
            'fecha_hecho' => $request->fecha_hecho,
            'contextualizacion' => $request->contextualizacion
        ]);
        return redirect('informacion/'.$request->id_identificacion.'/index')->with('message', 'Información del Caso Modificada con Éxito'); 
    }

    public function destroy($id)
    {
        $query=Justicia::where('id_justicia',$id)
        ->select(
            'id_informacion'
        )
        ->get()
        ->toArray();

        Justicia::where('id_justicia',$id)->delete();

        return redirect('salud/'.$query[0]['id_informacion'].'/index')->with('message', 'Seguimiento del Caso Eliminado con Éxito'); 
    }
}
