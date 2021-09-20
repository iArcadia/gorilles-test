<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Event;

class User extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'first_name',
        'birthday',
        'email'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'birthday' => 'date'
    ];
    
    /**
     * Create an attribute displaying the complete name of the user.
     *
     * @return string
     */
    public function getCompleteNameAttribute(): string {
        return $this->first_name . ' ' . $this->name;
    }
    
    /**
     * Retrieves all events of a user.
     *
     * @return Relationship
     */
    public function events() {
        return $this->belongsToMany(Event::class, 'reservations');
    }
}
