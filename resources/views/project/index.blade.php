<x-index-layout>
  <x-slot:header>
    <x-page-header>
      <x-slot:title>
        Projects
    </x-slot:title>
    
    <x-flex-button-nav>
      <x-link-button href="{{ route('create-project') }}" class="dark:bg-gray-800">
        New project
      </x-link-button>
      <button id="toggleSidebar" class="text-gray-500 p-2 focus:outline-none">
        <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
    </x-flex-button-nav>

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

  <x-sidebar>
    <h2 class="text-xl font-bold mb-4">Projects</h2>
    <ul>
        <li class="mb-2">
            <button class="w-full text-left focus:outline-none" onclick="toggleTasks('project1')">
                Project 1
            </button>
            <ul id="project1" class="ml-4 hidden">
                <li class="mt-2">Task 1</li>
                <li class="mt-2">Task 2</li>
            </ul>
        </li>
    </ul>
  </x-sidebar>
</x-index-layout>