<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Builder;

class Courier extends Model
{
    /** @use HasFactory<\Database\Factories\CourierFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    public $keyType = 'string';
    public $incrementing = false;

    public $guarded = ['id'];

    #[Scope]
    protected function search(Builder $query, ?string $keyword) : Builder {
        $query->when($keyword ?? false, function ($query, $keyword) {
           return $query->where(['full_name'], 'like', '%' . $keyword . '%');
        });

        return $query;
    }
}
