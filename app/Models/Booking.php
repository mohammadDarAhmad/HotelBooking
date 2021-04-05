<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'room_id'
    ];

    public function room(){
        return $this->hasOne(Room::class);

    }
    public function user(){
             return $this->hasOne(User::class);
    }

}
