<section x-data="{ modalOpen: false }">

    <div x-show="modalOpen" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed top-0 left-0 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-slate-600 bg-opacity-60">
        <div class="flex h-screen w-full" x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">
            <div class="m-auto">
                <div>
                    <div
                        class="relative w-full flex justify-center items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize bg-black rounded-md focus:outline-none transform active:scale-95 ease-in-out">
                        <span class="pl-2 mx-1">Create new task</span>
                    </div>
                    <div class="mt-2 bg-white rounded-lg shadow">
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <div class="flex">
                                <div class="flex-1 py-5 pl-5 overflow-hidden">
                                    <h1 class="inline text-2xl font-semibold leading-none">New Task</h1>
                                </div>
                            </div>
                            <div class="px-5 pb-5">
                                <input type="text" name="title" placeholder="Task title"
                                    class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400" />
                                <textarea name="description" placeholder="Description"
                                    class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></textarea>
                                <select name="tags[]" id="tags" multiple
                                    class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                                    @foreach ($allTags as $tag)
                                        <option value="{{ $tag->id }}"
                                            @if ($task->tags->contains($tag->id)) selected @endif>{{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex">
                                <div class="flex-1 py-5 pl-5 overflow-hidden">
                                    <h1 class="inline text-2xl font-semibold leading-none">Status</h1>
                                </div>
                            </div>
                            <div class="px-5 pb-5">
                                <label class="inline text-lg font-semibold leading-none" for="status">Choose the
                                    status
                                    of the task:</label>
                                <br>
                                <select name="status"
                                    class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                                    <option value="Open">Open</option>
                                    <option value="Pending">Pending</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="In Review">In Review</option>
                                </select>
                            </div>
                            <hr class="mt-4">
                            <div class="flex flex-row-reverse p-3">
                                <div class="flex-initial pl-3">
                                    <button type="submit"
                                        class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-sky-800  focus:outline-none focus:bg-gray-900  transition duration-300 transform active:scale-95 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                            width="24px" fill="#FFFFFF">
                                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                                            <path
                                                d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z"
                                                opacity=".3"></path>
                                            <path
                                                d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z">
                                            </path>
                                        </svg>
                                        <span class="pl-2 mx-1">Save</span>
                                    </button>
                                </div>
                                <div class="flex-initial">
                                    <button @click="modalOpen = false"
                                        class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-red-200 hover:fill-current hover:text-red-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                                        X
                                        <span class="pl-2 mx-1">Close</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
