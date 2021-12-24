<?php

namespace App\Http\Controllers;

use App\Events\RideCreated;
use App\Http\Requests\RideRequest;
use App\Models\Ride;
use App\Services\RideService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class RideController extends Controller
{
    public function __construct(
        private RideService $rideService,
    )
    {
    }

    public function index(): View
    {
        $rides = Ride::orderBy('created_at', 'desc')->paginate(3);

        return view('rides.index', compact('rides'));
    }

    public function create(): View
    {
        return view('rides.create');
    }

    public function store(RideRequest $request): RedirectResponse
    {
        try {
            $ride = $this->rideService->saveFromDto($request->getData());

            event(new RideCreated($ride));
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return redirect()->back();
        }

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
