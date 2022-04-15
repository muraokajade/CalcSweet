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
                                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">【{{$cake->name}}】</h1>
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th
                                                    class=" title-font text-center tracking-wider border-2 font-medium text-gray-900  text-xl leading-none bg-gray-100">
                                                    材料</th>
                                                <th
                                                    class="w-10 title-font whitespace-nowrap text-center tracking-wider border-2 font-medium text-gray-900 text-xl leading-none bg-gray-100 rounded-tr rounded-br">
                                                    配合量
                                                </th>
                                               
                                                <th
                                                    class="w-10 text-center title-font whitespace-nowrap tracking-wider border-2 font-medium text-gray-900 text-xl leading-none bg-gray-100 rounded-tr rounded-br">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                               
                                                
                                               
                                            
                                                        @forelse($ingredients as $key=>$ingredient)
                                                        <tr>
                                                        <td class="text-center border-2">{{$ingredient["name"]}}</td>
                                                        @forelse($recipes as $recipe)
                                                        <td class="text-center border-2">{{$recipe->amount}}</td>
                                                         @empty
                                                        <p>から</p>
                                                        @endif
                                                        
                                                        @empty
                                                        <p>から</p>
                                                        @endif
                                                    
                                                        </tr>
                                                        <td class="text-center border-2 p-2">
                                                        <form id="edit_{{ $cake->id }}" method="get"
                                                            action="{{ route('cakes.edit', ['cake' => $cake->id])}}">
                                                            @csrf
                                                             <a href="{{route('cakes.edit', $cake)}}" data-id="{{ $cake->id }}"
                                                                class="m-2 p-2 whitespace-nowrap text-white bg-indigo-400 focus:outline-none hover:bg-indigo-600 rounded"
                                                                onclick="showCake(this)">
                                                                 編集
                                                            </a>
                                                        </form>
                                                        </td>
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
    
    
</x-app-layout>
