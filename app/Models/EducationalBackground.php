<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationalBackground extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'emp_no',
        'employee_name',
        'institution_name',
        'faculty',
        'major',
        'graduate_date',
        'cost_category',
        'scholarship_institution',
        'gpa',
        'gpa_scale',
        'default',
        'start_year',
        'city',
        'state',
        'country',
        'user_id',
        'edu_id',
    ];

    protected $searchableFields = ['emp_no', 'employee_name'];

    protected $table = 'educational_backgrounds';

    protected $casts = [
        'graduate_date' => 'date',
        'start_year' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function edu()
    {
        return $this->belongsTo(Edu::class);
    }
}
