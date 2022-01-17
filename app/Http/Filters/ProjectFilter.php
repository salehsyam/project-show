<?php

namespace App\Http\Filters;

use Illuminate\Validation\Rule;

class ProjectFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'location',
        'category',
        'area',
        'price',
        'contact',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->where('name', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given location.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function location($value)
    {
        if ($value) {
            return $this->builder->where('location', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given area.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function area($value)
    {
        if ($value) {
            return $this->builder->where('area', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given price.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function price($value)
    {
        if ($value) {
            return $this->builder->where('price', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given contact.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function contact($value)
    {
        if ($value) {
            return $this->builder->where('contact', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function category($value)
    {
        if ($value) {
            return $this->builder->where('category', $value);
        }

        return $this->builder;
    }
}
