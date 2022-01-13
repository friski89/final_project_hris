<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingHistory extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'emp_no',
        'employee_name',
        'training_name',
        'institution',
        'start_date',
        'years_of_training',
        'training_duration',
        'end_date',
        'training_force',
        'rating',
        'trnevent_topic',
        'trncourse_cost',
        'trnevent_type',
        'trn_flag',
        'user_id',
        'other_competencies_id',
        'competence_fanctional_id',
        'competence_leadership_id',
        'competence_core_value_id',
    ];
    
    // protected $fillable = [
    //     'emp_no',
    //     'employee_name',
    //     'training_name',
    //     'institution',
    //     'start_date',
    //     'years_of_training',
    //     'training_duration',
    //     'end_date',
    //     'training_force',
    //     'rating',
    //     'trnevent_topic',
    //     'trncourse_cost',
    //     'trnevent_type',
    //     'trn_flag',
    //     'user_id',
    // ];

    
    protected $searchableFields = ['emp_no', 'employee_name'];

    protected $table = 'training_histories';

    // protected $casts = [
    //     'start_date' => 'date',
    //     'end_date' => 'date',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function otherCompetencies()
    {
        return $this->belongsTo(OtherCompetencies::class);
    }

    public function competenceFanctional()
    {
        return $this->belongsTo(CompetenceFanctional::class);
    }

    public function competenceLeadership()
    {
        return $this->belongsTo(CompetenceLeadership::class);
    }

    public function competenceCoreValue()
    {
        return $this->belongsTo(CompetenceCoreValue::class);
    }
}
