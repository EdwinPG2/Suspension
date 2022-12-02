<?php

namespace App\Http\Controllers;

use App\Models\Oficio;
use App\Models\Suspension;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $suspenciones = Suspension::all();
        $oficio = Oficio::all();
        return view('home/index', compact('oficio', 'suspenciones'));
    }
}


