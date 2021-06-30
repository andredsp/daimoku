<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Room;
use App\Models\RoomBlock;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // RoomBlock::truncate();    
        // Attendance::truncate();
        // Room::truncate();
        // User::truncate();

        $user = User::factory(10)->create();
        $room = Room::factory(3)->create();
        // $attendance = Attendance::factory(6)->create();
        // $rb = RoomBlock::factory(10)->create();
    }
}
