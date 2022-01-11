<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfficeFacilities extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'emp_no',
        'employee_name',
        'jenis_fasilitas',
        'jenis_pemberian',
        'nilai_perolehan',
        'date',
    ];

    protected $searchableFields = ['emp_no', 'employee_name'];

    protected $table = 'office_facilities';

    protected $casts = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
