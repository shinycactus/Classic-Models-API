<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee as SalesRep;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;

    public function salesRep()
    {
        return $this->belongsTo(SalesRep::class, 'sales_rep_employee_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
