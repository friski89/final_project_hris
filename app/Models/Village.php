<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Village extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'district_id'];

    protected $searchableFields = ['name'];

    public function kodePos()
    {
        return $this->hasOne(KodePos::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
