<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('recipe.create')}}" class="text-white bg-indigo-400 border-0 p-4 focus:outline-none hover:bg-indigo-600 rounded">レシピ作成</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
