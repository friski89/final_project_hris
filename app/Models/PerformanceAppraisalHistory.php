<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerformanceAppraisalHistory extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'emp_no',
        'employee_name',
        'year',
        'performance_value',
        'performance_score',
        'competency_value',
        'behavioral_value',
        'user_id',
    ];

    protected $searchableFields = ['emp_no', 'employee_name'];

    protected $table = 'performance_appraisal_histories';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
