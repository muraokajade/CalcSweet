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
                                                    class="ptitle-font text-center tracking-wider border-2 font-medium text-gray-900 text-2xl leading-none bg-gray-100 rounded-tl rounded-bl">
                                                    ケーキ名</th>

                                                <th
                                                    class=" title-font text-center tracking-wider border-2 font-medium text-gray-900  text-2xl leading-none bg-gray-100">
                                                    取れ数</th>
                                                <th
                                                    class="title-font text-center tracking-wider border-2 font-medium text-gray-900 text-2xl leading-none bg-gray-100 rounded-tr rounded-br">
                                                    原価
                                                </th>
                                                <th
                                                    class="title-font text-center tracking-wider border-2 font-medium text-gray-900 text-2xl leading-none bg-gray-100 rounded-tr rounded-br">
                                                    販売価格
                                                </th>
                                                <th
                                                    class="title-font text-center tracking-wider border-2 font-medium text-gray-900 text-2xl leading-none bg-gray-100 rounded-tr rounded-br">
                                                    粗利率
                                                </th>
                                               
                                                <th
                                                    class="text-center title-font whitespace-nowrap tracking-wider border-2 font-medium text-gray-900 text-xl leading-none bg-gray-100 rounded-tr rounded-br">
                                                    管理
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($cakes as $cake)
                                                <tr>
                                                    <td class="text-center border-2">{{ $cake->name }}</td>
                                                    <td class="text-center border-2">{{$cake->number}}</td>
                                                    <td class="text-center border-2 raw_price" data-id="{{$cake->id}}">{{ $cake->raw_price }}</td>
                                                    <td class="text-center border-2 sell_price" data-id="{{$cake->id}}"></td>
                                                    <td class="text-center border-2"><input type="number" title="benefit" data-id="{{$cake->id}}"></td>
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
                            </div>
                </div>
            </div>
        </div>
    <script>
         function showCake(e) {
                document.getElementById('show_' + e.dataset.id).submit();
            }
            

        let inputs = document.querySelectorAll('input[type="number"][title="benefit"]');
        console.log(inputs);
        for(input of inputs) {
            input.addEventListener('change', (e) => {
                let tr = e.target.parentElement.parentElement;
                //console.log(typeof tr);
                let this_raw_price = parseFloat(tr.querySelector('.raw_price').textContent);
                console.log(this_raw_price);
                let this_benefit = parseFloat(tr.querySelector('input[type="number"]').value);
                console.log(this_benefit);
                let this_sell_price = tr.querySelector('.sell_price');
                console.log(this_sell_price);
                this_sell_price.textContent = this_raw_price * (1 + this_benefit);
                
            });
        }

        
        
    </script>
    
    
</x-app-layout>
