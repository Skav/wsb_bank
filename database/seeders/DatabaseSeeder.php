<?php

namespace Database\Seeders;

use App\Models\Rank;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Rank::factory()->create([
            'id' => 1,
            'name' => 'admin',
        ]);

        Rank::factory()->create([
            'id' => 2,
            'name' => 'employee',
        ]);

        Rank::factory()->create([
            'id' => 3,
            'name' => 'customer',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@admin.com',
            'age' => 99,
            'gender' => 'male',
            'account_id' => '0000000000000000000000000000000000',
            'rank_id' => 1,
            'active' => true,
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'email' => 'jan@email.com',
            'age' => 25,
            'gender' => 'male',
            'account_id' => '0000000000000000000000000000000001',
            'rank_id' => 2,
            'active' => true,
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Adam',
            'surname' => 'Mickiewicz',
            'email' => 'adam@email.com',
            'age' => 54,
            'gender' => 'male',
            'account_id' => '1000000000000000000000000000000000',
            'rank_id' => 3,
            'active' => true,
            'password' => Hash::make('password1'),
        ]);

        User::factory()->create([
            'name' => 'Anna',
            'surname' => 'Mickiewicz',
            'email' => 'anna@email.com',
            'age' => 50,
            'gender' => 'female',
            'account_id' => '2000000000000000000000000000000000',
            'rank_id' => 3,
            'active' => false,
            'password' => Hash::make('password2'),
        ]);
    }
}
