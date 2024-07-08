<x-index-layout>
    <x-slot:header>
        <x-page-header>
            <x-slot:title>
                Task - {{ $task->title }}
            </x-slot>
            <div>
                <x-link-button class="dark:bg-gray-800 dark:border-gray-600" href="/task/{{ $task->id }}/edit">Edit task</x-link-button>
                <x-button class="dark:bg-red-600 dark:border-red-600" form="delete-form">Delete task</x-button>
            </div>
        </x-page-header>
    </x-slot>

    <p class="mb-4">
        {{ $task->content }}
    </p>

    <form method="POST" action="/task/{{ $task->id }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</x-index-layout>