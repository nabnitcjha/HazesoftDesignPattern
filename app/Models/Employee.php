<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';

    public function company() 
    {
       return $this->belongsToMany(Company::class, 'company__employees','employee_id','company_id');
    }

    public function department()
    {
        return $this->belongsToMany(Department::class, 'department_employees','employee_id','department_id');
    }
}
