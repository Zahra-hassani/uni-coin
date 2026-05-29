<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="grid w-full grid-cols-5 gap-2">
        <div class="w-full flex flex-col gap-1 bg-blue-900 dark:text-white col-span-1 h-screen">
            <h2 class="font-semibold p-4 w-full text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
            </h2>
            <a href="#" class="p-4 hover:bg-white/30 w-full">All Currency</a>
            <a href="#" class="p-4 hover:bg-white/30 w-full">Currency Exchanger</a>
        </div>
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
