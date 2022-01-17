<?php

namespace App\Models;

use App\Models\Concerns\HasMediaTrait;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use App\Models\Relations\ProjectRelations;

class Project extends Model implements HasMedia
{
    use HasMediaTrait,
        Filterable,
        ProjectRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category',
        'location',
        'area',
        'price',
        'contact',
        'user_id',
    ];
}
