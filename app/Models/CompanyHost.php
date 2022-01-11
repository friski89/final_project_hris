<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyHost extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['name'];

    protected $table = 'company_hosts';

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function serviceHistories()
    {
        return $this->hasMany(ServiceHistory::class);
    }
}
