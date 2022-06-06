<?php

namespace Dealskoo\Admin\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::lower($value);
    }

    public function getSlugRouteKey()
    {
        return $this->slug ?? $this->getKey();
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->where($this->getKeyName(), $slug)->orWhere('slug', $slug)->first();
    }
}
