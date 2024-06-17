<x-index-layout>
  <x-slot:header>
    <x-page-header>
      <x-slot:title>
        Projects
    </x-slot:title>
    
    <x-flex-button-nav>
      <x-link-button class="dark:bg-gray-800">
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