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
        'status_pembayaran',
        'jumlah_terbayar',
        'note',
        'paket',
        'gencode',
    ];

    // protected $with = ['schedules'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function payment_details()
    {
        return $this->hasOne(PaymentDetail::class);
    }
    public function paket()
    {
        return $this->hasMany(Paket::class);
    }
}
