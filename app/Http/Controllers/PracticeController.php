<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Practice;
use App\Models\ChangeLog;
use Illuminate\Http\Request;
use App\Models\PublicationState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PracticeController extends Controller
{
    public function show(Request $request, $id)
    {
        $practice = Practice::find($id);
        if ($request->user()->cannot('view', $practice)) return redirect(route('home')); // TODO remove this test on slug that doesn't belong here! define a policy instead

        return view('practice.show')->with(['practice' => $practice]);
    }

    public function showAll()
    {
        if (!Gate::allows('list-all-practices', Auth::user())) {
            abort(403);
        }
        return view('practice.list_all')->with(['practices' => Practice::all()]);
    }

    /**
     * Publish a practice
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function publish(Request $request)
    {
        $practice = Practice::find($request->input('practice'));
        if ($request->user()->cannot('publish', $practice)) {
            abort(403);
        }
        $practice->publish();
        return redirect(route('home'))->with('success', "Pratique publiée");
    }
    public function changeTitle(Request $request)
    {
        $practice = Practice::find($request->input('practice'));
        if ($request->user()->cannot('edit', $practice)) {
            abort(403);
        }
        $practice->editTitle($request->input('title'));
        $history = new Changelog();
        if ($request->input('reason') != null) {
            $history->reason = $request->input('reason');
        }
        $history->created_at = Carbon::now()->subMinutes(rand(1, 5 * 24 * 60));
        $history->updated_at = Carbon::now()->subMinutes(rand(1, 5 * 24 * 60));
        $history->previously = $request->input('oldtitle');
        $history->practice_id = $request->input('practice');
        $history->user_id = Auth::user()->id;
        $history->save();

        return redirect(route('home'))->with('success', "Modification Réussi");
    }
}
