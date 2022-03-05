<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Table Name
     * @var string
     */
    protected $table = 'products';

    public function creative(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Creative::class, 'creative_id');
    }

    public function product_type() {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
