<x-index-layout>
    <x-slot:header>
        <x-page-header>
            <x-slot:title>
                New Task
            </x-slot>
            <x-link-button href="/tasks/create" class="dark:bg-gray-800">Create task</x-link-button>
        </x-page-header>
    </x-slot>

    {{-- SWITH TO MODAL FROM THE INDEX PAGE --}}
    <form action="/tasks/store" method="POST">
        @csrf
        <div>
          <x-create-task-form />
        
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href={{route('home')}} class="text-sm font-semibold leading-6 text-gray-900">Cancel</a href=route>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
          </div>
        </div>
    </form>
</x-index-layout>