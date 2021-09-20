<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class ReservationController extends Controller
{
    /**
     * Get all reservations.
     *
     * @return Response
     */
    public function all() {
        $reservations = \DB::select(
            \DB::raw('select * from reservations')
        );
        
        return response()->json(compact('reservations'));
    }
    
    /**
     * Get a specified event by its ID.
     *
     * @param Event $event
     * @param User $user
     *
     * @return Response
     */
    public function get(Event $event, User $user) {
        $reservation = \DB::select(
            \DB::raw('select * from reservations where event_id = :event_id and user_id = :user_id'), [
                'event_id' => $event->id,
                'user_id' => $user->id
            ]
        );
        
        return response()->json(compact('reservation'));
    }
    
    /**
     * Store a new reservation into the database from a POST request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request) {
        $event = Event::findOrFail($request->get('event_id'));
        $event->users()->attach($request->get('user_id'));
        
        return response()->json(compact('event'));
    }
    
    /**
     * Delete an existing reservation from the database from a DELETE request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function destroy(Request $request) {
        $event = Event::findOrFail($request->get('eventId'));
        $event->users()->detach($request->get('userId'));
        
        return response()->json(compact('event'));
    }
}
