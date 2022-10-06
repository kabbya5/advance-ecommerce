<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
    }
}
