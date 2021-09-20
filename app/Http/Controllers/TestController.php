<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function get() {
        $route = 'reservation.get';
        
        dd(
            Http::get(
                route($route, [1, 1])
            )->json()
        );
    }
    
    public function post() {
        $route = 'event.destroy';
        $method = 'delete';
        
        $data = [
            'id' => 3,
            'title' => 'Testtt',
            'maximum_places' => 42,
            'start_at' => '2025-01-01'
        ];
        
        dd(
            Http::$method(
                route($route),
                $data
            )->json()
        );
    }
}
