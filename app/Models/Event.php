<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
