<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\RoomBlock;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomBlockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoomBlock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $attendance = Attendance::findOrFail(random_int(1, Attendance::count()));
        return [
            'room_id' => $attendance->room, 
            'user_id' => $attendance->user,
            'pos_x' => 0, 
            'pos_y' => 0,
        ];
    }
}
