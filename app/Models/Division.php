<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'direktorat_id'];

    protected $searchableFields = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function direktorat()
    {
        return $this->belongsTo(Direktorat::class);
    }

    public function departements()
    {
        return $this->hasMany(Departement::class);
    }
}
