<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4">
                マイページ
            </h2>
        </div>
    </x-slot>
    {{-- マイページ（自分が投稿した記事のみ表示） --}}
    <div class="mx-auto px-6 mt-5">
        <x-message :message="session('message')" />
        @foreach($posts as $post)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                件名：
                    <a href="{{route('post.mypage.show', $post)}}" class="text-blue-600">
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
        <x-primary-button class="bg-green-800 mt-4 ml-2">
            <a href="{{route('post.index')}}">
                一覧表示へ戻る
            </a>
        </x-primary-button>
    </div>
</x-app-layout>