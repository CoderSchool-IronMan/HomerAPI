<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;

trait UuidForKey
{
    public static function bootUuidForKey()
    {
        static::creating(function ($model) {
            $model->incrementing = false;
            $model->uuid = (string)Uuid::uuid4();
        });
    }

    /**
     * Get the casts array.
     *
     * @return array
     */
    public function getCasts()
    {
        return $this->casts;
    }
}