<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_client',
        'tunai_keseluruhan',
        'tanggal',
        'status',
        'terbayar',
    ];

    protected $with = ['payment_details'];

    public function payment_details()
    {
        return $this->hasMany(PaymentDetail::class);
    }
}
