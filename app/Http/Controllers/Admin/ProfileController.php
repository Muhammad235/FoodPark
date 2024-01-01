<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ProfileUpdateRequest;

class ProfileController extends Controller
{
    function index() : View {
        return view('admin.profile.index');
    }

    function update(ProfileUpdateRequest $request) : RedirectResponse {
        
        $user = Auth::user();
        
        $user->update($request->all());

        toastr()->success("Updated successfully");
        return redirect()->back();
    }
}
