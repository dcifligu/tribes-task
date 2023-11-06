<aside
    class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
    <div>
        <div class="-mx-6 px-6 py-4">
            <a href = "" title="home">
                <img src={{ URL('Images/Tribes-logo.svg') }} class="w-32" alt="logo">
            </a>
        </div>

        <div class="mt-8 text-center">
            <img src={{ URL('Images/User-Icon.svg') }} alt=""
                class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
            <!-- Pass the users name -->
            <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">{{ $user->name }}</h5>
            <span class="hidden text-gray-400 lg:block">User</span>
        </div>

        <ul class="space-y-2 tracking-wide mt-8">
            <li>
                <a href="{{ route('user.dashboard', ['id' => request('id')]) }}"
                    class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-sky-600 bg-gray-100 hover:text-white hover:bg-cyan-600">
                    <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                            class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                        <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                            class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                        <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                            class="fill-current group-hover:text-sky-300"></path>
                    </svg>
                    <span class="-mr-1 font-medium">Dashboard</span>
                </a>
            </li>
            <li>
                <button @click="modalOpen = true"
                    class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gray-600 hover:bg-cyan-600 w-full">
                    <span class="-mr-1 font-medium">+ Create New Task</span>
                </button>
            </li>
        </ul>
    </div>

    <div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:text-cyan-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
