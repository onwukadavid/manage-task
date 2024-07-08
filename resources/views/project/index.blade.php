<x-index-layout>
  <x-slot:header>
    <x-page-header>
      <x-slot:title>
        Projects
    </x-slot:title>
    
    {{-- <x-link-button href="{{ route('create-project') }}" class="dark:bg-gray-800">
      New project
    </x-link-button> --}}
    <x-button id="openModalButton" class="dark:bg-gray-800 dark:border-gray-600">Add Project</x-button>

    </x-page-header>
  </x-slot>

  @session('message')
    <x-notification>
      {{ $value }}
    </x-notification>
  @endsession

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
            @foreach($project->tasks->slice(0,3) as $task)
              @php
                $status = $task->status;
                if($status=='not started'){
                  $statusClass='bg-gray-200 text-gray-800';
                }elseif($status=='ongoing'){
                  $statusClass='bg-blue-200 text-blue-800';
                }else{
                  $statusClass='bg-green-200 text-green-800';
                }
              @endphp
              <div class="flex justify-between items-center mb-2">
                  <p class="text-sm font-bold">{{ $task->title }}</p>
                  <div class="flex space-x-2">
                      <x-status class="{{ $statusClass }}">{{ $task->status }}</x-status>
                  </div>
              </div>
            @endforeach
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

  <x-modal>
    <form id="modalForm" action="{{ route('store-project') }}" method="POST">
      @csrf
      <h2 class="text-2xl mb-1">New Project</h2>
      <div class="border-b border-gray-900/10 mb-1"></div>

      <div>
        <div>
          <div class="grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-6">
  
           <div class="sm:col-span-2 sm:col-start-1">
               <x-form.label for="title">Title</x-form.label>
               <x-form.input type="text" name="title" id="title" autocomplete="address-level2" value="{{ old('title') }}" />
               <x-form.error name="title" />
           </div>
   
           <div class="col-span-full">
            <x-form.label for="description">Description</x-form.label>
            <x-form.textarea-layout id="description" name="description" rows="3" >{{ @old('description') }}</x-form.textarea-layout>
            <x-form.error name="description" />
           </div>
          </div>
      </div>
  
      <div class="border-b border-gray-900/10 pb-3"></div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" id="closeModalButton" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </div>
    </form>
  </x-modal>

</x-index-layout>