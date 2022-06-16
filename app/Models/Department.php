<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';

    public function company()
    {
       return $this->belongsTo(Company::class, 'company_id');
    }

    public function employee()
    {
        return $this->belongsToMany(Employee::class, 'department_employees','department_id' ,'employee_id');
    }
}
