<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignmentHistory extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'emp_no',
        'employee_name',
        'date',
        'assignment_name',
        'company_home_id',
        'job_title_id',
        'user_id',
    ];

    protected $searchableFields = ['emp_no', 'employee_name'];

    protected $table = 'assignment_histories';

    // protected $casts = [
    //     'date' => 'date',
    // ];

    public function companyHome()
    {
        return $this->belongsTo(CompanyHome::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
