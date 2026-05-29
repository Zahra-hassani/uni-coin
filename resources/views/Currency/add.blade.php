<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Currencies</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="flex w-full bg-blue-900 dark:text-white h-screen justify-center items-center">
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <div class="text-stone-200 py-2 px-5 rounded-lg absolute top-5 right-4 bg-red-600">{{ $err }}</div>
            @endforeach
        @endif
        <div class="h-fit p-4 bg-white w-5/12  rounded-2xl">
            <form action="{{ URL('/currency/add') }}" method="post" enctype="multipart/form-data" class="h-full w-full flex flex-col items-center gap-4 p-3">
                @csrf
                @method('POST')
                <div class="w-full h-[90%] bg-stone-200 rounded-xl flex flex-col items-center gap-4 p-5 border border-dashed border-stone-500">
                    <img src="/images/folder.png" class="h-10 w-12" alt="">
                    <p class="text-black text-center font-semibold w-8/12">Select the currencies Excel sheet and upload.</p>
                    {{-- <span class="uppercase relative text-gray-400 before:content-[''] before:h-px before:w-19 before:absolute before:top-[50%] before:-left-20 before:bg-gray-400 after:content-[''] after:h-px after:w-19 after:absolute after:top-[50%] after:-right-20 after:bg-gray-400">or</span> --}}
                    <input type="file" name="excel" id="excel" class="border w-full rounded-lg px-3 text-black file:border-0 py-1.5 file:rounded-xs">
                    <button type="submit" class="font-bold px-6 py-1.5 bg-stone-200 rounded-md border dark:border-white dark:bg-blue-700 hover:bg-blue-800">Upload</button>
                </div>
                {{-- <h1 class="font-bold dark:text-white text-2xl text-center py-4">Add Today's Rate</h1> --}}
                {{-- <div class="w-full flex flex-col space-y-2">
                    <label for="excel">Choose The Excel file:</label>
                    <input accept="file/*" required type="file" name="excel" id="excel" class="py-2 px-3 border focus:border-0 focus:outline-indigo-600 focus:outline-2 rounded-lg">
                </div> --}}
            </form>
        </div>
    </div>
</body>
</html>