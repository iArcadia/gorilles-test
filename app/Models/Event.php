<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Event extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'maximum_places',
        'start_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_at' => 'date'
    ];
    
    /**
     * Retrieves all users of an event.
     */
    public function users() {
        return $this->belongsToMany(User::class, 'reservations')->withPivot('created_at');
    }
}
