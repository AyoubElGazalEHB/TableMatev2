<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        DB::table('users')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@ehb.be',
                'password' => Hash::make('Password!321'),
                'typeUser' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Regular User
        DB::table('users')->insertOrIgnore([
            [
                'id' => 2,
                'name' => 'user',
                'email' => 'user@user.be',
                'password' => Hash::make('user_password'),
                'typeUser' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // FAQ Categories
        DB::table('faq_categories')->insertOrIgnore([
            ['id' => 1, 'title' => 'Table reservation?', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'title' => 'Baby', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // FAQ Items
        DB::table('faq_items')->insertOrIgnore([
            ['id' => 1, 'faq_categories_id' => 1, 'question' => 'Test Question', 'answer' => 'Test Answer', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'faq_categories_id' => 1, 'question' => 'WhatN', 'answer' => 'where', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'faq_categories_id' => 1, 'question' => 'How about a question?', 'answer' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // FAQ Reactions
        DB::table('faq_reactions')->insertOrIgnore([
            ['id' => 1, 'faq_item_id' => 1, 'user_id' => 2, 'reaction' => 'Helpful', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'faq_item_id' => 2, 'user_id' => 1, 'reaction' => 'Confusing', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Contacts
        DB::table('contacts')->insertOrIgnore([
            ['id' => 1, 'name' => 'Hello', 'email' => 'ayoubelgazal2017@gmail.com', 'message' => 'deeded', 'response' => 'deeded', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // News
        DB::table('news')->insertOrIgnore([
            ['id' => 1, 'title' => 'Exciting New Restaurant Opens in Town', 'image_path' => 'news/image1.jpg', 'content' => 'Discover the new culinary delights at our latest addition to the city\'s vibrant food scene.', 'publication_date' => '2025-01-01', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Comments
        DB::table('comments')->insertOrIgnore([
            ['id' => 1, 'news_id' => 1, 'name' => 'John Doe', 'comment' => 'I can\'t wait to try this new restaurant!', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Tables
        DB::table('tables')->insertOrIgnore([
            ['id' => 1, 'image' => 'table1.jpg', 'tableNumber' => 101, 'persons' => 4, 'description' => 'Simple table for a small family.', 'seatingArea' => 'Indoor', 'price' => 50.00, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Reservations
        DB::table('reservations')->insertOrIgnore([
            ['id' => 1, 'tableNumber' => '101', 'name' => 'Alice', 'phone' => '123456789', 'email' => 'alice@example.com', 'checkin' => '2025-01-20', 'checkout' => '2025-01-21', 'status' => 'Approved', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $this->command->info('Database seeded successfully!');
    }
}