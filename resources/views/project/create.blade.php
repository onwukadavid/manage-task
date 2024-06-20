<x-index-layout>
    <x-slot:header>
        <x-page-header>
            <x-slot:title>
                New Project
            </x-slot>
            {{-- <x-link-button href="/tasks/create" class="dark:bg-gray-800">Create task</x-link-button> --}}
        </x-page-header>
    </x-slot>

    {{-- SWITH TO MODAL FROM THE INDEX PAGE --}}
    <form action="/project/store" method="POST">
        @csrf
        <div>
            <div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        
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
        
            <div class="border-b border-gray-900/10 pb-3">
          </div>
        
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href={{route('project')}} class="text-sm font-semibold leading-6 text-gray-900">Cancel</a href=route>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
          </div>
        </div>
        
    </form>
</x-index-layout>