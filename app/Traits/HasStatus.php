<?php

namespace App\Traits;

trait HasStatus
{
    public function scopeActive($query)
    {
        $query->where('status', config('constants.status.active'));
    }

    public function scopeInActive($query)
    {
        $query->where('status', config('constants.status.inactive'));
    }
}
