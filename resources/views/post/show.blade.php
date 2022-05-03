<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
        </div>
    </div>

    
    <h1 class="text-2xl font-bold">Comment</h1>

    
    <div class="p-6 bg-white border-b border-gray-200">
        <form action="{{route('comment.store', $post)}}" method="POST">
            @csrf
            <textarea name="comment" id="" rows="5" placeholder="content "></textarea>
            <br>
            <input type="submit" value="Save">
        </form>
    </div>

    @forelse ($post->comments as $comment)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
            <div class="p-6 bg-white border-b border-gray-200">
                <span class="border-b text-blue-600 font-bold text-xl">
                    {{ $comment->user->name}}
                </span>
                <span class="ml-4 text-gray-400">
                    {{$comment->created_at->diffForHumans()}}
                </span>
                <span class="block text-lg p-2">
                    {{$comment->comment}}
                </span>
                <span class="ml-4">
                    <a href="{{route('comment.edit', $comment->id)}}" class="">Edit</a>
                </span>
                <form action="{{route('comment.destroy', $comment->id)}}" method="post">
                    @csrf @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-error">
                </form>
            </div>
        </div>
    @empty
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
            <div class="p-6 bg-white border-b border-gray-200">
                    Nothing
            </div>
        </div>
    @endforelse 

</x-app-layout>