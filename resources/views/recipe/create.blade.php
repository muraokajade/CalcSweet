<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button
                        class="text-white font-bold py-2 px-4 mt-5 uppercase rounded-3xl bg-gray-500 hover:bg-gray-600 shadow hover:shadow-lg  transition transform hover:-translate-y-0.5"
                        id="quantity">
                        材料数を増やす
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </button><br>
                    <form action="{{route('')}}"></form>
                        <div id="input" class="flex justify-around mt-5">
                            <input type="text" id="search" placeholder="検索">
                            <select placeholder="選択して下さい" id="ing_list" class="w-96" name="ing_name[]">
                        @forelse($ingredients as $ingredient)
                                <option value="">材料選択</option>
                                <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>

                        @empty
                        <p>材料が見つかりません</p>
                        @endif
                            </select>

                            <input type="number" name="amount[]" placeholder="配合量">
                            <button class="bg-gray-200 p-2">削除</button>
                        </div>
                        <div class="cloned"></div>

                    <input type="number" name="number" placeholder="取れ数">
                    <button
                        class="text-white font-bold py-2 px-4 mt-5 uppercase rounded-3xl bg-green-500 hover:bg-green-600 shadow hover:shadow-lg  transition transform hover:-translate-y-0.5">作成

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block my-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        let cloneform = $('#quantity');
        cloneform.on('click', () => {
            // let number = $('#ing_num').val();
            let items = $('#input').clone();
            console.log(items);
            // console.log(number);
            let item = items.find('option');
            console.log(item);
            $('.cloned').append(items);
            //中身を消してクローン
        });



        class ListChanger {
        constructor(idName) {
        this.selectBox = document.getElementById(idName);
    }
    change(value) {
        const items = this.selectBox.children;
        const reg = new RegExp(".*" + value + ".*", "i");

        let i;

        if ( value === ''){
	        for ( i = 0 ; i < items.length; i++) {
                items[i].style.display = "";
	        }
        	return;
        }

        for ( i = 0 ; i < items.length; i++) {
            if (items[i].textContent.match(reg)) {
                items[i].style.display = "";
            } else {
                items[i].style.display = "none";
            }
            items[i].selected = false;
        }
        // 選択状態にする
        for (i = 0; i < this.selectBox.length; i++) {
            if (this.selectBox[i].textContent.match(reg)) {
                this.selectBox[i].selected = true;
                break;
            }
        }
    }
}

const menObj = new ListChanger('ing_list');
$("#search").on('input keyup  blur',function() {
    menObj.change(this.value);
});



    </script>
</x-app-layout>
