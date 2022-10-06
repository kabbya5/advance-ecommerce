<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $table = Order::class;

    public function definition()
    {
        $code = "MDBD".rand();
        $payment = ['cod','od'];
        $i = rand(0,1);
        return [
            'user_id' => User::all()->random()->id,
            'order_code' => $code,
            'slug' => str_slug($code),
            'status' => rand(0,4),
            'payment' => $payment[$i],
            'subtotal' => $this->faker->randomNumber(2),
        ];
    }
}
