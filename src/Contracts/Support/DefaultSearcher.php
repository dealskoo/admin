<?php

namespace Dealskoo\Admin\Contracts\Support;

use Dealskoo\Admin\Contracts\Searcher;
use Illuminate\Http\Request;

class DefaultSearcher implements Searcher
{
    public function handle(Request $request)
    {
        return view('admin::dashboard');
    }
}
