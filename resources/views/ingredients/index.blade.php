<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナー一覧
        </h2>
    </x-slot>

        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">

                  <section class="text-gray-600 body-font">
                    <div class="md:px-5 ">
                      <x-flash-message status="session('status')" />
                      <h1 class="w-2/3 mx-auto text-3xl text-center mb-4 text-center p-2 text-3xl rounded-xl border-b mb-3 bg-gradient-to-r from-teal-200 to-blue-300">原材料一覧</h1>
                      <div class="overflow-auto">
                         <input type="text" id="search"> <input class="p-2 bg-gray-200" type="button" value="絞り込む" id="button"> <input class="p-2  bg-gray-200" type="button" value="すべて表示" id="button2">
                        <button class="ml-2 text-white whitespace-nowrap bg-indigo-400 border-0 p-2 focus:outline-none hover:bg-indigo-600 rounded" id="editing" type="submit">変更</button>
                        <table id="result" class="table-auto w-full border-2 text-left whitespace-no-wrap mt-4">
                          <thead>
                            <tr>
                              <th class="py-3 title-font text-center border-2 tracking-wider font-medium text-gray-900 bg-gray-100 ">原材料名</th>
                              <th class="py-3 title-font text-center border-2 tracking-wider font-medium text-gray-900 bg-gray-100">価格</th>
                              <th class="py-3 title-font text-center border-2 tracking-wider font-medium text-gray-900 bg-gray-100">荷姿(g)</th>
                              <th class="py-3 title-font text-center border-2 tracking-wider font-medium text-gray-900 bg-gray-100 ">g等単価</th>
                              <th class="py-3 title-font text-center border-2 tracking-wider font-medium text-gray-900 bg-gray-100 ">仕入れ日</th>
                              <th class="py-3 title-font text-center border-2 tracking-wider font-medium text-gray-900 bg-gray-100 ">仕入先</th>
                              <th class="py-3 title-font text-center border-2 tracking-wider font-medium text-gray-900 bg-gray-100 ">管理</th>
                            </thead>
                          <tbody>
                            @foreach ($ingredients as $ingredient)
                            <tr>
                               <td class="text-center border-2 ">{{$ingredient->name}}</td>  
                               <td class="text-center border-2 ">
                                         <input type="text"
                                            {{ $ingredient->status == 1 ? 'disabled' : '' }}
                                            class="{{ $ingredient->status == 1 ? 'bg-gray-200' : '' }} mt-1 border-2  w-60 block mx-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            data-id="{{ $ingredient->id }}" id="sell_price_{{ $ingredient->id }}"
                                            name="name" value="{{ $ingredient->price }}">
                                </td>
                                <td class="text-center border-2 ">
                                         <input type="number" title="sell_price"
                                            {{ $ingredient->status == 1 ? 'disabled' : '' }}
                                            class="{{ $ingredient->status == 1 ? 'bg-gray-200' : '' }} mt-1 border-2  w-60 block mx-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            data-id="{{ $ingredient->id }}" id="sell_price_{{ $ingredient->id }}"
                                            name="name" value="{{ $ingredient->weight }}">
                                </td> 
                               <td class="text-center border-2 ">
                                         <input type="number" title="sell_price"
                                            {{ $ingredient->status == 1 ? 'disabled' : '' }}
                                            class="{{ $ingredient->status == 1 ? 'bg-gray-200' : '' }} mt-1 border-2  w-60 block mx-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            data-id="{{ $ingredient->id }}" id="sell_price_{{ $ingredient->id }}"
                                            name="sell_price" value="{{ $ingredient->g_price }}">
                                </td>  
                               
                              <td class="text-center border-2 py-3 edit">{{ $ingredient->p_date }}</td>
                              <td class="text-center border-2 py-3 edit">{{ $ingredient->p_camp }}</td>
                              <td class="text-center border-2 py-3">
                                  <button class="text-white text-center whitespace-nowrap bg-indigo-400 border-0 p-2 focus:outline-none hover:bg-indigo-600 rounded">
                                      編集
                                  </button></td>
                            </tr>
                            @endforeach
                            <tr>
                                <form  method="post" action="{{route('ingredients.store')}}">
                                @csrf
                                    <td class="text-center"><input id="name" type="text" name="name" value=""></td>
                                    <td class="text-center"><input id="price" type="number" name="price" value=""></td>
                                    <td class="text-center"><input id="weight" type="number" name="weight" value=""></td>
                                    <td class="text-center"><input id="g_price" type="text" step="0.01" name="g_price" value=""></td>
                                    <td class="text-center"><input type="date" name="p_date" value=""></td>
                                    <input type="hidden" name="status" value="0"></td>
                                    <td class="text-center">
                                        <select class="text-center" name="p_camp" value="">
                                           <option>テスト物産</option>
                                           <option>鈴木物産</option>
                                           <option>田中物産</option>
                                        </select>
                                    <td><button class="ml-2 text-white whitespace-nowrap bg-indigo-400 border-0 p-2 focus:outline-none hover:bg-indigo-600 rounded" type="submit">追加</button></td>
                                </form>
                            </tr>
                          </tbody>
                        </table>
                        {{-- {{ $ingredients->links() }} --}}
                      </div>
                    </div>
                  </section>
                </div>
            </div>
        </div>
  <script>
    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除してもいいですか?')) {
        document.getElementById('delete_' + e.dataset.id).submit();
        }
    }

    window.addEventListener('DOMContentLoaded',function(){
        let input_price = document.getElementById('price');
        let input_weight = document.getElementById('weight');

        input_weight.addEventListener('input',(e) => {
            let weight = e.target.value;
            let price = document.getElementById('price').value;
            let g_price = document.getElementById('g_price');
            g_price.value = price / weight;
            // g_price.value = Math.round(((price / weight) * 100) / 100) ;

        });
    });
    

        let editbutton = document.getElementById('editing');
        editbutton.addEventListener('click',(e) => {
            let td = document.querySelectorAll('.edit');
            console.log(td);
        });


    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(function(){
	$('#button').bind("click",function(){
		let re = new RegExp($('#search').val());
		$('#result tbody tr').each(function(){
			let txt = $(this).find("td:eq(0)").html();
			if(txt.match(re) != null){
				$(this).show();
			}else{
				$(this).hide();
			}
		});
	});

	$('#button2').bind("click",function(){
		$('#search').val('');
		$('#result tr').show();
	});
});

    </script>
  </x-app-layout>
