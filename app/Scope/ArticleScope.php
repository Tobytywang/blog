<?php
/**
 * Created by PhpStorm.
 * User: lufficc
 * Date: 2017/3/21
 * Time: 22:18
 */

namespace App\Scope;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ArticleScope implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return Builder
     */
    public function apply(Builder $builder, Model $model)
    {
        return $builder::where();
    }
}