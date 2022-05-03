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
                    <form action="{{route('post.store')}}" method="POST">
                        @csrf
                        <input type="text" name="title" placeholder="title"><br>
                        <textarea name="body" id="" rows="5" placeholder="content "></textarea>
                        <br>
                        <input type="submit" value="Save">        
                    </form>
                </div>
                

                @foreach ($posts as $post)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <span class="border-b text-blue-600 font-bold text-xl">
                                {{ $post->user->name}}
                            </span>
                            <span class="ml-4 text-gray-400">
                                {{$post->title}}
                            </span>
                            <span class="block text-lg p-2">
                                {{$post->body}}
                            </span>
                            <span class="ml-4">
                                <a href="{{route('post.edit', $post->id)}}" class="">Edit</a>
                            </span>
                            <span class="ml-4">
                                <a href="{{route('post.show', $post->id)}}" class="">Show</a>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
