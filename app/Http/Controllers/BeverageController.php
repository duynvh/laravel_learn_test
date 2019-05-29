<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beverage;

class BeverageController extends Controller
{
    public function index() {
        $beverages = Beverage::all();
        return view('beverage.index', compact('beverages'));
    }

    public function show($id) {
        $beverage = Beverage::find($id);
        return view('beverage.show', compact('beverage'));
    }
}
