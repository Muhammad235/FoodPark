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


        $keys = ['site_name', 'default_currency', 'currency_icon'];
        $setting = Setting::whereIn('key', $keys)->pluck('value', 'key');

        return view('admin.setting.index', compact('setting'));
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

        toastr()->success("Updated successfully");
        

        return to_route('admin.setting.index');
    }
}
