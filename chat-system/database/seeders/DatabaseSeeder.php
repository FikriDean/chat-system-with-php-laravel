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
use App\Models\BlockedContact;

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
            'status' => 'Affh Iyyh',
            'email' => 'deanradityo@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Budi Bin Afwan',
            'username' => 'budiman',
            'hashtag' => '100',
            'status' => 'Dunia ini hanyalah sementara',
            'email' => 'budi@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Kharisma Binti Humaira',
            'username' => 'kharisma',
            'hashtag' => '150',
            'status' => 'Money is part of my life',
            'email' => 'kharisma@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'testing1',
            'username' => 'testing1',
            'hashtag' => '345',
            'status' => 'Money is part of my life',
            'email' => 'testing1@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'testing2',
            'username' => 'testing2',
            'hashtag' => '324',
            'status' => 'Money is part of my life',
            'email' => 'testing2@gmail.com',
            'email_verified_at' => '2023-02-06 20:05:57',
            'password' => Hash::make('password'),
        ]);

        Room::create([
            'room_code' => 'dfe419824FDr',
            'room_name' => 'Budi Bin Afwan Fikri Dean'
        ]);

        Room::create([
            'room_code' => 'dfe419824FDr2',
            'room_name' => 'Kelompok Aljabar Linear'
        ]);

        Room::create([
            'room_code' => 'dfe419824FDr3',
            'room_name' => 'Kharisma Binti Humaira Fikri Dean'
        ]);

        Room::create([
            'room_code' => 'dfe419824FDr4',
            'room_name' => 'Kelompok Scholarship'
        ]);

        Room::create([
            'room_code' => 'dfe419824FDr5',
            'room_name' => 'Kelompok Bangkit'
        ]);

        Room::create([
            'room_code' => 'dfe419824FDr6',
            'room_name' => 'Kelompok Mandiri'
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

        RoomUser::create([
            'user_id' => 1,
            'room_id' => 3
        ]);

        RoomUser::create([
            'user_id' => 3,
            'room_id' => 3
        ]);

        RoomUser::create([
            'user_id' => 1,
            'room_id' => 4
        ]);

        RoomUser::create([
            'user_id' => 2,
            'room_id' => 4
        ]);

        RoomUser::create([
            'user_id' => 3,
            'room_id' => 4
        ]);

        RoomUser::create([
            'user_id' => 1,
            'room_id' => 5
        ]);

        RoomUser::create([
            'user_id' => 2,
            'room_id' => 5
        ]);

        RoomUser::create([
            'user_id' => 3,
            'room_id' => 5
        ]);

        RoomUser::create([
            'user_id' => 1,
            'room_id' => 6
        ]);

        RoomUser::create([
            'user_id' => 2,
            'room_id' => 6
        ]);

        RoomUser::create([
            'user_id' => 3,
            'room_id' => 6
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

        // BlockedContact::create([
        //     'user_id' => 1,
        //     'name' => 'Kharisma Binti Humaira',
        //     'username' => 'kharisma',
        //     'hashtag' => 150,
        // ]);
    }
}
