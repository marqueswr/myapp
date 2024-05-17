@extends('layouts.default')

@section('content')

    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/4 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Alterar aluno</h1>
                </div>

                <form
                    method="POST"
                    enctype="multipart/form-data"
                    action="{{ route('admin.aluno.update', $aluno->id) }}"
                >
                    @csrf
                    @method('put')
                    <div class="flex flex-wrap">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="ra" class="leading-7 text-sm text-gray-600">RA</label>
                                <input
                                    value="{{ old('ra', $aluno->ra) }}"
                                    type="text" id="ra" name="ra" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            @error('ra')
                            <div class="text-red-400 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="nome" class="leading-7 text-sm text-gray-600">Nome completo</label>
                                <input
                                    value="{{ old('nome', $aluno->nome) }}"
                                    type="text" id="nome" name="nome" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            @error('nome')
                            <div class="text-red-400 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="sala" class="leading-7 text-sm text-gray-600">Sala</label>
                                <input
                                    value="{{ old('sala', $aluno->sala) }}"
                                    type="text" id="sala" name="sala"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                            @error('sala')
                                <div class="text-red-400 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="email" class="leading-7 text-sm text-gray-600">E-mail</label>
                                <input
                                    value="{{ old('email', $aluno->email) }}"
                                    type="text" id="email" name="email"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            @error('email')
                                <div class="text-red-400 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="foto" class="leading-7 text-sm text-gray-600">Foto</label>
                                <input
                                    type="file" id="foto" name="foto"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                            @error('foto')
                            <div class="text-red-400 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($aluno->foto)
                        <div class="p-2 w-full">
                             <img
                                src="{{ \Illuminate\Support\Facades\Storage::url($aluno->foto) }}"
                                alt=""
                            >
                            <a href="{{ route('admin.aluno.destroyImage', $aluno->id) }}">Apagar a foto</a>
                        </div>
                        @endif

                <br>
                        <div class="flex items-center space-x-2">
                            <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Alterar</button>
                            <a href="/admin/alunos">Cancelar</a>
                        </div>
                    </div>
                </form>
              
            </div>
        </div>
    </section>
@endsection
