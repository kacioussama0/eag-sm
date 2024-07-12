<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Setting;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roomTypesArr = Setting::where('type','type salle')->get()->toArray();

        $rooms = Room::all();

        $roomTypes = [];

        foreach ($roomTypesArr as $type) {
            $roomTypes[$type['name']] = $type['id'];
        }

        return view('platform.rooms.index',compact('rooms','roomTypes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'capacity' => 'required|integer',
            'room_number' => 'required|integer',
            'type_room_id' => 'required|integer',
            'floor' => 'required|integer',
        ]);


        if(Room::create($validatedData)) {
            return redirect()->to('platform/rooms')->with([
                'success' => 'Salle créé avec succès',
            ]);
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $roomTypesArr = Setting::where('type','type salle')->get()->toArray();

        $roomTypes = [];

        foreach ($roomTypesArr as $type) {
            $roomTypes[$type['name']] = $type['id'];
        }

        return view('platform.rooms.edit',compact('roomTypes','room'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'name_ar' => 'required|max:255',
            'capacity' => 'required|integer',
            'room_number' => 'required|integer',
            'type_room_id' => 'required|integer',
            'floor' => 'required|integer',
        ]);


        if($room->update($validatedData)) {
            return redirect()->to('platform/rooms')->with([
                'success' => 'Salle editer avec succès',
            ]);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        if($room->delete()) {
            return redirect()->to('platform/rooms')->with([
                'success' => 'Salle supprimer avec succès',
            ]);
        }
    }
}
