<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class BrandScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $brand = app('current_brand');
        if ($brand) {
            $builder->where($model->getTable() . '.brand_id', $brand->id);
        }
    }
}
