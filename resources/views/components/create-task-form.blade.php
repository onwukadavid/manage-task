<div>
    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

     <div class="sm:col-span-2 sm:col-start-1">
         <x-form.label for="title">Title</x-form.label>
         <x-form.input type="text" name="title" id="title" autocomplete="address-level2" value="{{ old('title') }}" />
         <x-form.error name="title" />
     </div>

     <div class="col-span-full">
      <x-form.label for="content">content</x-form.label>
      <x-form.textarea-layout id="content" name="content" rows="3" >{{ @old('content') }}</x-form.textarea-layout>
      <x-form.error name="content" />
     </div>

     <div class="sm:col-start-1">
      <x-form.label for="status">status</x-form.label>
         <div class="mt-2">
           <select id="status" name="status" autocomplete="status-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
             <option>Not started</option>
             <option>Ongoing</option>
             <option>Done</option>
           </select>
         </div>
         <x-form.error name="status" />
     </div>

     <div class="sm:col-start-1">
      <x-form.label for="priority">priority</x-form.label>
         <div class="mt-2">
           <select id="priority" name="priority" autocomplete="priority-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
             <option>Low</option>
             <option>Medium</option>
             <option>High</option>
           </select>
         </div>
         <x-form.error name="priority" />
     </div>
    </div>
</div>

<div class="border-b border-gray-900/10 pb-3">
</div>