<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Contracts\Searcher;
use Dealskoo\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function handle(Request $request, Searcher $searcher)
    {
        return $searcher->handle($request);
    }
}
