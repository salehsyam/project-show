<?php

namespace App\Models\Relations;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

trait ProjectRelations
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
