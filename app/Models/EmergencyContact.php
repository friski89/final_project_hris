<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmergencyContact extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'contact', 'relation', 'profile_id'];

    protected $searchableFields = ['*'];

    protected $table = 'emergency_contacts';

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
