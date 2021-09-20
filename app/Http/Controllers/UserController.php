<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display all users.
     *
     * @return View
     */
    public function index() {
        $users = User::all();
        
        return view('user.index', compact('users'));
    }
    
    /**
     * Show user informations.
     *
     * @param User $user
     *
     * @return View
     */
    public function show(User $user) {
        return view('user.show', compact('user'));
    }
    
    /**
     * Display a form which allows to store a new user.
     *
     * @return View
     */
    public function create() {
        return view('user.create');
    }
    
    /**
     * Display an already filled form which allows to update an existing user.
     *
     * @param User $user
     *
     * @return View
     */
    public function edit(User $user) {
        return view('user.edit', compact('user'));
    }
    
    /**
     * Get all users.
     *
     * @return Response
     */
    public function all() {
        $users = User::all();
        
        return response()->json(compact('users'));
    }
    
    /**
     * Get a specified user by its ID.
     *
     * @param User $user
     *
     * @return Response
     */
    public function get(User $user) {
        return response()->json(compact('user'));
    }
    
    /**
     * Store a new user into the database from a POST request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request) {
        $user = User::create($request->all());
        
        return response()->json(compact('user'));
    }
    
    /**
     * Update an existing user from the database from a PUT request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function update(Request $request) {
        $user = User::findOrFail($request->get('id'));
        $result = $user->fill($request->all())->save();
        
        return response()->json(compact('result'));
    }
    
    /**
     * Soft delete an existing user from the database from a DELETE request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function destroy(Request $request, User $user) {
        $user = User::findOrFail($request->get('id'));
        $user->events()->detach();
        $result = $user->delete();
        
        return response()->json(compact('result'));
    }
}
