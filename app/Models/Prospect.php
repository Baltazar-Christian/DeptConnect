<?php

namespace App\Models;

use App\Models\ProspectInstallment;
use App\Models\ProspectItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'payment_amount', 'installment_plan',
        'credit_form_url', 'prospect_type', 'paid_amount', 'status', 'payment_deadline'
    ];

    public function items()
{
    return $this->hasMany(ProspectItem::class);
}

// Define the relationship to Customer
public function customer()
{
    return $this->belongsTo('App\Models\Customer', 'customer_id');
}

public function installments()
{
    return $this->hasMany(ProspectInstallment::class);
}

  // Define the many-to-many relationship with the Product model
  public function products()
  {
      return $this->belongsToMany(Product::class, 'prospect_items', 'prospect_id', 'product_id');
  }
}
