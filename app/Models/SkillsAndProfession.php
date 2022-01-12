<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkillsAndProfession extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'emp_no',
        'employee_name',
        'certificate_name',
        'institution',
        'start_date',
        'end_date',
        'other_competencies_id',
        'competence_fanctional_id',
        'competence_leadership_id',
        'competence_core_value_id',
    ];

    protected $searchableFields = ['emp_no', 'employee_name'];

    protected $table = 'skills_and_professions';

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

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
