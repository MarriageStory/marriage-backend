<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::get();
        return response()->json(['data' => $payments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = $request->validate([
            'tunai_keseluruhan' => ['required'],
            'status' => ['required'],
            'terbayar' => ['required'],
            'tanggal' => ['required'],
            'event_id' => ['required'],
        ]);

        $payment = Payment::create($attribute);

        return response()->json(['data' => $payment]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return response()->json(['data' => $payment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $attribute = $request->validate([
            'tunai_keseluruhan' => ['required'],
            'status' => ['required'],
            'terbayar' => ['required'],
            'tanggal' => ['required'],
            'event_id' => ['required'],
        ]);

        $payment->update($attribute);

        return response()->json(['data' => $payment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->json(['messages' => "Berhasil Menghapus Payment"]);
    }
}
