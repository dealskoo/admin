<?php

namespace Dealskoo\Admin\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function __invoke($locale)
    {
        if (array_key_exists($locale, config('admin.languages'))) {
            App::setLocale($locale);
            Session::put('admin_locale', $locale);
        }
        return redirect()->back();
    }
}
