<?php

namespace Database\Seeders;

use App\Models\Employe;
use Illuminate\Database\Seeder;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employe::factory()->count(10)->create();
    }
}
