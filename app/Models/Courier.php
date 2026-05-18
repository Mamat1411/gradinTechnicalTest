<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courier extends Model
{
    /** @use HasFactory<\Database\Factories\CourierFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    public $keyType = 'string';
    public $incrementing = false;

    public $guarded = ['id'];

    #[Scope]
    protected function search($query, ?array $keywords) {
        $query->when($keywords['search'] ?? false, function ($query, $search) {
           return $query->where('full_name', 'like', '%' . $search . '%');
        });

        $query->when($keywords['levels'] ?? false, function ($query, ?array $levels) {
            return $query->whereIn('level', $levels);
        });

        return $query;
    }
}
