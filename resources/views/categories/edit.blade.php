<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-600 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class=" bg-white p-6 flex justify-center items-center border-b border-gray-200">

                 <div class="card max-w-md shadow py-8 px-4 rounded bg-yellow-50">
                   <div class="head-card text-center">
                     <span class="font-semibold text-xl text-yellow-600 leading-tight">Edite uma nova categoria</span>
                   </div>
                   <div class="body-card my-6">
                     <form class="block " method="POST"  action="{{ route('categories.update', $categorie->id) }}">
                       @csrf
                       @method('put')
                       <label class="block w-full" for="">Titulo da categoria:</label>
                       <input value="{{$categorie->title}}" name="title" class="w-full rounded h-8"type="text">
                       <div class="row flex justify-between">
                        <div class="flex-col max-w-full my-2">
                          <label  for="">Cor de destaque:</label>
                          <input value="{{$categorie->color}}" name="color" class=" h-8 rounded "  type="text">
                        </div>
                        <div class="flex-col max-w-full my-2 ">
                          <label for="">Icone:</label>
                          <input value="{{$categorie->icon}}"  name="icon" class=" h-8 rounded "  type="text">
                        </div>
                       </div>
                     </div>
                    <div class="form-bottom text-center">
                     <button class="bg-yellow-200 w-full text-center font-sans font-bold text-md text-yellow-900 py-3 rounded hover:bg-yellow-300">salvar</button>
                    </div>
                  </form>
                 </div>
                  


                </div>
            </div>
        </div>
    </div>
</x-app-layout>