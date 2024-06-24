<x-index-layout>
  <x-slot:header>
    <x-page-header>
      <x-slot:title>
        Projects
    </x-slot:title>
    
    <x-link-button href="{{ route('create-project') }}" class="dark:bg-gray-800">
      New project
    </x-link-button>

    </x-page-header>
  </x-slot>

  <x-card.card-layout>
    @foreach($projects as $project)
      <div class="h-80 bg-white rounded-lg shadow-md p-4 transform transition-transform duration-300 hover:scale-105 flex flex-col justify-between">
        <div>
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-bold"><a href={{ route('show-project', [$project->id]) }}>{{ $project->title }}</a></h2>
            </div>
            <p class="text-sm text-gray-600 mb-4">
              {{ $project->description_preview }}
              <a href="" class="text-blue-500">See more</a>
            </p>
            <span class="font-bold text-gray-600">Tasks: </span>
            <span class="text-xs text-gray-600">5/10 tasks completed</span>
            <div class="flex justify-between items-center mb-2">
                <p class="text-sm font-bold">test1</p>
                <div class="flex space-x-2">
                    <x-status class="bg-green-200 text-green-800">Done</x-status>
                </div>
            </div>
            <div class="flex justify-between items-center mb-2">
                <p class="text-sm font-bold">test1</p>
                <div class="flex space-x-2">
                    <x-status class="bg-blue-200 text-blue-800">Ongoing</x-status>
                </div>
            </div>
            <div class="flex justify-between items-center mb-2">
                <p class="text-sm font-bold">test1</p>
                <div class="flex space-x-2">
                    <x-status class="bg-gray-200 text-gray-800">Not started</x-status>
                </div>
            </div>
        </div>
        <div class="flex justify-between items-end">
            <span class="text-xs text-gray-500">Last update: 2024-06-17 18:48:32</span>
            <div class="flex -space-x-2">
              <x-card.card-image src="https://via.placeholder.com/150"/>
              <x-card.card-image src="https://via.placeholder.com/150"/>
              <x-card.card-image src="https://via.placeholder.com/150"/>
            </div>
        </div>
      </div>
    @endforeach
  </x-card.card-layout>

</x-index-layout>