<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_client',
        'date',
        'time',
        'tempat',
        'total_pembayaran',
        'note',
        'paket',
        'user_id',
        'gencode',
    ];

    protected $with = ['schedules'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
