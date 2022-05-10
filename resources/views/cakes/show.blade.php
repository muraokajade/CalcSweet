<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" />
                    <section class="text-gray-600 body-font">
                        <div class="px-5 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                                <div class="w-full mx-auto overflow-auto">
                                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900 mb-4">【{{$cake->name}}】</h1>
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                             
                                                <th
                                                    class="title-font text-center tracking-wider border-2 font-medium text-gray-900  text-2xl leading-none bg-gray-100">
                                                    材料名
                                                </th>
                                                <th
                                                    class="title-font text-center tracking-wider border-2 font-medium text-gray-900  text-2xl leading-none bg-gray-100">
                                                    材料単価(g)
                                                </th>
                                                <th
                                                    class="title-font whitespace-nowrap text-center tracking-wider border-2 font-medium text-gray-900 text-2xl leading-none bg-gray-100">
                                                    配合量(g)
                                                </th>
                                                <th
                                                    class="text-center title-font whitespace-nowrap tracking-wider border-2 font-medium text-gray-900 text-2xl leading-none bg-gray-100">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                        @forelse($recipes as $recipe)
                                                        <tr>
                                                            <td class="text-center border-2">{{$recipe->ingredient->name}}</td>
                                                            <td class="text-center border-2">{{$recipe->ingredient->g_price}}</td>
                                                            <td class="text-center border-2">{{$recipe->amount}}</td>
                                                            <td class="text-center border-2 p-2">
                                                                <form id="edit_{{ $recipe->cake_id }}" method="get"
                                                                    action="{{ route('cakes.edit', ['cake' => $recipe->cake_id])}}">
                                                                    @csrf
                                                                     <a href="{{route('cakes.edit', $recipe)}}" data-id="{{ $recipe->cake_id }}"
                                                                        class="m-2 p-2 whitespace-nowrap text-white bg-indigo-400 focus:outline-none hover:bg-indigo-600 rounded"
                                                                        onclick="showCake(this)">
                                                                         編集
                                                                    </a>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                         @empty
                                                        <p>から</p>
                                                        @endif
                                                        <tr>
                                                            <td><select style="width:250px;" ></select></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>{{$cake->raw_price}}</td> 
                                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    <script>
         function showCake(e) {
                document.getElementById('edit_' + e.dataset.id).submit();
            }
        
    </script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
    
     </script>
    
</x-app-layout>
