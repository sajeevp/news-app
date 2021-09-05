@props(['news' => $news])
@foreach ($news as $item)
    <div class="bg-white rounded-lg shadow-sm my-5">
        <div class="bg-blue-100 p-4 rounded-t-lg flex items-center shadow-inner shadow-xl">
            <div>
                @if ($item->user->profile_pic)
                    <img class="w-8 h-8 rounded-full"
                        src="{{ asset('userPicture/' . $item->user->profile_pic) }}" alt="Profile Picture">
                @else
                    <x-heroicon-o-user-circle class="w-8 h-8 text-indigo-800" />
                @endif
            </div>
            <div class="ml-2 text-sm font-medium text-indigo-800">{{ $item->user->name }} <span class="text-indigo-400">
                    - {{ $item->created_at->diffForHumans() }}</span></div>
        </div>
        <div class="p-4 text-sm text-gray-800">{{ $item->body }}</div>
        <div class="bg-gray-50 p-4 overflow-hidden">
            <div class="float-left flex items-center">
                <span class="pr-2">{{ $item->likes->count() }}</span>
                @guest
                    <span>
                        <x-heroicon-s-thumb-up class="w-6 h-6 text-indigo-300" />
                    </span>
                @endguest
                @auth
                    <form action="{{ route('news.like', $item->id) }}" method="post">
                        @csrf
                        <button type="submit">
                            @if ($item->likedBy(auth()->user()))
                                <x-heroicon-s-thumb-up class="w-6 h-6 text-indigo-800 hover:text-indigo-800" />
                            @else
                                <x-heroicon-s-thumb-up class="w-6 h-6 text-indigo-300 hover:text-indigo-800" />
                            @endif
                        </button>
                    </form>
                @endauth
            </div>
            <div class="float-right flex items-center">
                @can('delete', $item)
                    <form action="{{ route('news.delete', $item->id) }}" method="post">
                        @csrf
                        <button type="submit">
                            <x-heroicon-s-trash class="w-6 h-6 text-red-500 hover:text-red-800" />
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
@endforeach
<div class="pb-10">
    {{ $news->links() }}
</div>
