<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CashBenefit extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'emp_no',
        'employee_name',
        'jenis_benefit',
        'nilai_benefit',
        'date',
    ];

    protected $searchableFields = ['emp_no', 'employee_name'];

    protected $table = 'cash_benefits';

    protected $casts = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
