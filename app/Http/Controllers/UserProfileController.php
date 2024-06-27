<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userProfile = userProfile::where('user_id', $request->user()->id)->first();
        return view('profile', ['userprofile'=>$userProfile]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(userProfile $userProfile)
    {
        $userProfile = userProfile::where('user_id', Auth::user()->id)->first();
        $data = ['userprofile'=>$userProfile];
        return view('profile', $data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(userProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, userProfile $userProfile)
    {
        $validated = $request->validate([
            'first_name'=>['required','min:2', 'max:255'],
            'last_name'=>['required','min:2', 'max:255'],
            'date_of_birth'=>[],
            'mobile_number'=>['required','min:11', 'max:11'],
            'profile_image'=>['image', 'mimes:png,jpg', 'max:2048'],
        ]);

        $userProfile = userProfile::where('user_id', $request->user()->id)->first();
        if($request->hasFile('profile_image')){
            $profileImagePath = $request->file('profile_image');
            $profileImageName = time().$profileImagePath->getClientOriginalName();
            $store = $profileImagePath->storeAs('profiles', $profileImageName);

            $profileImage = substr($store, 8);
        }
        
        $userProfile->date_of_birth = $request->date_of_birth ?? $userProfile->date_of_birth;
        $userProfile->profile_image = $profileImage ?? $userProfile->profile_image;
        $userProfile->update($validated);

        return back()->with('message','profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(userProfile $userProfile)
    {
        //
    }
}
