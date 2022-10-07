<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Office;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'extension',
        'office_id',
        'job_title',
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
