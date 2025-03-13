<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            フォーム
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-8">
        <form action="">
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">件名</label>
                    <input type="text" id="title" name="title" class="w-auto py-2
                    border border-grey-300 rounded-md">
                </div>
                 <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold mt-4">本文</label>
                    <textarea id="body" name="body" class="w-auto py-2
                    border border-grey-300 rounded-md" cols="30" rows="5">
                    </textarea>
                </div>

                <x-primary-button class="mt-4">
                    ボタン
                </x-primary-button>
        </form>
    </div>
</x-app-layout>
