<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'regencie_id'];

    protected $searchableFields = ['name'];

    public function regencie()
    {
        return $this->belongsTo(Regencie::class);
    }

    public function villages()
    {
        return $this->hasMany(Village::class);
    }
}
