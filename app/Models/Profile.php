<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'gender',
        'phone_number',
        'blood_group',
        'no_ktp',
        'no_npwp',
        'address_ktp',
        'address_domisili',
        'status_domisili',
        'user_id',
        'religion_id',
        'address_npwp',
        'nama_ibu',
        'vaccine1',
        'vaccine2',
        'not_vaccine',
        'remarks_not_vaccine'
    ];

    protected $casts = [
        'vaccine1' => 'boolean',
        'vaccine2' => 'boolean',
        'not_vaccine' => 'boolean',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function emergencyContact()
    {
        return $this->hasOne(EmergencyContact::class);
    }
}
