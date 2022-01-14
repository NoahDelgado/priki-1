<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{
    public function store(Request $request) {
        try {
            $opinion = new Opinion();
            $opinion->practice_id = $request->input('practice');
            $opinion->user_id = Auth::user()->id;
            $opinion->description = $request->input('opinion');
            $opinion->save();
            return redirect('/practices/'.$request->input('practice'))->with('success',"C'est noté!!");
        } catch (\Exception $e) {
            return redirect('/practices/'.$request->input('practice'))->with('error',"Petit malin!! Tu sais pourtant bien que tu n'as droit qu'à une opinion !!!");
        }
    }
}
