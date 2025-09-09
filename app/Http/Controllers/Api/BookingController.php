<?php

namespace App\Http\Controllers\Api;

use App\Filters\WeekFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BookingController extends Controller
{

    /**
     * Get all bookings.
     * @queryParam filter[week] date Filter bookings by week containing the given date (format: YYYY-MM-DD). Example: 2024-10-14
     * @queryParam filter[user_id] integer Filter bookings by user ID. Example: 3
     * @queryParam filter[client_id] integer Filter bookings by client ID. Example: 5
     * @queryParam sort string Field to sort by. Valid fields are [start_time, end_time, created_at]. Negative sign to denote DESC. Example: -start_time
     *
     * @apiResourceCollection App\Http\Resources\BookingResource
     * @apiResponse 200
     */
    public function index()
    {
        $bookings= QueryBuilder::for(Booking::class)
            ->allowedFilters([
                AllowedFilter::custom('week', new WeekFilter()),
                'user_id',
                'client_id'
            ])
            ->allowedSorts(['start_time','end_time','created_at'])
            ->with('user','client')
            ->get();

        return BookingResource::collection($bookings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $booking = new Booking($request->validated());
        $booking->save();

        return new BookingResource($booking);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return new BookingResource($booking->load('user','client'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->noContent();
    }
}
