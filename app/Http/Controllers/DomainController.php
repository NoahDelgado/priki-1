<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index($id)
    {
        $domain = Domain::find($id);
        return view('domain.published')->with(['practices' => $domain->publishedPractices()]);
    }
}
