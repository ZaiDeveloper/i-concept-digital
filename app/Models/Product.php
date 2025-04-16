<?php

namespace App\Models;

use App\ModelFilters\ProductFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Filterable;

    protected $fillable = ['title', 'description', 'price', 'thumbnail'];

    public function modelFilter()
    {
        return $this->provideFilter(ProductFilter::class);
    }
}
