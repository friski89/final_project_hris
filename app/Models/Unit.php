<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'departement_id'];

    protected $searchableFields = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
