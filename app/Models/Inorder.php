<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'order_id', 'quantity', 'price', 'total_price'
    ];
    public function produts()
    {
        return $this->hasMany(Product::class);
    }
}
