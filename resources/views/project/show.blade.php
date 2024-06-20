<x-index-layout>
    <x-slot:header>
        <x-page-header>
            <x-slot:title>
                Project ~ {{ $project->title }}
            </x-slot:title>

            <x-link-button href="{{ route('create-project-task', [$project->id]) }}" class="dark:bg-gray-800">
                New Task
              </x-link-button>
        </x-page-header>
    </x-slot:header>

    <x-card.card-layout>
        @foreach($project->tasks as $task)
            @php
            $status = $task->status;
            if($status=='not started')
            {
            $statusClass='bg-gray-200 text-gray-800';
            }elseif($status=='ongoing'){
            $statusClass='bg-blue-200 text-blue-800';
            }else{
            $statusClass='bg-green-200 text-green-800';
            }
    
            $priority = $task->priority;
            if($priority=='low')
            {
            $priorityClass='bg-green-200 text-green-800';
            }elseif($priority=='medium'){
            $priorityClass='bg-yellow-200 text-yellow-800';
            }else{
            $priorityClass='bg-red-200 text-red-800';
            }
            @endphp
            <div class="h-80 bg-white rounded-lg shadow-md p-4 transform transition-transform duration-300 hover:scale-105 flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-lg font-bold"><a href="/tasks/show/{{ $task->id }}">{{ $task->title }}</a></h2>
                    <div class="flex space-x-2">
                        <x-status class={{$statusClass}}>{{ $task->status }}</x-status>
                        <x-status class={{$priorityClass}}>{{ $task->priority }}</x-status>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mb-4">{{ $task->content_preview }}<a href="/tasks/show/{{ $task->id }}" class="text-blue-500">See more</a></p>
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