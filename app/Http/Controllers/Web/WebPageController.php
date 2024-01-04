<?php

namespace App\Http\Controllers\Web;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class WebPageController extends Controller
{
    public function index() : View {
        
        $sliders = Slider::where('status', 1)->get();
        return view('web.home.index', compact('sliders'));
    }
}
