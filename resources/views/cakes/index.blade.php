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
                        <div class="mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                                <h1 class="w-2/3 mx-auto text-3xl text-center mb-4 text-center p-2 text-3xl rounded-xl border-b mb-3 bg-gradient-to-r from-teal-200 to-blue-300">ケーキ一覧</h1>
                                <div class="w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="ptitle-font text-center tracking-wider border-2 font-medium text-gray-900 text-xl leading-none bg-gray-100 rounded-tl rounded-bl">
                                                    ケーキ名</th>

                                                <th
                                                    class=" title-font text-center tracking-wider border-2 font-medium text-gray-900  text-xl leading-none bg-gray-100">
                                                    取れ数</th>
                                                <th
                                                    class="w-10 title-font text-center tracking-wider border-2 font-medium text-gray-900 text-xl leading-none bg-gray-100 rounded-tr rounded-br">
                                                    原価
                                                </th>
                                               
                                                <th
                                                    class="w-10 text-center title-font whitespace-nowrap tracking-wider border-2 font-medium text-gray-900 text-xl leading-none bg-gray-100 rounded-tr rounded-br">
                                                    詳細
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($cakes as $cake)
                                                <tr>
                                                    <td class="text-center border-2">{{ $cake->name }}</td>
                                                    <td class="text-center border-2">{{$cake->number}}</td>
                                                    <td class="text-center border-2">{{ $cake->raw_price }}</td>
                                                    <td class="text-center border-2 p-2">
                                                    <form id="show_{{ $cake->id }}" method="get"
                                                        action="{{ route('cakes.show', ['cake' => $cake->id])}}">
                                                        @csrf
                                                         <a href="{{route('cakes.show', $cake)}}" data-id="{{ $cake->id }}"
                                                            class="m-2 p-2 whitespace-nowrap text-white bg-indigo-400 focus:outline-none hover:bg-indigo-600 rounded"
                                                            onclick="showCake(this)">
                                                             詳細
                                                        </a>
                                                    </form>
                                                        
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>中身がありません</p>

                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                    <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                            viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <button
                                        class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    <script>
         function showCake(e) {
                document.getElementById('show_' + e.dataset.id).submit();
            }
        
    </script>
    
    
</x-app-layout>
