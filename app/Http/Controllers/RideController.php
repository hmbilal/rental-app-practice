<?php

namespace App\Http\Controllers;

use App\Events\RideCreated;
use App\Http\Requests\RideRequest;
use App\Http\Requests\UpdateRideRequest;
use App\Models\Ride;
use App\Services\RideService;

class RideController extends Controller
{
    public function __construct(
        private RideService $rideService,
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rides = Ride::orderBy('created_at', 'desc')->paginate(3);

        return view('rides.index', compact('rides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RideRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RideRequest $request)
    {
        $ride = $this->rideService->create($request->getData());

        event(new RideCreated($ride));

        return redirect()->route('dashboard.rides');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function show(Ride $ride)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function edit(Ride $ride)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRideRequest  $request
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRideRequest $request, Ride $ride)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ride $ride)
    {
        //
    }
}
