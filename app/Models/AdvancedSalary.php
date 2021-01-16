<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvancedSalary extends Model
{
    protected $guarded=[];


    protected $table='advance_salaries';

    public function employee()
    {
        return $this->hasOne(Employee::class,'id','emp_id');
    }

}
