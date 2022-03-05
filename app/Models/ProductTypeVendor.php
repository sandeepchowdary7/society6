<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTypeVendor extends Model
{
    use HasFactory;

    /**
     * Table Name
     * @var string
     */
    protected $table = 'product_type_vendor';

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function product_type(){
        return $this->belongsTo(ProductType::class);
    }
}
