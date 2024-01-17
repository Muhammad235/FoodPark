<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\PasswordUpdateRequest;

class AdminAuthController extends Controller
{
    function index() : View 
    {
        return view('admin.auth.login');
    }

    function update(PasswordUpdateRequest $request) : RedirectResponse 
    {
        
        $user = Auth::user();

        $user->update($request->all());

        toastr()->success("Updated successfully");
        return redirect()->back();
    }
}
