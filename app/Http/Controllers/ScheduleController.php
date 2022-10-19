<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::get();

        return response()->json(['data' => $schedules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $attributes = $request->validate([
            'nama_kegiatan' => ['required'],
            'detail_kegiatan' => ['required'],
            'tanggal' => ['required'],
            'tempat' => ['required'],
            'jam' => ['required'],
            'status' => ['required'],
            'gencode' => ['required'],
        ]);

        // $schedule = Schedule::create($attributes);
        $schedule = $event->schedules()->create($attributes);

        return response()->json(['data' => $schedule]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event ,Schedule $schedule)
    {
        $schedule = $event->whereHas('schedules', fn($q) => $q->where('id', $schedule->id))->first();
        return response()->json(['data' => $schedule]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $attributes = $request->validate([
            // 'nama_kegiatan' => ['required'],
            // 'detail_kegiatan' => ['required'],
            // 'tanggal' => ['required'],
            // 'tempat' => ['required'],
            // 'jam' => ['required'],
            'status' => ['required'],
        ]);

        $schedule->update($attributes);

        return response()->json(['data' => $schedule]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return response()->json(['messages' => "Berhasil Menghapus Schedule"]);
    }
}
