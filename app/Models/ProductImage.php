<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    protected $primaryKey ='id';
    protected $guarded = [];

    // 1 ProductImage chứa 1 Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
