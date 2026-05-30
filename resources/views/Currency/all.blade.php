<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Currencies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full bg-blue-950">
    <header class="w-full border-b dark:border-[#ffffff35] z-50 p-3 flex items-center justify-between sticky top-0 left-0 text-sm backdrop-blur-md not-has-[nav]:hidden">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-white dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-white border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-white dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
    <div class="flex w-full flex-col items-center justify-center gap-4 p-5 dark:text-white">
        <div class="text-center space-y-3 p-4">
            <h1 class="font-bold text-amber-400 text-2xl md:text-3xl font-sans">Today's Rate</h1>
            <p class="text-base md:text-xl font-light font-sans">Here is the full currencies records.</p>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mx-auto max-w-5xl gap-4 p-3">
            @foreach ($currencies as $currency)
                <div class="grid max-h-32 max-w-fit grid-cols-2 hover:bg-white/30 p-5 rounded-lg dark:text-white grid-rows-2 gap-0">
                    <img src="/images/coin.png" class="h-full animate-scale w-fit rounded-full col-span-1 row-span-2" alt="">
                    <h1 class=" text-xl font-bold text-center">
                        {{ $currency->name }}</h1>
                        <span class="text-center">
                        {{ $currency->rate }}
                        </span>
                </div>
            @endforeach
        </div>
    </div>
    <livewire:footer /> 
</body>
</html>