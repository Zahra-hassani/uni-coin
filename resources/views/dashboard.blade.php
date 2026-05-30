<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="grid w-full grid-cols-5 gap-2">
        <livewire:sidebar />
        {{-- main content section (currencies) --}}
        <div class="w-full col-span-4 p-2">
            {{-- currencies --}}
            <livewire:currencies />
        </div>
    </div>

</x-app-layout>
