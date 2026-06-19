<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'location', 'manager_name', 'phone', 'status'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}

