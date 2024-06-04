<?php

namespace App\Models;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_id',
        'product_id',
        'price',
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class); // Assuming you have a Product model
    }
}
