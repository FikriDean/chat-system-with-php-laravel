<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

use App\Models\User;
use App\Models\Message;
use App\Models\Room;
use App\Models\RoomUser;

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
            'status' => 'Aku sayang Allah',
            'email' => 'deanradityo@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Safira Putri Fadhillah',
            'username' => 'safira',
            'hashtag' => '100',
            'status' => 'Ini statusku.',
            'email' => 'safira@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Nabil Ahmad Syaputra',
            'username' => 'nabil',
            'hashtag' => '150',
            'status' => 'Aku adalah bendahara',
            'email' => 'nabil@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        Room::create([
            'room_code' => 'dfe419824FDr',
            // 'room_code' => $faker->regexify('[A-Za-z0-9]{20}')
        ]);

        Room::create([
            'room_code' => 'dfe419824FDr2',
        ]);

        RoomUser::create([
            'user_id' => 1,
            'room_id' => 1
        ]);

        RoomUser::create([
            'user_id' => 2,
            'room_id' => 1
        ]);

        RoomUser::create([
            'user_id' => 1,
            'room_id' => 2
        ]);

        RoomUser::create([
            'user_id' => 2,
            'room_id' => 2
        ]);

        RoomUser::create([
            'user_id' => 3,
            'room_id' => 2
        ]);

        Message::create([
            'user_id' => 1,
            'room_id' => 1,
            'body' => 'Ini adalah message pertama',
        ]);

        Message::create([
            'user_id' => 2,
            'room_id' => 1,
            'body' => 'Ini adalah message kedua',
        ]);

        Message::create([
            'user_id' => 1,
            'room_id' => 1,
            'body' => 'Ini adalah message ketiga',
        ]);

        Message::create([
            'user_id' => 2,
            'room_id' => 1,
            'body' => 'Ini adalah message keempat',
        ]);

        Message::create([
            'user_id' => 2,
            'room_id' => 1,
            'body' => 'Ini adalah message kelima',
        ]);

        Message::create([
            'user_id' => 1,
            'room_id' => 1,
            'body' => 'Ini adalah message keenam',
        ]);

        Message::create([
            'user_id' => 1,
            'room_id' => 1,
            'body' => 'Ini adalah message ketujuh',
        ]);

        Message::create([
            'user_id' => 2,
            'room_id' => 1,
            'body' => 'Ini adalah message kedelapan',
        ]);

        Message::create([
            'user_id' => 1,
            'room_id' => 1,
            'body' => 'Ini adalah message keempat',
        ]);
    }
}
