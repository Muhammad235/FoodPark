<?php

namespace App\Http\Controllers\Web;

use App\Models\Slider;
use App\Models\WhyChooseUs;
use App\Models\SectionTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class WebPageController extends Controller
{
    public function index() : View {
        
        $sliders = Slider::where('status', 1)->get();
        $sectionTitles = $this->getSectionTitle();
        $WhyChooseUs = WhyChooseUs::where('status', 1)->get();

        return view('web.home.index', compact('sliders', 'sectionTitles', 'WhyChooseUs'));
    }

    public function getSectionTitle() : Collection {
        $keys = ['why_choose_top_title', 'why_choose_main_title', 'why_choose_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');

        return $titles;
    }
}
