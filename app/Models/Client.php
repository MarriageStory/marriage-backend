<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'username',
        'password',
        'roles',
        'schedule_id',
        'payment_id',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
