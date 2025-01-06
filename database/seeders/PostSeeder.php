<?php

namespace Database\Seeders;

use App\Models\Poste;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Poste::factory()->count(10)->create();
    }
}
