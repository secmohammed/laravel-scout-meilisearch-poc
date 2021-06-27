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
                    <form action="/search" method="GET" class="space-y-2 mb-6">
                        <div class="flex items-baseline space-x-2">
                        <x-select name="user_id" id="user_id">
                            <option value="">Any User</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == request()->get('user_id') ? 'selected': ''}}>{{ $user->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input id="query" name="query" type="search" value="{{ request()->get('query') }}" placeholder="search for something..." class="block w-full" />
                            
                        </div>
                        <x-button>Search</x-button>
                    </form>
                    @if($results)
                        <div class="space-y-4">
                            @if($results->count())
                                @foreach ($results as $result)
                                    <div>
                                        <h1 class="text-lg font-semibold">{{ $result->title }} #{{ $result->id }} </h1>
                                        <p> {{ $result->teaser }}</p>
                                        <p>{{ $result->user->name }} </p>
                                    </div>
                                @endforeach
                                {{ $results->links() }}
                            @else
                                <p>No Results Found!</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
