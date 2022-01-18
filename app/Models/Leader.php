<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'atasan1',
        'nik_atasan1',
        'jabatan1',
        'atasan2',
        'nik_atasan2',
        'jabatan2',
        'atasan3',
        'nik_atasan3',
        'jabatan3',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'nik', 'nik_company');
    }
}
