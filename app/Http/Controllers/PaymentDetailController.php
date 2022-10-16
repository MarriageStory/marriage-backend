<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class PaymentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Payment $payment)
    {
        $payment_details = $payment->payment_details;
        return response()->json(['data' => $payment_details]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Payment $payment)
    {
        $attributes = $request->validate([
            'nama_payment' => ['required'],
            'bayar' => ['required'],
            'tanggal' => ['required'],
            'detail' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);

        //mengambil data file yang diupload
        $file           = $request->file('image');
        //mengambil nama file
        $nama_file      = $file->getClientOriginalName();
        //memindahkan file ke folder tujuan
        $file->move('file_upload', $file->getClientOriginalName());

        $paymentDetail = new PaymentDetail();
        $paymentDetail->image = $nama_file;
        $paymentDetail->bayar = $attributes['bayar'];
        $paymentDetail->tanggal = $attributes['tanggal'];
        $paymentDetail->detail = $attributes['detail'];
        $paymentDetail->nama_payment = $attributes['nama_payment'];
        $paymentDetail->payment_id = $payment->id;

        $paymentDetail->save();

        $payment->terbayar = $payment->terbayar + $paymentDetail->bayar;
        $payment->save();

        return response()->json(['data' => $paymentDetail]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment, PaymentDetail $paymentDetail)
    {
        return response()->json(['data' => $paymentDetail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment, PaymentDetail $paymentDetail)
    {
        $attributes = $request->validate([
            'nama_payment' => ['required'],
            'bayar' => ['required'],
            'tanggal' => ['required'],
            'detail' => ['required'],
        ]);

        $paymentDetail->update($attributes);

        return response()->json(['data' => $paymentDetail]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment, PaymentDetail $paymentDetail)
    {
        $paymentDetail->delete();

        return response()->json(['messages' => "Berhasil Menghapus Detail Payment"]);
    }
}
