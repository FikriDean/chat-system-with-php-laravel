<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

use App\Models\User;
use App\Models\Message;
use App\Models\MessageUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Fikri Dean',
            'email' => 'deanradityo@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Safira Putri Fadhillah',
            'email' => 'safira@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Nabil Ahmad Syaputra',
            'email' => 'nabil@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        Message::create([
            'body' => 'Ini adalah message pertama'
        ]);

        Message::create([
            'body' => 'Ini adalah message kedua'
        ]);

        Message::create([
            'body' => 'Ini adalah message ketiga'
        ]);

        Message::create([
            'body' => 'Ini adalah message keempat'
        ]);

        MessageUser::create([
            'message_to' => 1,
            'user_id' => 2,
            'message_id' => 1
        ]);

        MessageUser::create([
            'message_to' => 2,
            'user_id' => 1,
            'message_id' => 2
        ]);

        MessageUser::create([
            'message_to' => 1,
            'user_id' => 3,
            'message_id' => 3
        ]);

        MessageUser::create([
            'message_to' => 3,
            'user_id' => 1,
            'message_id' => 4
        ]);
    }
}
