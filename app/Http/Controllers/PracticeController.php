<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PracticeController extends Controller
{
    public function show($id)
    {
        $practice = Practice::find($id);
        if ($practice->publicationState->slug != 'PUB') return redirect(route('home')); // TODO remove this test on slug that doesn't belong here! define a policy instead

        return view('practice.show')->with(['practice' => $practice]);
    }

    public function showAll()
    {
        if (! Gate::allows('list-all-practices', Auth::user())) {
            abort(403);
        }
        return view('practice.list_all')->with(['practices' => Practice::all()]);
    }
}
