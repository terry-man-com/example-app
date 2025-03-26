<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        編集
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="mt-8 text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        <form method="post" action="{{ route('post.update', $post) }}">
            @csrf
            @method('patch')
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">件名</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <input type="text" id="title" name="title" class="w-auto py-2
                    border border-grey-300 rounded-md" value="{{ old('title', $post->title) }}">
                </div>
                 <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold mt-4">本文</label>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    <textarea id="body" name="body" class="w-auto py-2border border-grey-300 rounded-md" cols="30" rows="5">{{ old('body', $post->body) }}</textarea>
                </div>
                <div class="flex">
                    <x-primary-button class="mt-4">
                        更新する
                    </x-primary-button>
                    <x-primary-button type="button" class="bg-green-800 mt-4 ml-2">
                        <a href="{{route('post.show', $post)}}">
                            戻る
                        </a>
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>