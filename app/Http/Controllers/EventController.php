<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    /**
     * Display all events.
     *
     * @return View
     */
    public function index() {
        $events = Event::all();
        
        return view('event.index', compact('events'));
    }
    
    /**
     * Show event informations.
     *
     * @param Event $event
     *
     * @return View
     */
    public function show(Event $event) {
        return view('event.show', compact('event'));
    }
    
    /**
     * Display a form which allows to store a new event.
     *
     * @return View
     */
    public function create() {
        return view('event.create');
    }
    
    /**
     * Display an already filled form which allows to update an existing event.
     *
     * @param Event $event
     *
     * @return View
     */
    public function edit(Event $event) {
        $alreadyParticipatingIds = $event->users->map(fn($item) => $item->id);
        $users = User::whereNotIn('id', $alreadyParticipatingIds)->get();
        
        return view('event.edit', compact('event', 'users'));
    }
    
    /**
     * Store a new event into the database from a POST request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request) {
        $event = Event::create($request->all());
        
        return response()->json(compact('event'));
    }
    
    /**
     * Update an existing event from the database from a PUT request.
     *
     * @param Request $request
     * @param Event $event
     *
     * @return Response
     */
    public function update(Request $request, Event $event) {
        $event->fill($request->all())->save();
        
        return response()->json(compact('event'));
    }
    
    /**
     * Soft delete an existing event from the database from a DELETE request.
     *
     * @param Request $request
     * @param Event $event
     *
     * @return Response
     */
    public function destroy(Request $request, Event $event) {
        $event->users()->detach();
        $event->delete();
        
        return response()->json(compact('event'));
    }
}
