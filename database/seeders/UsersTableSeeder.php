<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userCount = max((int)$this->command->ask('How many users would you like?', 20), 1);

        User::factory()->create([
            'name' => 'Duarte',
            'email' => 'duartelucas@teste.pt',
            'is_admin' => true
        ]);

        User::factory($userCount)->create();
    }
}
