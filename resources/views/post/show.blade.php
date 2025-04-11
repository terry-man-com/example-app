    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            個別表示
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    {{ $post->title }}
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{ $post->body }}
                </p>
                <div class="text-sm font-semibold flex flex-row-reverse">
                    <p>
                        {{ $post->created_at }}
                    </p>
                </div>
            </div>
        </div>
                <a href="{{route('post.index')}}" class="inline-block bg-green-800 text-white py-2 px-4 rounded-md mt-4 ml-2 hover:bg-green-700">
                    戻る
                </a>
    </div>
</x-app-layout>
<script src="{{ asset('js/main.js') }}"></script>