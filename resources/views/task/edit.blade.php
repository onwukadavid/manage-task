<x-index-layout>
    <x-slot:header>
        <x-page-header>
            <x-slot:title>
                Edit Task
            </x-slot>
            <x-link-button href="/tasks/create">Create task</x-link-button>
        </x-page-header>
    </x-slot>

    {{-- SWITH TO MODAL FROM THE INDEX PAGE --}}
    <form action="/task/{{$task->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                
                 <div class="sm:col-span-2 sm:col-start-1">
                     <x-form.label for="title">Title</x-form.label>
                     <x-form.input type="text" name="title" id="title" autocomplete="address-level2" value="{{ $task->title }}" />
                     <x-form.error name="title" />
                 </div>
             
                 <div class="col-span-full">
                  <x-form.label for="content">content</x-form.label>
                  <x-form.textarea-layout id="content" name="content" rows="3" >{{ $task->content }}</x-form.textarea-layout>
                  <x-form.error name="content" />
                 </div>
             
                 <div class="sm:col-start-1">
                  <x-form.label for="status">status</x-form.label>
                     <div class="mt-2">
                       <select id="status" name="status" autocomplete="status-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                         <option {{ ( 'not started' == $task->status) ? 'selected' : '' }}>Not started</option>
                         <option {{ ( 'ongoing' == $task->status) ? 'selected' : '' }}>Ongoing</option>
                         <option {{ ( 'done' == $task->status) ? 'selected' : '' }}>Done</option>
                       </select>
                     </div>
                     <x-form.error name="status" />
                 </div>
             
                 <div class="sm:col-start-1">
                  <x-form.label for="priority">priority</x-form.label>
                     <div class="mt-2">
                       <select id="priority" name="priority" autocomplete="priority-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                         <option {{ ( 'low' == $task->priority) ? 'selected' : '' }}>Low</option>
                         <option {{ ( 'medium' == $task->priority) ? 'selected' : '' }}>Medium</option>
                         <option {{ ( 'high' == $task->priority) ? 'selected' : '' }}>High</option>
                       </select>
                     </div>
                     <x-form.error name="priority" />
                 </div>
                </div>
            </div>
        
            <div class="border-b border-gray-900/10 pb-3">
          </div>
      
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
          </div>
        </div>

    </form>
</x-index-layout>