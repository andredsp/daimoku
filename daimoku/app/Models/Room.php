<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['attendances', 'blocks'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function blocks()
    {
        return $this->hasMany(RoomBlock::class);
    }
}