<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetenceFanctional extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['name'];

    protected $table = 'competence_fanctionals';

    public function trainingHistories()
    {
        return $this->hasMany(TrainingHistory::class);
    }

    public function skillsAndProfessions()
    {
        return $this->hasMany(SkillsAndProfession::class);
    }
}
