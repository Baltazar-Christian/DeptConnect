<?php

namespace App\Models;

use App\Models\ProspectInstallment;
use App\Models\ProspectItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;


    public function items()
{
    return $this->hasMany(ProspectItem::class);
}

public function installments()
{
    return $this->hasMany(ProspectInstallment::class);
}
}
