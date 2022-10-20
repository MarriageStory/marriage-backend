<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::get();

        return response()->json(['data' => $event]);
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
            'name_client' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'tempat' => ['required'],
            'total_pembayaran' => ['required'],
            'status_pembayaran' => ['required'],
            'jumlah_terbayar' => ['required'],
            'note' => ['required'],
            'paket1' => ['required'],
            'paket2' => ['required'],
            'paket3' => ['required'],
            'paket4' => ['required'],
            'paket5' => ['required'],
        ]);

        $attribute['gencode'] = Str::random(4);

        $event = Event::create($attribute);

        return response()->json(['data' => $event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return response()->json(['data' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $attribute = $request->validate([
            'name_client' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'tempat' => ['required'],
            'total_pembayaran' => ['required'],
            'status_pembayaran' => ['required'],
            'jumlah_terbayar' => ['required'],
            'note' => ['required'],
            'paket1' => ['required'],
            'paket2' => ['required'],
            'paket3' => ['required'],
            'paket4' => ['required'],
            'paket5' => ['required'],
        ]);

        $event->update($attribute);

        return response()->json(['data' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json(['messages' => "Berhasil Menghapus Event"]);
    }
}
