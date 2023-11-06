<div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
    <div class="w-full p-2">
        <div
            class="flex flex-col h-full px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
            <div class="flex flex-row justify-between items-center">
                <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                {{ $count }}</h1>
            <div class="flex flex-row justify-between group-hover:text-gray-200">
                <p>Tasks Count</p>
                <span>
                </span>
            </div>
        </div>
    </div>
    <div class="w-full p-2 col-span-2">
        <div
            class="flex flex-col h-full px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
            <div class="flex flex-row gap-4 lg:grid-cols-3 lg:gap-8">
                <div class="flex flex-col w-3/4">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30 w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                        </svg>
                    </div>
                    <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                        Tasks by status</h1>
                </div>
                <span class="h-11/12 bg-slate-300 w-px"></span>
                <div class="flex flex-col w-fit gap-2">
                    <span class="flex items-center justify-start rounded-full bg-sky-100 px-2.5 py-0.5 text-sky-700">
                        <i class="fa-regular fa-clipboard mx-1"></i>
                        <p class="whitespace-nowrap text-sm">Open</p>
                        <p class="text-right w-full mx-2">{{ $open }}</p>
                    </span>

                    <span
                        class="flex items-center justify-start rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700">
                        <i class="fa-solid fa-pause mx-1"></i>
                        <p class="whitespace-nowrap text-sm">Pending</p>
                        <p class="text-right w-full mx-2">{{ $pending }}</p>
                    </span>

                    <span
                        class="flex items-center justify-start rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700">
                        <i class="fa-solid fa-bars-progress mx-1"></i>
                        <p class="whitespace-nowrap text-sm">In Progress</p>
                        <p class="text-right w-full mx-2">{{ $inProgress }}</p>
                    </span>

                    <span
                        class="flex items-center justify-start rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700">
                        <i class="fa-solid fa-magnifying-glass mx-1"></i>
                        <p class="whitespace-nowrap text-sm">In Review</p>
                        <p class="text-right w-full mx-2">{{ $inReview }}</p>
                    </span>

                    <span
                        class="flex items-center justify-start rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700">
                        <i class="fa-solid fa-check mx-1"></i>
                        <p class="whitespace-nowrap text-sm">Accepted</p>
                        <p class="text-right w-full mx-2">{{ $accepted }}</p>
                    </span>

                    <span class="flex items-center justify-start rounded-full bg-red-100 px-2.5 py-0.5 text-red-700">
                        <i class="fa-solid fa-x mx-1"></i>
                        <p class="whitespace-nowrap text-sm">Rejected</p>
                        <p class="text-right w-full mx-2">{{ $rejected }}</p>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
