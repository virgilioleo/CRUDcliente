<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index()
    {
        return view('cliente.index');
    }

    public function buscarcliente()
    {
        $clientes = Cliente::all();
        return response()->json([
            'clientes'=>$clientes,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'email'=>'required|email|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $cliente = new Cliente;
            $cliente->name = $request->input('nome');
            $cliente->email = $request->input('email');
            $cliente->save();
            return response()->json([
                'status'=>200,
                'message'=>'Cliente adicionado com sucesso.'
            ]);
        }

    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        if($cliente)
        {
            return response()->json($cliente);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Cliente não encontrado.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'email'=>'required|email|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $cliente = Cliente::find($id);
            if($cliente)
            {
                $cliente->name = $request->input('nome');
                $cliente->email = $request->input('email');
                $cliente->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Cliente aualizado com sucesso.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Cliente não encontrado.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if($cliente)
        {
            $cliente->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Cliente deletado com sucesso.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Cliente não encontrado.'
            ]);
        }
    }
}
