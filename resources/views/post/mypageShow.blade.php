    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            個別投稿
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="mt-8 text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        <div class="bg-white w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    {{ $post->title }}
                </h1>
                <div class="flex justify-end">
                    <a href="{{route('post.edit', $post)}}">
                        <x-primary-button>
                            編集
                        </x-primary-button>
                    </a>
                        <x-primary-button id="delete-button" class="bg-red-700 ml-2">
                            削除
                        </x-primary-button>
                </div>
                {{-- モーダル暗転用背景 --}}
                <div id="js-modal-bg" class="hidden bg-gray-300/60 fixed top-0 bottom-0 right-0 left-0"></div>
                {{-- モーダルウィンドウ --}}
                    <div id="js-modal-container" class="hidden absolute top-100 left-1/2 -translate-x-1/2 bg-white w-[400px] rounded-2xl">
                            <div class="p-5">
                                <p class="mb-4">
                                    本当に削除しますか？
                                </p>
                                <div class="flex justify-end w-full">
                                    <x-primary-button id="cancel-button" class="bg-grey-200">
                                        キャンセル
                                    </x-primary-button>
                                    <form method="post" action="{{route('post.destroy', $post)}}"
                                    class="flex-2 ml-2">
                                        @csrf
                                        @method('delete')
                                        <x-primary-button class="bg-red-700 ml-2">
                                            削除
                                        </x-primary-button>
                                    </form>
                                </div>
                            </div>
                    </div>
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