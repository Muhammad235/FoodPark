<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Web\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request) 
    {
        $user = Auth::user();

        $user->update($request->all());

        toastr()->success("Updated successfully");
            
        return redirect()->back();

    }

    /**
     * Update user avatar.
     */
    function updateAvatar(Request $request) : RedirectResponse {
        
        dd($request->all());

        // $user = Auth::user();
        
        // $imagePath = $this->uploadImage($request, 'avatar', '/avatar_img');

        // $user->update([
        //     'avatar' => isset($imagePath) ? $imagePath : $user->avatar
        // ]);

        // toastr()->success("Updated successfully");
            
        // return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
