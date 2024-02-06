<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;


class SettingsController extends Controller
{
    public function index() : View
    {
        return view('admin.setting.index');
    }

    public function updateGeneralSetting(Request $request)
    {
        dd($request);
    }
}
