<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'description', 'price'];

    // Define the many-to-many relationship with the Prospect model
    public function prospects()
    {
        return $this->belongsToMany(Prospect::class, 'prospect_items', 'product_id', 'prospect_id');
    }

}
