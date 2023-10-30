<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabelaUser;
// use App\Http\Controllers\DB;

class FormularioController extends Controller
{
    public function index()
    {
        $usuarios = TabelaUser::simplepaginate(10);
        return view('users.usuarios-cadastrados')->with(compact('usuarios'));
    }

    public function create(){
        $formulario = TabelaUser::all();
        return view('users.formulario')->with(compact('formulario'));
    }

    public function store(Request $request)
    {
        try{
            $formulario = new TabelaUser;
            $formulario->name = $request->name;
            $formulario->cpf = $request->cpf;
            $formulario->email = $request->email;
            $formulario->phone = $request->phone;
            $formulario->cep = $request->cep;
            $formulario->street = $request->street;
            $formulario->number = $request->number;
            $formulario->neighborhood = $request->neighborhood;
            $formulario->city = $request->city;
            $formulario->state = $request->state;
            $formulario->complement = $request->complement;
            $formulario->save();            
        }   
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->whithErrors([`msg`=>`Ocorreu um problema ao criar o usuário!`]);
            
        }
        return redirect()->back()->withSucess(`Usuario cadastrado com sucesso`);
    }

    public function edit(Request $request, $id){
        $formulario = TabelaUser::find($id);
        return view('users.edicao')->with(compact('formulario'));
    }

    public function update(Request $request, $id){
        // DB::beginTransaction();
        try{
            $formulario = TabelaUser::find($id);
            $formulario->name = $request->name;
            // $formulario->cpf = $request->cpf;
            $formulario->email = $request->email;
            $formulario->phone = $request->phone;
            $formulario->cep = $request->cep;
            $formulario->street = $request->street;
            $formulario->number = $request->number;
            $formulario->neighborhood = $request->neighborhood;
            $formulario->city = $request->city;
            $formulario->state = $request->state;
            $formulario->complement = $request->complement;
            $formulario->save();
            // DB::commit();
        }
        catch(\Exception $e){
            // DB::rollback();
            // return redirect()->back()->whithErrors([`msg`=>`Ocorreu um problema ao criar o usuário!`]);
            
        }
        // catch(\Exception $e){
        //     DB::rollback();
        //     return redirect()->back()->whithErrors([`msg`=>`Ocorreu um problema ao atualizar o usuário!`]);  
        // }
        return redirect()->back()->withSuccess(`Usuario atualizado com sucesso`);  
    }
    public function destroy($id){
        try{
            $usuario = TabelaUser::find($id);
            $usuario->delete();
        }
        catch(\Exception $e){
        dd($e);
        }
        return redirect()->back();
    }
}



























// DB::beginTransaction();

        // try{
        //     $formulario = new Model;
        //     $formulario->name = $request->name;
        // }   
        // catch(\Exception $e){
        //     DB::rollback();
        //     return redirect()->back()->whithErrors([`msg`=>`ocorreu um problema ao criar o usuário!`, `error`->$e->getMessage()]);
        // }
        
        // DB::commit();

        // return redirect()->back()->withSucess(`usuario cadastrado com sucesso`);

        // Processar os dados do formulário aqui
        // $request->input('nome'), $request->input('cpf'), etc.

        // Redirecionar ou fazer o que for necessário após o envio