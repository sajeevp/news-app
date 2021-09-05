@extends('layouts.app')

@section('content')
    <div class="mx-auto md:w-3/5">
        <div class="bg-white p-5 my-5 rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold">News Home</h2>
            @auth
                <form action="{{ route('news.add') }}" method="post" class="my-5">
                    @csrf
                    <div class="mb-4">
                        <textarea name="body" id="body" rows="2"
                            class="p-4 w-full border-2 shadow-sm rounded-lg @error('body') border-red-500 @enderror"
                            placeholder="Post something!"></textarea>
                        @error('body')
                            <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="w-40 py-2 px-4 text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700">
                            Post
                        </button>
                    </div>
                </form>
            @endauth
            @guest
                <p class="pt-4"><a class="text-blue-500" href="{{ route('login') }}">Login</a> to post your news!</p>
            @endguest
        </div>
        @if ($news->count())
            <x-news_listing :news="$news" />
        @else
            <p class="bg-indigo-100 p-4">No news yet!</p>
        @endif
    </div>
@endsection
