<?php

namespace App\Http\Controllers\Admin;

use App\Models\SectionTitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhyChooseUsTitleController extends Controller
{
        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'why_choose_top_title' => ['max:100'],
            'why_choose_main_title' => ['max:100'],
            'why_choose_sub_title' => ['max:150'],
        ]);

        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_top_title'],
            ['value' => $request->why_choose_top_title],
        );

        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_main_title'],
            ['value' => $request->why_choose_main_title],
        );


        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_sub_title'],
            ['value' => $request->why_choose_sub_title],
        );

        toastr()->success("Updated successfully");
            
        return redirect()->back();
    }
}
