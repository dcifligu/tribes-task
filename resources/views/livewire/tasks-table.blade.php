<div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
    <table class="min-w-full">
        <thead>
            <tr>
                <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    ID</th>
                <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Title</th>
                <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Description</th>
                <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Status</th>
                <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Tags</th>
                <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>

        <tbody class="bg-white">
            @foreach ($tasks as $task)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <span class="text-sm leading-5 font-medium text-gray-300">{{ $task->id }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <span class="text-sm leading-5 font-medium text-gray-900">{{ $task->title }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <span
                            class="text-sm leading-5 font-medium text-gray-900">{{ Str::limit($task->description, 20) }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <span
                            class="text-sm leading-5 font-medium
                                @if ($task->status === 'Open') px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-sky-100 text-sky-800
                                @elseif ($task->status === 'In Review' || $task->status === 'In Progress' || $task->status === 'Pending')
                                    px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-300 text-orange-800
                                @elseif ($task->status === 'Rejected')
                                    px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-red-800
                                @elseif ($task->status === 'Accepted')
                                    px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-300 text-emerald-800
                                @else
                                    text-gray-900 @endif
                            ">{{ $task->status }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <span class="text-sm leading-5 font-medium text-gray-900">
                            @foreach ($task->tags as $tag)
                                <span
                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    {{ $tag->name }}
                                </span>
                                @if ($loop->iteration >= 3)
                                    {{-- Limit the number of displayed tags to 3 --}}
                                @break
                            @endif
                        @endforeach
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 flex flex-row">
                    <a href="{{ route('tasks.edit', ['id' => Auth::id(), 'taskID' => $task->id]) }}">
                        <i
                            class="mx-2 fa-solid fa-pen text-sky-300 bg-sky-100 rounded-full p-2 hover:text-sky-600"></i>
                    </a>
                    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this task?')">
                            <i
                                class="mx-2 fa-solid fa-trash text-red-300 bg-red-100 rounded-full p-2 hover:text-red-600"></i>
                        </button>
                    </form>
                    <a href="{{ route('user.dashboard.viewTask', ['id' => Auth::id(), 'taskID' => $task->id]) }}">
                        <i
                            class="mx-2 fa-solid fa-eye text-gray-300 bg-gray-100 rounded-full p-2 hover:text-gray-600"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
