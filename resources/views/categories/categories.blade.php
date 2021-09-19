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
                @foreach ($categories as $item)
                    {{-- card --}}
                @php
                $color = $item->color;
                $color = explode('-', $item->color);
                $colorselected = $color[0];
                $value = $color[1];
                $value2 = $value + 200;
                $gradient = "bg-gradient-to-r from-{$colorselected}-{$value} to-{$colorselected}-{$value2}";
            @endphp
            <div class="card  max-w-sm {{$gradient}} rounded-md px-2 py-4 flex-col align-middle mx-5 my-12 shadow-md">
                <div class=" mx-6 icon p-1 w-20 h-20 flex items-center justify-center rounded-full ring-4 ring-{{$colorselected}}-400 ring-opacity-40 bg-{{$item->color}}">
                  <i class=" text-5xl {{ $item->icon }}"></i>
                </div>
                <span class="block my-3 text-center text-lg font-bold text-white">{{$item->title}}</span>
                <div class=" flex w-32 justify-between">
                  <a href="{{url("categorias/editar/$item->id")}}"><button class="bg-{{$colorselected}}-300 shadow rounded px-2 py-1 
                    font-sans  text-black text-opacity-70 hover:bg-{{$colorselected}}-400">
                    Editar</button></a>  <form action="{{ route('categories.destroy', $item->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="bg-{{$colorselected}}-800 rounded px-2 py-1 font-sans text-white hover:bg-{{$colorselected}}-900">Excluir</button>
                    </form>
                </div>
            </div>
            {{-- end card --}}
                @endforeach

            {{-- card --}}
        <a href="{{ route('categories.create') }}">
          <div class="relative card max-w-sm bg-gradient-to-r from-yellow-500 to-yellow-800 rounded-md px-3 py-8 flex-col align-middle mx-3 shadow-md">
            <div class="absolute -mt-24 mx-6 icon p-1 w-20 h-20 flex items-center justify-center rounded-full ring-4 ring-yellow-400 ring-opacity-40 bg-yellow-900">
              <i class="fas fa-plus-circle text-5xl"></i>
            </div>
            <span class="block my-3 text-center text-lg font-bold text-white">Adicionar novo</span>
        </div>
        </a>
        {{-- end card --}}
              </div>
                
                
            </div>
        </div>
    </div>
</x-app-layout>

