<?php

namespace App\Http\Controllers;

use App\Models\Practice;

class PracticeController extends Controller
{
    public function show($id)
    {
        $practice = Practice::find($id);
        if ($practice->publicationState->slug != 'PUB') return redirect(route('home')); // TODO remove this test on slug that doesn't belong here! define a policy instead

        return view('practice.show')->with(['practice' => $practice]);
    }
}
