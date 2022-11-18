<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = ['id' => 'string'];

    public function productLine()
    {
        return $this->belongsTo(ProductLine::class);
    }
}
