<x-index-layout>
    <x-slot:header>
        <x-page-header>
            <x-slot:title>
                Project ~ {{ $project->title }}
            </x-slot:title>

            <x-flex-button-nav>
                <x-button class="dark:bg-red-600 dark:border-red-600" form="delete-form">Delete project</x-button>
                {{-- <x-link-button href="{{ route('create-project-task', [$project->slug]) }}" class="dark:bg-gray-800">
                    New Task
                </x-link-button> --}}
                <x-button id="openModalButton" class="dark:bg-gray-800 dark:border-gray-600">Add Task</x-button>

                <button id="toggleSidebar" class="text-gray-500 p-2 focus:outline-none">
                  <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                  </svg>
              </button>
            </x-flex-button-nav>
        </x-page-header>
    </x-slot:header>

    @session('message')
      <x-notification>
        {{ $value }}
      </x-notification>
    @endsession

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
                    <h2 class="text-lg font-bold"><a href="/tasks/show/{{ $task->slug }}">{{ $task->title }}</a></h2>
                    <div class="flex space-x-2">
                        <x-status class={{$statusClass}}>{{ $task->status }}</x-status>
                        <x-status class={{$priorityClass}}>{{ $task->priority }}</x-status>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mb-4">{{ $task->content_preview }}<a href="/tasks/show/{{ $task->slug }}" class="text-blue-500">See more</a></p>
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
        <h2 class="text-xl font-bold mb-4"><a href={{ route('project') }}>Projects</a></h2>
        <ul>
          @foreach($projects as $project)
            <li class="mb-2">
                <div class="flex item-center">
                    <a href={{ route('show-project', [$project->slug]) }} class="flex-grow">
                        {{ $project->title }}
                    </a>
                    <button class="text-gray-500 focus:outline-none" onclick="toggleTasks('{{$project->slug}}')">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 15.6L5.2 8.8L6.8 7.2L12 12.4L17.2 7.2L18.8 8.8L12 15.6Z" fill="black"/>
                        </svg>
                    </button>
                </div>
                <ul id="{{$project->slug}}" class="ml-4 hidden">
                  @foreach($project->tasks as $task)
                    <li class="mt-2">{{ $task->title }}</li>
                  @endforeach
                </ul>
            </li>
          @endforeach
        </ul>
      </x-sidebar>

      <x-modal>
        <form id="modalForm" action="{{ route('store-project-task', [$project->slug]) }}" method="POST">
          @csrf
          <h2 class="text-2xl mb-1">New Task</h2>
          <div class="border-b border-gray-900/10 mb-1"></div>
    
          <div>
            <x-create-task-form />
          
            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" id="closeModalButton" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
          </div>
        </form>
      </x-modal>

      <form method="POST" action="/project/{{ $project->slug }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</x-index-layout>