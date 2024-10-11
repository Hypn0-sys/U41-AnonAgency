<?php

namespace Database\Seeders;

use App\Models\Flag;
use Illuminate\Database\Seeder;

class HiddenDatasSeeder extends Seeder
{
    public function run()
    {
        Flag::create([
            'name' => 'easy',
            'value' => 'ThisIsTooEasy!'
        ]);
    }
}
