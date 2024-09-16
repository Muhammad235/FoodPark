<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SettingsRequest;
use App\Models\Setting;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Yoeunes\Toastr\Facades\Toastr;


class SettingsController extends Controller
{
    public function index() : View
    {

        return view('admin.setting.index');
    }

    public function updateGeneralSetting(SettingsRequest $request)
    {

        $data = $request->validated();

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        //clear settings cache upon update 
        $settingsService = app(SettingsService::class);
        $settingsService->clearCacheSettings();

        toastr()->success("Updated successfully");

        return to_route('admin.setting.index');
    }
}
