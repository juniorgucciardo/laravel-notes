<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-600 leading-tight">
            {{ __('Criar nota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class=" bg-white p-6 flex justify-center items-center border-b border-gray-200">

                 <div class="card max-w-md shadow py-8 px-4 rounded bg-yellow-50">
                   <div class="head-card text-center">
                     <span class="font-semibold text-xl text-yellow-600 leading-tight">Crie uma nova nota</span>
                   </div>
                   <div class="body-card my-6">
                     <form class="block " method="POST"  action="{{ route('notes.create') }}">
                       @csrf
                       <label class="block w-full" for="">Titulo da categoria:</label>
                       <input name="title" class="focus:border-yellow-900 focus:border-2 h-8 shadow appearance-none border border-yellow-500 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="text">
                        <div class="flex-col max-w-full my-2">
                          <textarea name="content" class=" focus:border-yellow-900 focus:border-2 h-20 shadow appearance-none border border-yellow-500 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" ></textarea>
                        </div>
                        <div class="row flex justify-between">
                            <div class="flex-col max-w-full my-2 ">
                                <label for="">Categoria:</label>
                                <select  name="categories_id" class=" h-10 focus:border-yellow-900 focus:border-2 w-40 shadow appearance-none border border-yellow-500 rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline""  type="text">
                                    <option disabled selected>Escolha </option>
                                    @foreach ($categories as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                     </div>
                     </div>
                    <div class="form-bottom text-center">
                     <button class="bg-yellow-200 text-center font-sans font-bold text-md text-yellow-900 w-full py-3 rounded hover:bg-yellow-300">salvar</button>
                    </div>
                  </form>
                 </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>