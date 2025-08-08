<?php

namespace App\Http\Controllers\Exames;

use App\Http\Controllers\Controller;
use App\Models\exames\Exame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('exames.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('exames.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:1000',
        ]);

        try {
            DB::beginTransaction();

            $exame = Exame::create([
                'nome' => $request->input('nome'),
                'descricao' => $request->input('descricao'),
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Exame criado com sucesso!',
                'exame' => $exame,

            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Erro ao criar exame: ' . $e->getMessage(),
            ], 500);
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
        $exame = Exame::find($id);

        if (!$exame) {
            return response()->json([
                'status' => 'error',
                'message' => 'Exame não encontrado.'
            ], 404);
        }

        return view('exames.edit', compact('exame'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $exame = Exame::find($id);

        if (!$exame) {
           throw new \Exception('Exame não encontrado.');
        }


        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:1000',
        ]);


        try {
            DB::beginTransaction();

            $exame->update([
                'nome' => $request->input('nome'),
                'descricao' => $request->input('descricao'),
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Exame atualizado com sucesso!',
                'exame' => $exame,

            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Erro ao atualizar exame: ' . $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exame = Exame::find($id);

        if (!$exame) {
           throw new \Exception("Exame não encontrado.");
        }

        try {
            DB::beginTransaction();

            $exame->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Exame excluído com sucesso!'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Erro ao excluir exame: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function listarExames(Request $request)
    {

        $filtro = $request->input('filtro');

        $exames = Exame::query();

        if ($filtro !== '') {
            $exames->where('nome', 'like', '%' . $filtro . '%');
        }

        return response()->json($exames->paginate(10));
    }
}
