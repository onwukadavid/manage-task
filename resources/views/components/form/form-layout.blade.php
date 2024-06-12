<div>
    <div>
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

         <div class="sm:col-span-2 sm:col-start-1">
             <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
             <div class="mt-2">
               <input type="text" name="title" id="title" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value={{ @old('title') }}>
             </div>
             <x-form.error name="title" />
         </div>
 
         <div class="col-span-full">
           <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
           <div class="mt-2">
             <textarea id="content" name="content" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{@old('content')}}</textarea>
           </div>
           <x-form.error name="content" />
         </div>
 
         <div class="sm:col-start-1">
             <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
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
             <label for="priority" class="block text-sm font-medium leading-6 text-gray-900">Priority</label>
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

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</div>
