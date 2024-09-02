<?php

namespace App\Http\Controllers;

use App\Models\guide;
use App\Models\guide_trip;
use App\Models\trip;
use App\Models\category;
use App\Models\trip_images;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alltrips =trip::all();
        return view("dashboard/trips/index", ['trips'=>$alltrips]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcat= category::all();
        return view('dashboard/trips/create',['categories'=>$allcat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        trip::create([
            'name'=>$request->input('name'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
            'capacity'=>$request->input('capacity'),
            'price'=>$request->input('price'),
            'start_at'=>$request->input('start_at'),
            'end_at'=>$request->input('end_at'),
            'cat_id'=>$request->input('cat_id'),
        ]);
        return to_route('trips.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($tripid)
    {
        // Find the trip by ID
        $trip = Trip::find($tripid);

        // Get all the guide_trip records related to this trip
        $tripGuids = Guide_Trip::where('trip_id', $tripid)->get();

        // Initialize an empty array to hold the guide details
        $guides = [];

        // Loop through each guide_trip record
        foreach ($tripGuids as $tripGuid) {
            // Find the guide by its ID and add it to the $guides array
            $guide = Guide::find($tripGuid->guide_id);
            array_push($guides, $guide);
        }

        // Get all the images associated with the trip
        $tripImages = Trip_Images::where('trip_id', $tripid)->get();

        // Pass the trip, guides, and images data to the view
        return view('dashboard/trips/show', [
            'tripImages' => $tripImages,
            'tripGuids' => $guides,
            'trip' => $trip
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(trip $trip)
    {

        $allcat= category::all();
        return view('dashboard/trips/edit',['categories'=>$allcat , 'trip'=>$trip]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, trip $trip)
    {
        $trip->update([
            'name'=>$request->input('name'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
            'capacity'=>$request->input('capacity'),
            'price'=>$request->input('price'),
            'start_at'=>$request->input('start_at'),
            'end_at'=>$request->input('end_at'),
            'cat_id'=>$request->input('cat_id'),

        ]);
        return to_route('trips.index',['trips'=>$trip]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(trip $trip)
    {
        $trip->delete();
        return to_route('trips.index');
    }
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required',
        ]);

        $q = $request->q;

        $alltrips = trip::all();

        $filtertrips = trip::where('name', 'like', '%' . $q . '%')->get();

        if ($filtertrips->count()) {
            return view('dashboard/trips/index', [
                'trips' => $filtertrips,
            ]);
        } else {
            return redirect()->route('trips.index')->with([

                'static' => 'No trips found'

            ]);
        }
    }
}
