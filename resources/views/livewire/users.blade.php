<div class="w-2/3 m-auto my-10">
    <div class="mb-5">
        <h1 class="text-3xl font-semibold">{{ $title }}</h1>
        <p class="text-[#706f6c]">Jumlah User :{{ $users->count() }}</p>
        <button wire:click="createUser" type="button"
            class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
            Create User
        </button>
    </div>
    <hr class="border-t border-gray-400">
    @foreach ($users as $user)
        <ul class="list-disc">
            <li class="p-2">{{ $user->name }}</li>
        </ul>
    @endforeach


</div>
