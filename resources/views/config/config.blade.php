<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-600 leading-tight">
            {{ __('Categorias') }}
            <a href="/criar"><button class="mx-2 bg-yellow-500 rounded px-2 py-1 font-sans text-white hover:bg-yellow-600">Adicionar</button></a>
        </h2>
    </x-slot>

    <style>

.alert-toast {
		-webkit-animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
				animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	}

	/*Toast close animation*/
	.alert-toast input:checked ~ * {
		-webkit-animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
				animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	}

  	@-webkit-keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-top{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@keyframes slide-out-top{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@-webkit-keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-bottom{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}}@keyframes slide-out-bottom{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}}@-webkit-keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@-webkit-keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}@keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}

    </style>

    

    @if(Session::has('message'))
    <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
      <input type="checkbox" class="hidden" id="footertoast">
  
      <label class="close cursor-pointer flex items-start justify-between w-full p-2 bg-green-500 h-24 rounded shadow-lg text-white" title="close" for="footertoast">
        {{Session::get('message')}}
      
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
      </label>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
              <div class="  bg-white p-6 flex flex-wrap justify-center items-center border-b border-gray-200">
                <div class=" bg-white p-6 flex justify-center items-center border-b border-gray-200">
                    <table class="shadow-lg bg-white divide-y divide-gray-200">
                        <tr>
                          <th class="bg-yellow-100 border text-center px-8 py-4">Categoria</th>
                          <th class="bg-yellow-100 border text-center px-8 py-4">Cor</th>
                          <th class="bg-yellow-100 border text-center px-8 py-4">Icone</th>
                          <th class="bg-yellow-100 border text-center px-8 py-4" td colspan="2">Ações</th>
                        </tr>
                        @foreach ($categories as $item)
                        <tr>
                          <td class="border px-8 py-4">{{ $item->title }}</td>
                          <td class="border px-8 py-4"><div class="breadcumbs py-1 px-2 rounded bg-{{ $item->color }}">color</div></td>
                          <td class="border px-8 py-4"><i class=" text-2xl {{ $item->icon }}"></i></td>
                          <td class="border px-2 py-1 text-center"><a href="{{url("categorias/editar/$item->id")}}"><button class="bg-yellow-500 rounded px-2 py-1 
                            font-sans  text-white hover:bg-yellow-600">
                            Editar</button></a></td>
                          <td class="border px-2 py-1 text-center">
                            <form action="{{ route('categories.destroy', $item->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="bg-red-500 rounded px-2 py-1 font-sans text-white hover:bg-red-600">Excluir</button>
                            </form>
                          </td>
                        </tr>
                      </tr>
                        @endforeach
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>

