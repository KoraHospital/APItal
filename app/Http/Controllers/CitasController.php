<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Citas;
use Validator;
use App\Http\Resources\Cita as CitaResource;
use App\Http\Requests;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Citas::all();
        $conversion = CitaResource::collection($citas);
        return response()->json($conversion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'El campo: :attribute, es requerido.',
            'string' => 'El campo: :attribute, debe de ser texto.',
            'numeric' => 'El campo: :attribute, debe contener números.',
            'date' => 'El campo: :attribute, debe de ser una fecha.',
        ];
        $validator = Validator::make($request->all(), [
            'id_paciente' => 'required|numeric',
            'fecha_hora' => 'required|date',
            'consultorio' => 'required|numeric',
            'tipo' => 'required|string',
            'afiliacion' => 'required|string',
        ], $messages);
        
        if ($validator->fails())
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        else
        {
            $citaActualizar = new Citas;
            $citaActualizar->id_paciente = $request->input('id_paciente');
            $citaActualizar->fecha_hora = $request->input('fecha_hora');
            $citaActualizar->consultorio = $request->input('consultorio');
            $citaActualizar->tipo = $request->input('tipo');
            $citaActualizar->afiliacion = $request->input('afiliacion');
            $citaActualizar->save();
            return response()->json($citaActualizar);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citaMostrar = Citas::findOrFail($id);
        $conversion = new CitaResource($citaMostrar);
        return response()->json($conversion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'El campo: :attribute, es requerido.',
            'string' => 'El campo: :attribute, debe de ser texto.',
            'numeric' => 'El campo: :attribute, debe contener números.',
            'date' => 'El campo: :attribute, debe de ser una fecha.',
        ];
        $validator = Validator::make($request->all(), [
            'id_paciente' => 'required|numeric',
            'fecha_hora' => 'required|date',
            'consultorio' => 'required|numeric',
            'tipo' => 'required|string',
            'afiliacion' => 'required|string',
        ], $messages);
        
        if ($validator->fails())
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        else
        {
            $citaActualizar = Citas::findOrFail($id);
            $citaActualizar->id_paciente = $request->input('id_paciente');
            $citaActualizar->fecha_hora = $request->input('fecha_hora');
            $citaActualizar->consultorio = $request->input('consultorio');
            $citaActualizar->tipo = $request->input('tipo');
            $citaActualizar->afiliacion = $request->input('afiliacion');
            $citaActualizar->save();
            return response()->json($citaActualizar);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Citas::findOrFail($id);
        if($cita->delete()){
            $conversion = new CitaResource($cita);
            return response()->json($conversion);
        }
    }
}
