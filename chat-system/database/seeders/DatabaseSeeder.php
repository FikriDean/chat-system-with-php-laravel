<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

use App\Models\User;
use App\Models\Message;

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
            'username' => 'fikridean',
            'hashtag' => '163',
            'email' => 'deanradityo@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Safira Putri Fadhillah',
            'username' => 'safira',
            'hashtag' => '100',
            'email' => 'safira@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Nabil Ahmad Syaputra',
            'username' => 'nabil',
            'hashtag' => '150',
            'email' => 'nabil@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        Message::create([
            'user_id' => 1,
            'body' => 'Ini adalah message pertama',
            'receiver' => 2
        ]);

        Message::create([
            'user_id' => 2,
            'body' => 'Ini adalah message kedua',
            'receiver' => 1
        ]);

        Message::create([
            'user_id' => 3,
            'body' => 'Ini adalah message ketiga',
            'receiver' => 1
        ]);

        Message::create([
            'user_id' => 1,
            'body' => 'Ini adalah message keempat',
            'receiver' => 3
        ]);
    }
}
