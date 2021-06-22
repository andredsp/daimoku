<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id' => random_int(1, Room::count()), 
            'user_id' => random_int(1, User::count()),
        ];
    }
}
