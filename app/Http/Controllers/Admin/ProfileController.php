<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ProfileUpdateRequest;

class ProfileController extends Controller
{
    use FileUploadTrait;
    
    function index() : View {
        return view('admin.profile.index');
    }

    function update(ProfileUpdateRequest $request) : RedirectResponse {
        
        $user = Auth::user();
        
        $imagePath = $this->uploadImage($request, 'avatar', '/avatar_img');

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => isset($imagePath) ? $imagePath : $user->avatar
        ]);

        toastr()->success("Updated successfully");
            
        return redirect()->back();

    }
}
