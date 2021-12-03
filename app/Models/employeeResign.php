<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class employeeResign extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'note', 'start_date', 'end_date', 'keterangan', 'information', 'date_information'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
