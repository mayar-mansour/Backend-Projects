<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Attendance extends Model


{
        use HasFactory;
        protected $fillable = [
                'employee_id', 'date', 'time_out', 'time_in'
        ];
        //protected $with = ['employees'];

        public function employee()
        {
                return $this->belongsTo(Employee::class, 'employee_id');
        }
}
