<?php

namespace Dealskoo\Admin\Contracts;

use Illuminate\Http\Request;

interface Searcher
{
    public function handle(Request $request);
}
