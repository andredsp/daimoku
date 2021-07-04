<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leave()
    {
        $this->left_at = now();
        $this->save();
        $this->room->syncBlocks();
    }

    public static function autoLeaveInactives()
    {
        // Get inactives attendances
        $inactive_attendances = static::selectRaw('*, TIMESTAMPDIFF(SECOND, updated_at, NOW()) AS last_keep_alive')
        ->whereNull('left_at')
        ->having('last_keep_alive', '>', '60')
        ->get();

        foreach ($inactive_attendances as $attendance) {
            // Force leave
            $attendance->leave();

            // Sync blocks?
        }

        return $inactive_attendances;
    }

}
