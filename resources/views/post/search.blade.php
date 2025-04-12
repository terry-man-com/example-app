<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4">
                検索結果
            </h2>
            <form method="get" action="{{ route('post.search') }}">
                <input type="text" name="keyword" value="{{ old("keyword", $keyword) }}"></input>
                <x-primary-button>
                <input type="submit" value="検索"></input>
                </x-primary-button>
            </form>
        </div>
    </x-slot>

    <div class="mx-auto px-6">
        @if (session('alertMessage'))
            <div class="text-red-600">
                {{ session('alertMessage') }}
            </div>
        @endif
        @foreach($posts as $post)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                件名：
                    <a href="{{route('post.show', $post)}}" class="text-blue-600">
                        {{ $post->title }}
                    </a>
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{ $post->body }}
            </p>
            <div class="p-4 text-sm font-semibold">
                <p>
                    {{ $post->created_at }} / {{ $post->user->name??'匿名' }}
                </p>
            </div>
        </div>
        @endforeach
        <div class="mb-4 mt-4">
            {{ $posts->links() }}
        </div>
        <x-primary-button type="button" class="bg-green-800 mt-4 ml-4 mb-4">
            <a href="{{route('post.index')}}">
                一覧表示へ戻る
            </a>
        </x-primary-button>
    </div>
</x-app-layout>