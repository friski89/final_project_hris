<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'division_id'];

    protected $searchableFields = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
