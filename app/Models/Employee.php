<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Office;

class Employee extends Model
{
    use HasFactory;

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function subordinate() {
        return $this->hasMany(Employee::class, 'reports_to');
    }
    
    public function supervisor() {
        return $this->belongsTo(Employee::class, 'reports_to');
    }
}
