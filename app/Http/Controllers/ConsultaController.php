<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;;
use Validator;
use App\Http\Resources\Consulta as ConsultaResource;
use App\Http\Requests;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::all();
        $conversion = ConsultaResource::collection($consultas);
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
            'numeric' => 'El campo: :attribute, debe contener números.',
        ];
        $validator = Validator::make($request->all(), [
            'cita_id' => 'required|numeric',
            'personal_id' => 'required|numeric',
            'medicamento_id' => 'required|numeric',
        ], $messages);
        
        if ($validator->fails())
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        else
        {
            $consultaActualizar = new Consulta;
            $consultaActualizar->cita_id = $request->input('cita_id');
            $consultaActualizar->personal_id = $request->input('personal_id');
            $consultaActualizar->medicamento_id = $request->input('medicamento_id');
            $consultaActualizar->save();
            return response()->json($consultaActualizar);
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
        $consultaMostrar = Consulta::findOrFail($id);
        $conversion = new ConsultaResource($consultaMostrar);
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
            'numeric' => 'El campo: :attribute, debe contener números.',
        ];
        $validator = Validator::make($request->all(), [
            'cita_id' => 'required|numeric',
            'personal_id' => 'required|numeric',
            'medicamento_id' => 'required|numeric',
        ], $messages);
        
        if ($validator->fails())
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        else
        {
            $consultaActualizar = Consulta::find($id);
            $consultaActualizar->cita_id = $request->input('cita_id');
            $consultaActualizar->personal_id = $request->input('personal_id');
            $consultaActualizar->medicamento_id = $request->input('medicamento_id');
            $consultaActualizar->save();
            return response()->json($consultaActualizar);
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
        $consulta = Consulta::findOrFail($id);
        if($consulta->delete()){
            $conversion = new ConsultaResource($consulta);
            return response()->json($conversion);
        }
    }
}
