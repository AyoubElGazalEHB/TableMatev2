<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\FAQItemController;
use App\Models\FAQCategoryController;
use App\Models\Contact;
use App\Models\Table;
use App\Models\Reservation;

class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


// Admin Users
    User::create([
        'name' => 'admin',
        'email' => 'admin@ehb.be',
        'password' => Hash::make('Password!321'),
        'typeUser' => '1',
        'aboutMe' => 'i am the first user ever',
        'birthday' => '2023-12-14',
        'created_at' => now(),
        'updated_at' => now()
    ]);      



// Normal Users
    User::create([
        'name' => 'ben',
        'email' => 'ben@gmail.com',
        'password' => Hash::make('azerty16'),
        'typeUser' => '0',
        'aboutMe' => 'i am the second user ever',
        'birthday' => '2023-10-12',
        'created_at' => now(),
        'updated_at' => now()
    ]);  

//FAQ categorie
 DB::table('faq_categories')->insert([
            ['title' => 'General Questions', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Account Issues', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Payment and Billing', 'created_at' => now(), 'updated_at' => now()],
        ]);
 


//FAQ items
DB::table('faq_items')->insert([
            [
                'faq_categories_id' => 1,
                'question' => 'How do I create an account?',
                'answer' => 'To create an account, click on the "Sign Up" link and fill out the registration form.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faq_categories_id' => 1,
                'question' => 'How can I reset my password?',
                'answer' => 'You can reset your password by clicking on the "Forgot Password" link on the login page.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faq_categories_id' => 2,
                'question' => 'I forgot my username. What should I do?',
                'answer' => 'If you forgot your username, please contact our support team for assistance.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faq_categories_id' => 3,
                'question' => 'How can I update my billing information?',
                'answer' => 'To update your billing information, log in to your account and go to the "Billing" section.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


//Contact forms
DB::table('contacts')->insert([
            ['name' => 'Robert vanden plop', 'email' => 'robert@gmail.com' ,'message' => 'Hello, I would like to make a video in you\'re hotel','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tyrana Lofembeek', 'email' => 'tyrana@gmail.com' ,'message' => 'Are they any vegan food in the hotel ?','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Karen', 'email' => 'karen@gmail.com' ,'message' => 'I would like to speak to you\'re manager','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ronaldo', 'email' => 'roro@gmail.com' ,'message' => 'This is Ronaldo, i want free table','created_at' => now(), 'updated_at' => now()],
        ]);



// Tables
DB::table('tables')->insert([
            ['tableNumber' => '212', 'image' => 'Table212.webp' ,'description' => 'This is a tradition table that is more than good', 'classTable' => 'Simple', 'price' => '140','persons' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['tableNumber' => '210', 'image' => 'Table210.jpeg' ,'description' => 'This extra comfort table has a good view', 'classTable' => 'Modern', 'price' => '220','persons' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['tableNumber' => '134', 'image' => 'Table134.jpeg' ,'description' => 'The Chamber of the king is the must luxury than you will ever see', 'classTable' => 'Luxe', 'price' => '320','persons' => '2', 'created_at' => now(), 'updated_at' => now()],
        ]);


// Reservations
DB::table('reservations')->insert([
            ['tableNumber' => '212', 'name' => 'Carol' ,'phone' => '+32486756546', 'email' => 'Carol@gmail.com', 'checkin' => '21/12/2022','checkout' => '30/12/2022', 'status' => 'In progress', 'created_at' => now(), 'updated_at' => now()],
            ['tableNumber' => '210', 'name' => 'Bob' ,'phone' => '+32486756987', 'email' => 'Bobl@gmail.com', 'checkin' => '04/05/2023','checkout' => '29/12/2022', 'status' => 'Approved', 'created_at' => now(), 'updated_at' => now()],
            ['tableNumber' => '134', 'name' => 'Molly' ,'phone' => '+3248675477', 'email' => 'Molly@gmail.com', 'checkin' => '12/12/2022','checkout' => '27/12/2022', 'status' => 'Denied', 'created_at' => now(), 'updated_at' => now()],
        ]);

}
}