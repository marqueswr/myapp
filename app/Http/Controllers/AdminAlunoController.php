<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Atraso;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AlunoStoreRequest;
use Illuminate\Support\Facades\Redirect;

class AdminAlunoController extends Controller
{
    public function index(Request $request)
    {
       
        $alunos = Aluno::query();

        $alunos->when($request->search, function($query, $vl) {
            $query->where('nome', 'like', '%' .  $vl . '%');
        });

        $alunos = $alunos->paginate(3);

        return view('admin.alunos', [
            'alunos' => $alunos
        ]);
        
        // $alunos = Aluno::all();
        // return view('admin.alunos', compact('alunos'));
    }

     // Mostrar página de criar
    public function create()
    {
        return view('admin.aluno_create');
    }

    // Receber a requisição de criar POST
    public function store(AlunoStoreRequest $request)
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['nome']);

        if (!empty($input['foto']) && $input['foto']->isValid()) {
            $file = $input['foto'];
            $path = $file->store('alunos');
            $input['foto'] = $path;
        }

        Aluno::create($input);
        return Redirect::route('admin.alunos');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        Storage::delete($aluno->foto ?? '');

        return Redirect::route('admin.alunos');
    }

    public function destroyImage(Aluno $aluno)
    {
        Storage::delete($aluno->foto ?? '');
        $aluno->foto = null;
        $aluno->save();

        return Redirect::back();
    }

     // Mostrar a página de editar
     public function edit(Aluno $aluno)
     {
         return view('admin.aluno_edit', [
             'aluno' => $aluno
         ]);
     }
 
     // Recebe requisição para dar update PUT
     public function update(Aluno $aluno, AlunoStoreRequest $request)
     {
         $input = $request->validated();
 
         if (!empty($input['foto']) && $input['foto']->isValid()) {
             Storage::delete($aluno->foto ?? '');
             $file = $input['foto'];
             $path = $file->store('alunos');
             $input['aluno'] = $path;
         }
 
         $aluno->fill($input);
         $aluno->save();
         return Redirect::route('admin.alunos');
     }
 
  
    public function atrasoSemJustificativa(Aluno $aluno, Atraso $atraso, Request $request)
    {
        $input=$aluno->id;
     
        $atraso = Atraso::create([
            'bimestre' => "1",
            'aluno' => $input,
            'tipo' => "1",
            'dta' => date('d/m/y')
        ]);
       
        return Redirect::route('admin.alunos');
    }

    public function atrasoComJustificativa(Aluno $aluno, Atraso $atraso, Request $request)
    {
        $input=$aluno->id;
     
        $atraso = Atraso::create([
            'bimestre' => "1",
            'aluno' => $input,
            'tipo' => "0",
            'dta' => date('d/m/y')
        ]);
       
        return Redirect::route('admin.alunos');
    }
}
