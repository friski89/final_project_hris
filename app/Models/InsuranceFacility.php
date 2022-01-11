<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InsuranceFacility extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'emp_no',
        'employee_name',
        'jenis_asuransi',
        'provider_asuransi',
        'nama_peserta',
        'status_peserta',
        'date',
        'peserta_manfaat',
    ];

    protected $searchableFields = ['emp_no', 'employee_name'];

    protected $table = 'insurance_facilities';

    protected $casts = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
