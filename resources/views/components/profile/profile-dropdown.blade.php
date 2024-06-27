<div class="relative ml-3">
    <div>
        <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full" src={{ asset('storage/'.Auth::user()->userProfile->profile_image) }} alt="">
        </button>
    </div>

    <div id="dropdown-menu" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <!-- Active: "bg-gray-100", Not Active: "" -->
        <x-profile.profile-dropdown-list id="user-menu-item-0" href="{{ route('profile') }}">Your Profile</x-profile->
        <x-profile.profile-dropdown-list href="#" id="user-menu-item-1">Settings</x-profile->
        <x-profile.profile-dropdown-list href="{{ route('logout') }}" id="user-menu-item-2">Sign out</x-profile->
    </div>
</div>

<script>
    const userMenuButton = document.getElementById('user-menu-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    userMenuButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    // Close the dropdown menu when clicking outside
    window.addEventListener('click', (e) => {
        if (!userMenuButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
