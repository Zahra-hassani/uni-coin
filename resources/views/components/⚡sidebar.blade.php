<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <div class="w-full flex flex-col gap-1 bg-blue-900 dark:text-white col-span-1 h-screen">
            <h2 class="font-semibold p-4 w-full text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
            </h2>
            <a href="/dashboard" class="p-4 hover:bg-white/30 w-full"><i class="fa-solid fa-coins"></i> All Currency</a>
            <a href="/dashboard/exchanger" class="p-4 hover:bg-white/30 w-full flex gap-2"><img src="/images/exchange.png" class="h-6 w-6" alt="">Currency Exchanger</a>
        </div>
    {{-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius --}}
</div>