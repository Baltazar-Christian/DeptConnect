<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Prospect;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProspectItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'prospect_id', 'product_id', 'price', 'total_payment'
    ];

    public function prospect()
    {
        return $this->belongsTo(Prospect::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
