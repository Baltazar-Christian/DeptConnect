<?php

namespace App\Models;

use App\Models\Prospect;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProspectInstallment extends Model
{
    use HasFactory;


    public function prospect()
{
    return $this->belongsTo(Prospect::class);
}
}
