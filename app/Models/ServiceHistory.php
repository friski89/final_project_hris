<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceHistory extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;


    protected $fillable = [
        'emp_no',
        'emoloyee_name',
        'start_date',
        'end_date',
        'type',
        'company_home_id',
        'company_host_id',
        'band_position_id',
        'job_title_id',
        'user_id',
    ];


    protected $searchableFields = ['emp_no', 'emoloyee_name'];

    protected $table = 'service_histories';

    // protected $casts = [
    //     'start_date' => 'date',
    //     'end_date' => 'date',
    // ];

    public function companyHome()
    {
        return $this->belongsTo(CompanyHome::class);
    }

    public function companyHost()
    {
        return $this->belongsTo(CompanyHost::class);
    }

    public function bandPosition()
    {
        return $this->belongsTo(BandPosition::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
