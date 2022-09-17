<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employe = Employe::get();

        return response()->json(['data' => $employe]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'status' => ['required'],
        ]);

        $employe = Employe::create($attributes);

        return response()->json(['data' => $employe]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        return response()->json(['data' => $employe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
        $attributes = $request->validate([
            'email' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'status' => ['required'],
        ]);

        $employe->update($attributes);

        return response()->json(['data' => $employe]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();

        return response()->json(['messages' => "Berhasil Menghapus Employe"]);
    }
}
