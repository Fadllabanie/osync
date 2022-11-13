<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait HasUuid
{

    protected static function bootHasUuid()
    {
        static::creating(function ($model) {
            ## if you need to use uuid as id 
            ## $model->{$model->getKeyName() is id
            // if (empty($model->{$model->getKeyName()})) {
            //     $model->{$model->getKeyName()} = Str::uuid();
            // }
            $model->uuid = Str::uuid();
        });
    }
}
