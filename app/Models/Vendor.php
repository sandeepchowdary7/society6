<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    /**
     * Table Name
     * @var string
     */
    protected $table = 'vendors';

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the Order Line Items for the Vendor.
     */
    public function order_line_items()
    {
        return $this->hasMany(OrderLineItem::class, 'vendor_id');
    }
}
