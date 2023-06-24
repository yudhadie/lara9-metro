<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'id' => 1,
            'user_id' => '1',
            'name' => 'ADMIN',
            'personal_team' => '1',
        ]);

        Team::create([
            'id' => 2,
            'user_id' => '1',
            'name' => 'USER',
            'personal_team' => '1',
        ]);
    }
}
