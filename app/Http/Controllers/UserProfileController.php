<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userProfile = userProfile::where('user_id', $request->user()->id);
        return view('profile', ['profile'=>$userProfile]);
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
        //
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
            'first_name'=>[],
            'last_name'=>[],
            'date_of_birth'=>[],
            'mobile_number'=>[],
            'profile_image'=>[],
        ]);
        $userProfile = userProfile::find('user_id', $request->user()->id);
        $userProfile->update($validated);
        
        return session()->flash('message','profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(userProfile $userProfile)
    {
        //
    }
}
