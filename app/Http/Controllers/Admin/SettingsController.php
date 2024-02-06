<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;


class SettingsController extends Controller
{
    public function index() : View
    {
        return view('admin.setting.index');
    }

    public function updateGeneralSetting(SettingsRequest $request)
    {
        // dd($request->all());

        Setting::create($request->validated());
        toastr()->success("Updated successfully");

        return to_route('admin.why-choose-us.index');
    }
}
