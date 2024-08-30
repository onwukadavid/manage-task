<x-index-layout>
    <x-slot:header>
        <x-page-header>
            <x-slot:title>
                Update profile
            </x-slot:title>           
        </x-page-header>
    </x-slot:header>

    
    <form method="post" action="{{ route('update-profile', [$userprofile->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
            <div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">

                    @session('message')
                        <x-notification>
                            {{ session('message') }}
                        </x-notification>
                    @endsession
            
                    <div class="sm:col-span-2 sm:col-start-1">
                        <x-form.label for="username">Username</x-form.label>
                        <x-form.input type="text" class="w-full bg-gray-100" name="username" id="username" autocomplete="address-level2" value="{{ $userprofile->user->username ?? old('username')}}" disabled/>
                        <x-form.error name="username" />
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <x-form.label for="email">Email</x-form.label>
                        <x-form.input type="email" class="w-full bg-gray-100" name="email" id="email" autocomplete="address-level2" value="{{ $userprofile->user->email ?? old('email')}}" disabled/>
                        <x-form.error name="email" />
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <x-form.label for="first_name">First name</x-form.label>
                        <x-form.input type="text" class="w-full" name="first_name" id="first_name" autocomplete="address-level2" value="{{ $userprofile->first_name ?? old('first_name')}}" />
                        <x-form.error name="first_name" />
                    </div>
            
                    <div class="sm:col-span-2 sm:col-start-1 ">
                        <x-form.label for="last_name">Last name</x-form.label>
                        <x-form.input type="text" class="w-full" name="last_name" id="last_name" autocomplete="address-level2" value="{{ $userprofile->last_name ?? old('last_name') }}" />
                        <x-form.error name="last_name" />
                    </div>
            
                    <div class="sm:col-span-2 sm:col-start-1">
                        <x-form.label for="mobile_number">Mobile number</x-form.label>
                        <x-form.input type="text" class="w-full" name="mobile_number" id="mobile_number" autocomplete="address-level2" value="{{ $userprofile->mobile_number ?? old('mobile_number') }}" />
                        <x-form.error name="mobile_number" />
                    </div>
            
                    <div class="sm:col-span-2 sm:col-start-1">
                        <x-form.label for="date_of_birth">Date of birth</x-form.label>
                        <x-form.input type="date" name="date_of_birth" id="date_of_birth" autocomplete="address-level2" value="{{ $userprofile->date_of_birth ?? old('date_of_birth') }}" />
                        <x-form.error name="date_of_birth" />
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <x-form.label for="profile_image">Profile image</x-form.label>
                        <x-form.input type="file" name="profile_image" id="profile_image" autocomplete="address-level2" value="{{ $userprofile->profile_image ?? old('profile_image') }}" />
                        <x-form.error name="profile_image" />

                        <x-profile.profile-image profile_image="{{ $userprofile->profile_image }}"/>
                    </div>
                </div>
            </div>
            
            <div class="border-b border-gray-900/10 pb-3"></div>
        
            <div class="mt-6 flex items-center justify-end gap-x-6">
              <a href={{route('home')}} class="text-sm font-semibold leading-6 text-gray-900">Cancel</a href=route>
              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
    </form>
</x-index-layout>