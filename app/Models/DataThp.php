<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataThp extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'emp_no',
        'employee_name',
        'base_salary',
        'tunjangan_jabatan',
        'tunjangan_fixed',
        'based_jamsostek',
        'no_jamsostek',
        'no_bpjs',
        'no_npwp',
        'status_pajak',
        'no_rekening',
        'nama_bank',
        'nama_pemilik',
        'user_id',
    ];

    protected $searchableFields = ['emp_no', 'employee_name'];

    protected $table = 'data_thps';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
