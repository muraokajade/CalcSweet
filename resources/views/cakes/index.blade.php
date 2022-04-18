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
                                <h1 class="w-2/3 mx-auto text-3xl text-center mb-4 text-center p-2 text-3xl rounded-xl border-b mb-3 bg-gradient-to-r from-teal-200 to-blue-300">ケーキ一覧&価格</h1>
                                <div class="w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="ptitle-font text-center tracking-wider border-2 font-medium text-gray-900 text-2xl leading-none bg-gray-100 rounded-tl rounded-bl">
                                                    ケーキ名</th>
                                                <x-micromodal id="message" />
                                                <!--<th-->
                                                <!--    class=" title-font text-center tracking-wider border-2 font-medium text-gray-900  text-2xl leading-none bg-gray-100">-->
                                                <!--    取れ数</th>-->
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
                                                    作成
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
                                                    <!--<td class="text-center border-2">{{$cake->number}}</td>-->
                                                    <td class="text-center border-2 raw_price" 
                                                    data-id="{{$cake->id}}">{{ $cake->raw_price }}</td>
                                                    <td class="text-center border-2 sell_price"
                                                    data-id="{{$cake->id}}"><input type="number" title="sell_price"
                                                    class="mt-1 w-60 block mx-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    data-id="{{$cake->id}}" id="sell_price_{{$cake->id}}" name="sell_price" value=""></td>
                                                    <td class="text-center border-2 benefit" 
                                                    data-id="{{$cake->id}}"><input type="number" title="benefit" 
                                                    class="mt-1 w-60 block mx-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    data-id="{{$cake->id}}" id="benefit_{{$cake->id}}" name="benefit" value=""></td>
                                                    <td class="text-center border-2 p-2">
                                                        <button type="button" data-id="{{$cake->id}}" class="storeprice m-2 p-2 whitespace-nowrap text-white bg-indigo-400 focus:outline-none hover:bg-indigo-600 rounded">登録</button>
                                                        </td>
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
            
        let benefit_inputs = document.querySelectorAll('input[type="number"][title="benefit"]');
        //.log(inputs);
        for(benefit_input of benefit_inputs) {
            benefit_input.addEventListener('change', (e) => {
                let tr = e.target.parentElement.parentElement;
                let this_raw_price = parseFloat(tr.querySelector('.raw_price').textContent);
                let this_benefit = parseFloat(tr.querySelector('input[type="number"][title="benefit"]').value);
                let this_sell_price = tr.querySelector('input[type="number"][title="sell_price"]');
                this_sell_price.value = this_raw_price / (1 - this_benefit);
                
            });
        }
        
        let sellprice_inputs = document.querySelectorAll('input[type="number"][title="sell_price"]');
        for(sellprice_input of sellprice_inputs) {
            sellprice_input.addEventListener('change', (e) => {
                let tr = e.target.parentElement.parentElement;
                let this_raw_price = parseFloat(tr.querySelector('.raw_price').textContent);
                let this_sell_price = parseFloat(tr.querySelector('input[type="number"][title="sell_price"]').value);
                let this_benefit = tr.querySelector('input[type="number"][title="benefit"]');
                this_benefit.value = Math.round((this_sell_price - this_raw_price) / this_sell_price * 100 ) / 100;
                //this_benefit.value = (this_sell_price - this_raw_price) / this_sell_price;
                
            });
        }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const storePrices = (cake_id,sell_price,benefit) => {
            console.log(sell_price);
            $.ajax({
                url: '/storePrices',
                method: 'POST',
                data: {
                    id: cake_id,
                    sell_price: sell_price,
                    benefit: benefit,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data)
                    $('.storeprice').click(function() {
                        $('#message').toggle();
                    });
                },
                error: function() {
                    console.log('error')
                }
            });
        }
        
        let button = $('.storeprice');
        button.on('click',(e) => {
           let cake_id = e.currentTarget.dataset.id;
           let prices = $('[id^=sell_price_]');
           let benefits = $('[id^=benefit_]');
           //let sample = $('#sell_price_1');
           //console.log(sample.val());
           let storeData = $('button[type="button"][data-id="'+ cake_id +'"]');//それぞれのボタンを指定
           let selll_price;
           let benefit;
           prices.each((index,element) => {
                if(prices.eq(index).data('id') == cake_id) {
                    sell_price = $('[id=sell_price_' + cake_id + ']').val();//input要素の可変id
                    console.log(sell_price);
                }
           });
           benefits.each((index,element) => {
                if(benefits.eq(index).data('id') == cake_id) {
                    benefit = $('[id=benefit_' + cake_id + ']').val();
                }
           });
           storePrices(cake_id,sell_price,benefit);
           
        });
    </script>
    
</x-app-layout>
