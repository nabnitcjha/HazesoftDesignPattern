<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';

    public function department()
    {
       return $this->hasMany(Department::class, 'company_id');
    }

    public function employee()
    {
        return $this->belongsToMany(Employee::class, 'company__employees','company_id','employee_id');
    }

}
