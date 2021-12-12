<?php

namespace App\Http\Controllers;

use App\Models\Practice;

class PracticeController extends Controller
{
    public function show($id)
    {
        return view('practice.show')->with(['practice' => Practice::find($id)]);
    }
}
