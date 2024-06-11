<x-index-layout>
  <x-slot:header>
    <x-page-header>Tasks</x-page-header>
  </x-slot>

  <x-card.card-layout>
    @foreach($tasks as $task)
    <div class="h-80 bg-white rounded-lg shadow-md p-4 transform transition-transform duration-300 hover:scale-105 flex flex-col justify-between">
      <div>
          <div class="flex justify-between items-center mb-2">
              <h2 class="text-lg font-bold">{{ $task->title }}</h2>
              <div class="flex space-x-2">
                  <span class="text-xs bg-green-200 text-green-800 rounded-full px-2 py-1 font-bold">{{ $task->status }}</span>
                  <span class="text-xs bg-red-200 text-red-800 rounded-full px-2 py-1 font-bold">{{ $task->importance }}</span>
              </div>
          </div>
          <p class="text-sm text-gray-600 mb-4">{{ $task->content }}<a href="#" class="text-blue-500">See more...</a></p>
      </div>
      <div class="flex justify-between items-end">
          <span class="text-xs text-gray-500">Last update: {{ $task->updated_at }}</span>
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