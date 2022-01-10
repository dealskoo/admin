<?php

namespace Dealskoo\Admin\Contracts;

use Illuminate\Http\Request;

interface Dashboard
{
    public function handle(Request $request);
}
