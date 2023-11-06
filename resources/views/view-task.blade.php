<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/9ef0b1bc57.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.css" defer>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    @livewireStyles
    @livewireScripts

</head>

<body>
    <livewire:task-form-pop-up />
    <livewire:user-side-panel />
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Dashboard</h5>
                <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="w-11/12 m-auto bg-gray-100 rounded-lg my-5 p-5">
            <h1 class="flex justify-center text-3xl text-black-50 my-3"><strong>Task Details</strong></h1>
            <p class="text-2xl text-black-50 my-5"><strong>Title:</strong>{{ $task->title }}</p>
            <p class="text-2xl text-black-50 my-5"><strong>Description:</strong> {{ $task->description }}</p>
            <p class="text-2xl text-black-50 my-5"><strong>Status:</strong> {{ $task->status }}</p>
            <p class="text-2xl text-black-50 my-5"><strong>Owner ID:</strong> {{ $task->owner_id }}</p>
            <p class="text-2xl text-black-50 my-5"><strong>Tags:</strong></p>
            @foreach ($task->tags as $tag)
                <p class="text-2xl text-black-50 my-5 inline">
                    " {{ $tag->name }} " ,
                </p>
            @endforeach
        </div>
</body>

</html>
