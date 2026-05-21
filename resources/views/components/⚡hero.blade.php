<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="h-screen bg-blue-900 w-full relative bg-[url(/images/hero-2.png)] px-5 flex flex-col items-start justify-center gap-4">
    <img src="./images/hero-1.jpg" class="h-full w-full absolute top-0 left-0 -z-30" alt="hero">
    <h1 class="dark:text-white font-bold text-2xl md:text-3xl lg:text-4xl">Exchange Rates</h1>
    <p class="text-white/80 font-sans">Get The Latest Rates of most popular currencies to Afghani.</p>
    <a href="/currency"><button class="hover:bg-blue-950 bg-blue-900 px-7 py-1.5 rounded-sm">Explore on Rates</button></a>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
</div>