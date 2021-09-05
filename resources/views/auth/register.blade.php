@extends('layouts.app')

@section('content')
    <div class="h-5/6 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="{{ asset('images/logo-icon.png') }}" alt="News App">
                <h2 class="mt-6 text-center text-2xl font-semibold text-gray-900">
                    Register your account
                </h2>
            </div>
            <form class="mt-8" action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" name="name" type="text"
                        class="p-4 w-full border-2 shadow-sm rounded-lg @error('name') border-red-500 @enderror"
                        placeholder="Name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input id="username" name="username" type="text"
                        class="p-4 w-full border-2 shadow-sm rounded-lg @error('username') border-red-500 @enderror"
                        placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email"
                        class="p-4 w-full border-2 shadow-sm rounded-lg @error('email') border-red-500 @enderror"
                        placeholder="Email address" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password"
                        class="p-4 w-full border-2 shadow-sm rounded-lg @error('password') border-red-500 @enderror"
                        placeholder="Password">
                    @error('password')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="p-4 w-full border-2 shadow-sm rounded-lg @error('password_confirmation') border-red-500 @enderror"
                        placeholder="Confirm Password">
                    @error('password_confirmation')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign Up
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
