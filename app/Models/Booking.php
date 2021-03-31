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

        public function rooms(){
            //return $this->belongsToMany(Room::class,"rooms",'id','room_id');
           return $this->hasOne('App\Models\Room', 'room_id', 'id');

        }
    public function users(){
      //  return $this->belongsToMany(User::class,'users','id','user_id');
       return $this->hasOne('App\Models\User', 'user_id', 'id');
        //    $this->hasOne(User::class,'user_id',"id");
    }

}
