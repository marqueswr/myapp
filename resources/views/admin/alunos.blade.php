@extends('layouts.default')
@section('content')

<section>
    <div class="container px-5 mx-auto">
        <form
            method="get"
            action="/admin/alunos"
            class="flex items-center space-x-5"
        >
            <div>
                <input
                    type="text" id="search" name="search"
                    value="{{ request()->search }}"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
            </div>

            <div class="flex items-center space-x-2">
                <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Pesquisar</button>
                <a href="/admin/alunos">Limpar</a>
            </div>
        </form>
    </div>
</section>
    <section class="text-gray-600">
        <div class="container px-1 py-10 mx-auto">
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Lista de Alunos - Atrasos</h1>
                    <a href="{{ route('admin.aluno.create') }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-indigo-600 rounded">Adicionar</a>
                </div>
                
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                    <tr>
                       
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100" style="width: 150px">Foto</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">RA</th>
               
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">
                            <select name="bimestre" id="bimestre">
                                <option value="1">1º bimestre</option>
                                <option value="1">2º bimestre</option>
                                <option value="1">3º bimestre</option>
                                <option value="1">4º bimestre</option>
                            </select>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y">
                       
                    @foreach($alunos as $aluno)
                    <tr @if($loop->even)class="bg-gray-100"@endif>
                      
                        <td class="px-4 py-3">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ \Illuminate\Support\Facades\Storage::url($aluno->foto) }}">
                        </td>
                        <td class="px-4 py-3"><b>{{ $aluno->ra }}<br>{{ $aluno->nome }}<hr><br></b>{{ $aluno->email }}<br>{{ $aluno->sala }}</td>
                <script>
                    $('#bimestre').change(function(){
                        $bimestre = $(this).val();
                    })
                </script>
                        <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                            <a href="{{ route('admin.aluno.edit', $aluno->id) }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-yellow-600 rounded inline-flex">Alterar</a>
                            <a href="{{ route('admin.aluno.destroy', $aluno->id) }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-red-600 rounded inline-flex">Excluir</a>
                            <a href="{{ route('admin.alunos.atrasocom', $aluno->id) }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-green-600 rounded inline-flex">Com</a>
                            <a href="{{ route('admin.alunos.atrasosem', $aluno->id) }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-green-600 rounded inline-flex">Sem</a>
                            
                        </td> 
                    </tr>
                    @endforeach
                    </tbody>
                </table>
          
               <br>
               <p>
                {{ $alunos->links() }}</p>
            </div>
           
        </div>
    </section>
@endsection
