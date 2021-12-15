<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function store(Request $request) {
        return redirect('/practice/'.$request->input('practice'))->with('success',"C'est noté!!");
    }
}
