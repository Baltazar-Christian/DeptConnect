<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'purchase_date',
        'total_amount',
        'efd_number',
        'installment_plan',
        'guarantor_name',
        'guarantor_phone',
        'office_location',
        'home_location',
        'plot_number',
        'kin_name',
        'kin_phone',
        'hr_name',
        'hr_phone',
        'branch_name',
        'company_name',
    ];
}
