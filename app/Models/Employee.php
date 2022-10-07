<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Office;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function subordinate() 
    {
        return $this->hasMany(Employee::class, 'reports_to');
    }
    
    public function supervisor() 
    {
        return $this->belongsTo(Employee::class, 'reports_to');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'sales_rep_employee_id', 'id');
    }
}
