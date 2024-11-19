<?php

namespace App\Http\Controllers;
use App\Models\Resevation;
use Illuminate\Http\Request;

class ResevationController extends Controller
{
    //könyvtáros +  admin
    public function index()
    {
        return Resevation::all();
    }

    /**
     * Store a newly created resource in storage.
     */

     //könyvtáros 
    public function store(Request $request)
    {
        $record = new Resevation();
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Display the specified resource.
     */

     //könyvtáros
    public function show(string $user_id, $copy_id, $start)
    {
        $reservation = Resevation::where('user_id', $user_id)
        ->where('book_id', $book_id)
        ->where('start', $start)
        //listát ad vissza:
        ->get();
        return $reservation[0];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id, $book_id, $start)
    {
        $record = $this->show($user_id, $book_id, $start);
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id, $book_id, $start)
    {
        $this->show($user_id, $book_id, $start)->delete();
    }
}

