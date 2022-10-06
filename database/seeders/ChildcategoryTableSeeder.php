<?php

namespace Database\Seeders;

use App\Models\Childcategory;
use Illuminate\Database\Seeder;

class ChildcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Childcategory::factory()->count(15)->create();
    }
}
