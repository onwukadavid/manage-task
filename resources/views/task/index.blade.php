<x-index-layout>
  <x-slot:header>
    <x-page-header>Tasks</x-page-header>
  </x-slot>

  <x-card.card-layout>
    <div class="h-80 bg-white rounded-lg shadow-md p-4 transform transition-transform duration-300 hover:scale-105 flex flex-col justify-between">
      <div>
          <div class="flex justify-between items-center mb-2">
              <h2 class="text-lg font-bold">Task Title</h2>
              <div class="flex space-x-2">
                  <span class="text-xs bg-green-200 text-green-800 rounded-full px-2 py-1 font-bold">Done</span>
                  <span class="text-xs bg-red-200 text-red-800 rounded-full px-2 py-1 font-bold">High</span>
              </div>
          </div>
          <p class="text-sm text-gray-600 mb-4">This is a brief description of the task. It gives an overview of what needs to be done. <a href="#" class="text-blue-500">See more...</a></p>
      </div>
      <div class="flex justify-between items-end">
          <span class="text-xs text-gray-500">Last update: 2024-06-01</span>
          <div class="flex -space-x-2">
            <x-card.card-image src="https://via.placeholder.com/150"/>
            <x-card.card-image src="https://via.placeholder.com/150"/>
            <x-card.card-image src="https://via.placeholder.com/150"/>
          </div>
      </div>
  </div>
  </x-card.card-layout>
</x-index-layout>