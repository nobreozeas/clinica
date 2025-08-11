<?php

namespace App\Http\Controllers\Pacientes;

use App\Http\Controllers\Controller;
use App\Models\pacientes\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pacientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        DB::beginTransaction();

        try {


            //primeiro o usuario

            $usuario = null;

            if ($request->has('usuario') && $request->has('email') && $request->has('senha')) {
                $usuario = User::create([
                    'nome_usuario' => $request->input('usuario'),
                    'email' => $request->input('email'),
                    'senha' => bcrypt($request->input('senha')),
                ]);
            }




            if ($usuario) {
                Paciente::create([
                    'nome' => $request->input('nome'),
                    'data_nascimento' => $request->input('data_nascimento'),
                    'cpf' => $request->input('cpf'),
                    'celular1' => $request->input('celular_1'),
                    'celular2' => $request->input('celular_2'),
                    'rg' => $request->input('rg'),
                    'orgao_expedidor' => $request->input('orgao_emissor'),
                    'data_expedicao' => $request->input('data_emissao'),
                    'uf_expedicao' => $request->input('uf_emissor'),
                    'etnia_id' => $request->input('etnia_id'),
                    'raca_id' => $request->input('raca_id'),
                    'orientacao_sexual_id' => $request->input('orientacao_sexual_id'),
                    'identidade_genero_id' => $request->input('identidade_genero_id'),
                    'usuario_id' => $usuario->id,
                ]);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();

            dd($e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function listarPacientes(Request $request)
    {
        $pacientes = Paciente::paginate(10);

        return response()->json([
            'pacientes' => $pacientes,
        ]);
    }
}
