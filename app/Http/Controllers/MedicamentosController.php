<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicamentos;
use App\Http\Resources\Medicamento as MedicamentoResource;
use App\Http\Requests;
use Validator;

class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos = Medicamentos::all();
        $conversion = MedicamentoResource::collection($medicamentos);
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
            'min' => 'El campo: :attribute, debe de ser más explícito.',
        ];
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'cantidad' => 'required|string',
            'aplicacion' => 'required|string|min:10',
            'edad_aplicacion' => 'required|numeric',
            'fabricante' => 'required|string',
        ], $messages);
        
        if ($validator->fails())
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        else
        {
            $medicamentoNuevo = new Medicamentos;
            $medicamentoNuevo->nombre = $request->input('nombre');
            $medicamentoNuevo->cantidad = $request->input('cantidad');
            $medicamentoNuevo->aplicacion = $request->input('aplicacion');
            $medicamentoNuevo->edad_aplicacion = $request->input('edad_aplicacion');
            $medicamentoNuevo->fabricante = $request->input('fabricante');
            $medicamentoNuevo->save();
            return response()->json($medicamentoNuevo);
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
        $medicamentoMostrar = Medicamentos::findOrFail($id);
        $conversion = new MedicamentoResource($medicamentoMostrar);
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
            'min' => 'El campo: :attribute, debe de ser más explícito.',
        ];
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'cantidad' => 'required|string',
            'aplicacion' => 'required|string|min:10',
            'edad_aplicacion' => 'required|numeric',
            'fabricante' => 'required|string',
        ], $messages);
        
        if ($validator->fails())
        {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        else
        {
            $medicamentoActualizar = Medicamentos::findOrFail($id);
            $medicamentoActualizar->nombre = $request->input('nombre');
            $medicamentoActualizar->cantidad = $request->input('cantidad');
            $medicamentoActualizar->aplicacion = $request->input('aplicacion');
            $medicamentoActualizar->edad_aplicacion = $request->input('edad_aplicacion');
            $medicamentoActualizar->fabricante = $request->input('fabricante');
            $medicamentoActualizar->save();
            return response()->json($medicamentoActualizar);
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
        $medicamento = Medicamentos::findOrFail($id);
        if($medicamento->delete()){
            $conversion = new MedicamentoResource($medicamento);
            return response()->json($conversion);
        }
    }
}