<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class ReservationController extends Controller
{
    public function store(Request $request, Event $event) {
        $event->users()->attach($request->all());
        
        return response()->json(compact('event'));
    }
    
    public function destroy(Request $request, Event $event, User $user) {
        $event->users()->detach($user->id);
        
        return response()->json(compact('event'));
    }
}
