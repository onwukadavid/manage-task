<x-index-layout>
    <x-slot:header>
        <x-page-header>
            <x-slot:title>
                Edit project
            </x-slot>
            <x-link-button href="/projects/create" class="dark:bg-gray-800">Create Project</x-link-button>
        </x-page-header>
    </x-slot>

    {{-- SWITH TO MODAL FROM THE INDEX PAGE --}}
    <form action="/project/{{$project->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                
                 <div class="sm:col-span-2 sm:col-start-1">
                     <x-form.label for="title">Title</x-form.label>
                     <x-form.input type="text" name="title" id="title" value="{{ $project->title }}" />
                     <x-form.error name="title" />
                 </div>
             
                 <div class="col-span-full">
                  <x-form.label for="content">content</x-form.label>
                  <x-form.textarea-layout id="content" name="content" rows="3" >{{ $project->description }}</x-form.textarea-layout>
                  <x-form.error name="content" />
                 </div>

                 <div class="col-span-2">
                  <x-form.label for="title">Add collaborators</x-form.label>
                  {{-- <x-form.input type="text" name="collab" id="collab" class="w-full pr-20" /> --}}
                  <x-form.search-bar/>
                  <x-form.error name="search" />

                  {{-- List all collaborators --}}
                 </div>
                </div>
            </div>
        
            <div class="border-b border-gray-900/10 pb-3">
          </div>
      
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href={{route('show-project', ['project'=>$project->id])}} class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
          </div>
        </div>

    </form>
</x-index-layout>