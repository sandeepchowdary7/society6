<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    /**
     * Table Name
     * @var string
     */
    protected $table = 'product_types';

    public function product_type_vendors()
    {
        return $this->hasMany(ProductTypeVendor::class);
    }
}
