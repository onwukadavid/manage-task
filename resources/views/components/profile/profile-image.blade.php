@props(['profile_image'])

@if($profile_image)
    <img class="h-8 w-8 rounded-full" src={{ asset('storage/'.$profile_image) }} alt="">
@else
    <img class="h-8 w-8 rounded-full" src=https://www.gravatar.com/avatar alt="">        
@endif