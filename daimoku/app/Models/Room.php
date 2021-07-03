<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function syncBlocks()
    {
        // Get room's total time (by user)
        $attendances_time = $this->attendances()->select('user_id', 
            DB::raw('SUM(COALESCE(left_at, NOW()) - entered_at) total_current_time'))
        ->groupBy('user_id')
        ->pluck('total_current_time', 'user_id');

        // Get room's total blocks (by user)
        $current_blocks = $this->blocks()
        ->select('user_id', DB::raw('count(*) as blocks'))
        ->groupBy('user_id')
        ->pluck('blocks', 'user_id');
        
        // Create missing blocks
        $now = Carbon::now();
        foreach ($attendances_time as $user_id => $total_current_time) {
            $expected_blocks = (int) ($total_current_time / $this->block_seconds);
            $missing_blocks = $expected_blocks - ($current_blocks[$user_id] ?? 0);
            RoomBlock::insert(
                array_fill(0, $missing_blocks, 
                    [
                        'room_id' => $this->id, 
                        'user_id' => $user_id,
                        'pos_x' => 0, 
                        'pos_y' => 0,
                        'updated_at' => $now,
                        'created_at' => $now, 
                    ]
                )
            );
        }

    }
}
