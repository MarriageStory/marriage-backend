<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_client',
        'date',
        'time',
        'user_id',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
