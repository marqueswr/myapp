<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $alunos = Aluno::query();

        $alunos->when($request->search, function($query, $vl) {
            $query->where('nome', 'like', '%' .  $vl . '%');
        });

        $alunos = $alunos->paginate(4);

        return view('aluno', [
            'alunos' => $alunos
        ]);
    }

    public function show(Aluno $aluno)
    {
        return view('aluno', [
            'aluno' => $aluno
        ]);
    }
}
