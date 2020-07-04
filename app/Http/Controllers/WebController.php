<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 'activo')->orderBy('order', 'ASC')->get();

        return view('web.index', compact('sliders'));
    }
}
