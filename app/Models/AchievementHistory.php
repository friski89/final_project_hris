<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AchievementHistory extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'emp_no',
        'employee_name',
        'award_name',
        'date',
        'institution',
        'no_sk',
        'office_name',
        'position_name',
        'remarks',
        'user_id',
    ];

    protected $searchableFields = ['emp_no', 'employee_name'];

    protected $table = 'achievement_histories';

    // protected $casts = [
    //     'date' => 'date',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
