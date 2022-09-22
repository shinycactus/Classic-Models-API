<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee as SalesRep;

class Customer extends Model
{
    use HasFactory;

    public function salesRep()
    {
        return $this->belongsTo(SalesRep::class, 'sales_rep_employee_id');
    }
}
