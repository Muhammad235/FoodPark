<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class WebPageController extends Controller
{
    public function index() : View {
        return view('web.home.index');
    }
}
