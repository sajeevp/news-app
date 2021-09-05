@extends('layouts.app')

@section('content')
    <div class="h-5/6 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="{{ asset('images/logo-icon.png') }}" alt="News App">
                <h2 class="mt-6 text-center text-2xl font-semibold text-gray-900">
                    Sign in to your account
                </h2>
            </div>
            @if (session('error'))
                <div class="bg-red-500 rounded-lg p-4 w-full border-2 text-white">{{ session('error') }}</div>
            @endif
            <form class="mt-4" action="{{ route('login') }}" method="post">
                @csrf
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
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Forgot your password?
                        </a>
                    </div>
                </div>
                <div class="mt-4">
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
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
