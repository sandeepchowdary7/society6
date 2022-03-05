<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Table Name
     * @var string
     */
    protected $table = 'orders';
    public function order_line_items()
    {
        return $this->hasMany(OrderLineItem::class)->with(['product.product_type.product_type_vendors', 'product.creative']);
    }
}
