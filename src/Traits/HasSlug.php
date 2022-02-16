<?php

namespace Dealskoo\Admin\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::lower($value);
    }
}
