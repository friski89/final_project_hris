<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Family extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'employee_name',
        'emp_no',
        'marital_status',
        'no_kk',
        'family_name',
        'nik_id',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'date_marital',
        'religion',
        'citizenship',
        'work',
        'health_status',
        'blood_group',
        'blood_rhesus',
        'house_number',
        'handphone_number',
        'emergency_number',
        'address',
        'city',
        'province',
        'postal_code',
        'relationship',
        'alive',
        'urutan',
        'dependent_status',
        'user_id',
        'edu_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date_of_birth' => 'date',
        'date_marital' => 'date',
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
