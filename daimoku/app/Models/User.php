<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function leaveAllRooms()
    {
        $open_attendances = $this->attendances()->whereNull('left_at')->get();
        foreach ($open_attendances as $attendance) {
            $attendance->leave();
        }
    }


    public function isAt(Room $room): bool
    {
        // Retrieve posts with at least one comment containing words like code%...
        $openAttendances = $this->attendances()
            ->where('room_id', $room->id)
            ->whereNull('left_at')
            ->count();

        return $openAttendances > 0;
    }

    public function enterRoom(Room $room)
    {
        // Check if user is already attending given room
        if ($this->isAt($room)) {
            return;
        }

        $this->leaveAllRooms();

        // Create new attendance
        $attendance = new Attendance();
        $attendance->room()->associate($room);
        $this->attendances()->save($attendance);
    }
}
