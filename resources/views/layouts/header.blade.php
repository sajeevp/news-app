<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <img class="block h-6 w-auto" src="{{ asset('images/logo.png') }}" alt="Workflow">
                    </a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    @auth
                        <div class="flex space-x-4">
                            <a href="{{ route('dashboard') }}"
                                class="{{ request()->routeIs('dashboard') ? 'bg-gray-900' : '' }} text-white px-3 py-2 rounded-md text-sm font-medium font-sans"
                                aria-current="page">Dashboard</a>
                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">News
                                Makers</a>
                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">News</a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="flex space-x-4">
                    @guest
                        <a href="{{ route('register') }}"
                            class="{{ request()->routeIs('register') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                        <a href="{{ route('login') }}"
                            class="{{ request()->routeIs('login') ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    @endguest
                    @auth
                        <p class="text-white px-3 py-2 text-sm font-medium">Hi, {{ auth()->user()->name }}</p>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium"
                                type="submit">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>
