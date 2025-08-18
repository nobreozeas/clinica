<?php

namespace App\Http\Controllers\medicos;

use App\Http\Controllers\Controller;
use App\Models\especialidades\EspecialidadeMedico;
use App\Models\medicos\Medico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    public function index(){
        return view('medicos.index');
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicos.create');
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
            $medico = null;

            if ($request->has('usuario') && $request->has('email') && $request->has('senha')) {
                $usuario = User::create([
                    'nome_usuario' => $request->input('usuario'),
                    'email' => $request->input('email'),
                    'senha' => bcrypt($request->input('senha')),
                ]);
            }

            if ($usuario) {
               $medico =  Medico::create([
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
                    'crm' => $request->input('crm'),
                    'matricula' => $request->input('matricula'),
                ]);
            }

            if($medico){

                foreach($request->especialidades as $especialidade){

                    EspecialidadeMedico::create([
                        'medico_id' => $medico->id,
                        'especialidade_id' => $especialidade['id'],
                    ]);
                }
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

    public function listarMedicos(Request $request)
    {
        $medicos = Medico::paginate(10);

        return response()->json([
            'medicos' => $medicos,
        ]);
    }

    public function listarMedicosSelect(){
        return response()->json([
            'medicos' => Medico::select('id', 'nome')->get(),
        ]);
    }


}
