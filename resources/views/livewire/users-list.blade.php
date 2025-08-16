<div class="w-1/3 my-10">
    <div class="mx-auto mb-4">
        <h2 class="mt-1 text-center text-2xl/9 font-bold tracking-tight text-gray-900">List User
        </h2>
    </div>

    <form class="max-w-full mx-auto">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input wire:model.live.debounce.250ms="query" type="search" id="default-search" autocomplete="off"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                placeholder="Search Users" />
        </div>
    </form>

    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($users as $user)
            <li wire:poll.keep-alive class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/avatar.png') }}"
                        alt="" class="size-12 flex-none rounded-full bg-gray-50 object-contain" />
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm/6 font-semibold text-gray-900">{{ $user->name }}</p>
                        <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="mt-1 text-xs/5 text-gray-500">Joined {{ $user->created_at->diffForHumans() }}
                    </p>
                </div>
            </li>
        @endforeach

    </ul>
    <div>
        {{ $users->links() }}
    </div>
</div>
