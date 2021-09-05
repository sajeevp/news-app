@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-4 gap-4 my-5">
        <div class="bg-white p-5">
            <div class="text-center">
                @if (auth()->user()->profile_pic)
                    <img class="mx-auto w-3/4 h-auto rounded-full"
                        src="{{ asset('userPicture/' . auth()->user()->profile_pic) }}" alt="Profile Picture">
                @else
                    <x-heroicon-o-user-circle class="w-2/5 h-2/5 text-indigo-800 m-auto" />
                @endif
            </div>
            <form id="form" action="{{ route('user.picture') }}" method="POST" enctype="multipart/form-data"
                class="text-center">
                @csrf
                <label class="float-right cursor-pointer -mt-3">
                    <x-heroicon-s-pencil-alt class="w-5 h-5 text-green-500" />
                    <input type="file" id="file" name="file" hidden>
                </label>
                @error('file')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </form>
            <h2 class="text-2xl font-semibold text-center pt-2">{{ auth()->user()->name }}</h2>
        </div>
        <div class="col-span-3 bg-white p-5">
            <h2 class="text-2xl font-semibold">My News</h2>
            @if ($news->count())
                <x-news_listing :news="$news" />
            @else
                <p class="bg-indigo-100 p-4">You have no news yet!</p>
            @endif
        </div>
    </div>
    <script>
        document.getElementById("file").onchange = function() {
            document.getElementById("form").submit();
        }
    </script>
@endsection
