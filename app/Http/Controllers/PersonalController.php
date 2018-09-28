<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use Validator;
use App\Http\Resources\Personal as PersonalResource;
use App\Http\Requests;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personales = Personal::all();
        $conversion = PersonalResource::collection($personales);
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
            'alpha_num' => 'El campo: :attribute, debe contener números.',
            'date' => 'El campo: :attribute, debe de ser una fecha.',
        ];
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido_materno' => 'required|string',
            'apellido_paterno' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'rol' => 'required|string',
            'turno' => 'required|string',
            'telefono' => 'required|alpha_num',
            'direccion' => 'required|string',
        ], $messages);
        
        if ($validator->fails())
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        else
        {
            $personalActualizar = new Personal;
            $personalActualizar->nombre = $request->input('nombre');
            $personalActualizar->apellido_materno = $request->input('apellido_materno');
            $personalActualizar->apellido_paterno = $request->input('apellido_paterno');
            $personalActualizar->fecha_nacimiento = $request->input('fecha_nacimiento');
            $personalActualizar->rol = $request->input('rol');
            $personalActualizar->turno = $request->input('turno');
            $personalActualizar->telefono = $request->input('telefono');
            $personalActualizar->direccion = $request->input('direccion');
            $personalActualizar->save();
            return response()->json($personalActualizar);
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
        $personalMostrar = Personal::findOrFail($id);
        $conversion = new PersonalResource($personalMostrar);
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
            'alpha_num' => 'El campo: :attribute, debe contener números.',
            'date' => 'El campo: :attribute, debe de ser una fecha.',
        ];
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido_materno' => 'required|string',
            'apellido_paterno' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'rol' => 'required|string',
            'turno' => 'required|string',
            'telefono' => 'required|alpha_num',
            'direccion' => 'required|string',
        ], $messages);
        
        if ($validator->fails())
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        else
        {
            $personalActualizar = Personal::findOrFail($id);
            $personalActualizar->nombre = $request->input('nombre');
            $personalActualizar->apellido_materno = $request->input('apellido_materno');
            $personalActualizar->apellido_paterno = $request->input('apellido_paterno');
            $personalActualizar->fecha_nacimiento = $request->input('fecha_nacimiento');
            $personalActualizar->rol = $request->input('rol');
            $personalActualizar->turno = $request->input('turno');
            $personalActualizar->telefono = $request->input('telefono');
            $personalActualizar->direccion = $request->input('direccion');
            $personalActualizar->save();
            return response()->json($personalActualizar);
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
        $personal = Personal::findOrFail($id);
        if($personal->delete()){
            $conversion = new PersonalResource($personal);
            return response()->json($conversion);
        }
    }
}
