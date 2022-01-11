<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlamatKerja extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'work_location_id'];

    protected $searchableFields = ['name'];

    protected $table = 'alamat_kerjas';

    public function workLocation()
    {
        return $this->belongsTo(WorkLocation::class);
    }
}
