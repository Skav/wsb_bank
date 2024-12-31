<?php

namespace Database\Seeders;

use App\Models\CashAmount;
use App\Models\Message;
use App\Models\Rank;
use App\Models\TransactionsHistoryAmount;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\TransactionsHistoryAmountFactory;
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
            'phone' => '000000000',
            'age' => 99,
            'gender' => 'male',
            'account_number' => '0000000000000000000000000000000000',
            'rank_id' => 1,
            'active' => true,
            'password' => Hash::make('test123'),
        ]);

        User::factory()->create([
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'email' => 'jan@email.com',
            'phone' => '111111111',
            'age' => 25,
            'gender' => 'male',
            'account_number' => '0000000000000000000000000000000001',
            'rank_id' => 2,
            'active' => true,
            'password' => Hash::make('test123'),
        ]);

        User::factory()->create([
            'name' => 'Adam',
            'surname' => 'Mickiewicz',
            'email' => 'adam@email.com',
            'phone' => '555888999',
            'age' => 54,
            'gender' => 'male',
            'account_number' => '1000000000000000000000000000000000',
            'rank_id' => 3,
            'active' => true,
            'password' => Hash::make('test123'),
        ]);

        User::factory()->create([
            'name' => 'Anna',
            'surname' => 'Mickiewicz',
            'email' => 'anna@email.com',
            'phone' => '666999888',
            'age' => 50,
            'gender' => 'female',
            'account_number' => '2000000000000000000000000000000000',
            'rank_id' => 3,
            'active' => true,
            'password' => Hash::make('test123'),
        ]);

        CashAmount::factory()->create([
            'user_id' => 3,
            'amount' => 100000,
        ]);

        CashAmount::factory()->create([
            'user_id' => 4,
            'amount' => 100000,
        ]);

        TransactionsHistoryAmount::factory()->create([
            'title' => 'Za kawe',
            'receiver_fullname' => 'Adam Mickiewicz',
            'sender_fullname' => 'Anna Mickiewicz',
            'sender_account_number' => '2000000000000000000000000000000000',
            'receiver_account_number' => '1000000000000000000000000000000000',
            'amount' => 20,
            'send' => true
        ]);

        TransactionsHistoryAmount::factory()->create([
            'title' => 'Za wycieczke',
            'receiver_fullname' => 'Anna Mickiewicz',
            'sender_fullname' => 'Adam Mickiewicz',
            'sender_account_number' => '1000000000000000000000000000000000',
            'receiver_account_number' => '2000000000000000000000000000000000',
            'amount' => 2000,
            'send' => true
        ]);

        Message::factory()->create([
            'sender_name' => "Jan kowalski",
            'sender_email' => 'jan2@email.com',
            'sender_message' => "test wiadomosci hehe",
            'is_read' => true
        ]);

        Message::factory()->create([
            'sender_name' => "Jan Nowak",
            'sender_email' => 'janNowak@email.com',
            'sender_message' => "Jakaś bardzo mądra wiadomość",
            'is_read' => false
        ]);

        Message::factory()->create([
            'sender_name' => "Adam kowalski",
            'sender_email' => 'AdamK@email.com',
            'sender_message' => "Jestem Adam Kowalski",
            'is_read' => true
        ]);

        Message::factory()->create([
            'sender_name' => "Adam Kowalski",
            'sender_email' => 'AdamK@email.com',
            'sender_message' => "To znowu ja!",
            'is_read' => false
        ]);
    }
}
