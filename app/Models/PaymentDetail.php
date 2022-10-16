<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_payment',
        'bayar',
        'tanggal',
        'detail',
        'payment_id',
        'image',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
