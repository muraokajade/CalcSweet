<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナー一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">

                  <section class="text-gray-600 body-font">
                    <div class="md:px-5 ">
                      <x-flash-message status="session('status')" />
                      <div class="w- overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                          <thead>
                            <tr>
                              <th class="py-3 title-font tracking-wider font-medium text-gray-900 border-r bg-gray-100 ">原材料名</th>
                              <th class="py-3 title-font tracking-wider font-medium text-gray-900 border-r bg-gray-100">価格</th>
                              <th class="py-3 title-font tracking-wider font-medium text-gray-900 border-r bg-gray-100">荷姿(g)</th>
                              <th class="py-3 title-font tracking-wider font-medium text-gray-900 border-r bg-gray-100 ">g等単価</th>
                              <th class="py-3 title-font tracking-wider font-medium text-gray-900 border-r bg-gray-100 ">仕入れ日</th>
                              <th class="py-3 title-font tracking-wider font-medium text-gray-900 border-r bg-gray-100 ">仕入先</th>
                              <th class="py-3 title-font tracking-wider font-medium text-gray-900 border-r bg-gray-100 "></th>
                            </thead>
                          <tbody>
                            @foreach ($ingredients as $ingredient)
                            <tr class="border">
                              <td class=" py-3">{{ $ingredient->name }}</td>
                              <td class=" py-3">{{ $ingredient->price }}</td>
                              <td class=" py-3">{{ $ingredient->weight }}</td>
                              <td class=" py-3">{{ $ingredient->g_price }}</td>
                              <td class=" py-3">{{ $ingredient->p_date }}</td>
                              <td class=" py-3">{{ $ingredient->p_camp }}</td>
                              <td>編集</td>
                            </tr>
                            @endforeach
                            <tr>
                                <form method="post" action="{{route('ingredients.store')}}">
                                @csrf
                                    <td><input type="text" name="name" value=""></td>
                                    <td><input id="price" type="number" name="price" value=""></td>
                                    <td><input id="weight" type="number" name="weight" value=""></td>
                                    <td><input id="g_price" type="text" step="0.01" name="g_price" value=""></td>
                                    <td><input type="date" name="p_date" value=""></td>
                                    <td>
                                        <select name="p_camp" value="">
                                           <option>テスト物産</option>
                                           <option>鈴木物産</option>
                                           <option>田中物産</option>
                                        </select>
                                    <td><button class="text-white bg-indigo-400 border-0 p-4 focus:outline-none hover:bg-indigo-600 rounded" type="submit">追加</button></td>
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
            console.log(weight);
            let price = document.getElementById('price').value;
            console.log(price);
            let g_price = document.getElementById('g_price');

            g_price.value = price / weight
            // g_price.value = Math.round(((price / weight) * 100) / 100) ;
            console.log(g_price.value);
        });



    });



    </script>
  </x-app-layout>
