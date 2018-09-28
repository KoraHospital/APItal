<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use Validator;
use App\Http\Resources\Paciente as PacienteResource;
use App\Http\Requests;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        $conversion = PacienteResource::collection($pacientes);
        return response()->json($conversion);
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
        ];
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido_materno' => 'required|string',
            'apellido_paterno' => 'required|string',
            'tipo_sangre' => 'required|string',
            'peso' => 'required|numeric',
            'telefono' => 'required|numeric',
            'estatura' => 'required|numeric',
            'edad' => 'required|numeric',
            'afiliacion' => 'required|string',
            'direccion' => 'required|string',
        ], $messages);
        
        if ($validator->fails())
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        else
        {
            $pacientesAgregar = new Paciente;
            $pacientesAgregar->nombre = $request->input('nombre');
            $pacientesAgregar->apellido_materno = $request->input('apellido_materno');
            $pacientesAgregar->apellido_paterno = $request->input('apellido_paterno');
            $pacientesAgregar->tipo_sangre = $request->input('tipo_sangre');
            $pacientesAgregar->peso = $request->input('peso');
            $pacientesAgregar->telefono = $request->input('telefono');
            $pacientesAgregar->estatura = $request->input('estatura');
            $pacientesAgregar->edad = $request->input('edad');
            $pacientesAgregar->afiliacion = $request->input('afiliacion');
            $pacientesAgregar->direccion = $request->input('direccion');
            $pacientesAgregar->save();
            return response()->json($pacientesAgregar);
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
        $pacienteMostrar = Paciente::findOrFail($id);
        $conversion = new PacienteResource($pacienteMostrar);
        return response()->json($conversion);
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
        ];
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido_materno' => 'required|string',
            'apellido_paterno' => 'required|string',
            'tipo_sangre' => 'required|string',
            'peso' => 'required|numeric',
            'telefono' => 'required|numeric',
            'estatura' => 'required|numeric',
            'edad' => 'required|numeric',
            'afiliacion' => 'required|string',
            'direccion' => 'required|string',
        ], $messages);
        
        if ($validator->fails())
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        else
        {
            $pacientesActualizar = Paciente::findOrFail($id);
            $pacientesActualizar->nombre = $request->input('nombre');
            $pacientesActualizar->apellido_materno = $request->input('apellido_materno');
            $pacientesActualizar->apellido_paterno = $request->input('apellido_paterno');
            $pacientesActualizar->tipo_sangre = $request->input('tipo_sangre');
            $pacientesActualizar->peso = $request->input('peso');
            $pacientesActualizar->telefono = $request->input('telefono');
            $pacientesActualizar->estatura = $request->input('estatura');
            $pacientesActualizar->edad = $request->input('edad');
            $pacientesActualizar->afiliacion = $request->input('afiliacion');
            $pacientesActualizar->direccion = $request->input('direccion');
            $pacientesActualizar->save();
            return response()->json($pacientesActualizar);
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
        $paciente = Paciente::findOrFail($id);
        if($paciente->delete()){
            $conversion = new PacienteResource($paciente);
            return response()->json($conversion);
        }
    }
}
