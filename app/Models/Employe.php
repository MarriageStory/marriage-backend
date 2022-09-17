<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'username',
        'password',
        'status',
        'schedule_id',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
