<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'current_team_id' => 1,
        ]);

        User::create([
            'id' => '2',
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user123'),
            'current_team_id' => 2,
        ]);

        for ($i=0; $i < 1000; $i++) {
            User::create([
                'name' => 'User '.$i,
                'username' => 'user'.$i,
                'email' => 'user'.$i.'@user.com',
                'password' => bcrypt('user123'),
                'current_team_id' => 2,
            ]);
        }
    }
}
