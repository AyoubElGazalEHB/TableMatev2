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
        // Users with realistic profiles
        DB::table('users')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@ehb.be',
                'password' => Hash::make('Password!321'),
                'typeUser' => '1',
                'aboutMe' => 'TableMate administrator with a passion for great dining experiences and customer service.',
                'birthday' => '1990-05-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Sarah Johnson',
                'email' => 'user@user.be',
                'password' => Hash::make('password'),
                'typeUser' => '0',
                'aboutMe' => 'Food enthusiast and restaurant explorer. Love trying new cuisines and sharing experiences!',
                'birthday' => '1995-08-22',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Marco Rodriguez',
                'email' => 'marco@example.com',
                'password' => Hash::make('password'),
                'typeUser' => '0',
                'aboutMe' => 'Professional chef and culinary artist. Always looking for the perfect dining experience.',
                'birthday' => '1988-12-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Emma Thompson',
                'email' => 'emma@example.com',
                'password' => Hash::make('password'),
                'typeUser' => '0',
                'aboutMe' => 'Travel blogger specializing in food and restaurant reviews. Brussels local!',
                'birthday' => '1992-03-18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'David Chen',
                'email' => 'david@example.com',
                'password' => Hash::make('password'),
                'typeUser' => '0',
                'aboutMe' => 'Local foodie and TableMate regular. Love sharing restaurant recommendations with friends!',
                'birthday' => '1985-11-07',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // FAQ Categories
        DB::table('faq_categories')->insertOrIgnore([
            ['id' => 1, 'title' => 'Reservations', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'title' => 'Dining Experience', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'title' => 'Special Requirements', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // FAQ Items with realistic questions
        DB::table('faq_items')->insertOrIgnore([
            ['id' => 1, 'faq_categories_id' => 1, 'user_id' => 2, 'question' => 'How far in advance can I make a reservation?', 'answer' => 'You can make reservations up to 30 days in advance through our platform.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'faq_categories_id' => 1, 'user_id' => 3, 'question' => 'Can I modify or cancel my reservation?', 'answer' => 'Yes, you can modify or cancel your reservation up to 24 hours before your scheduled time.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'faq_categories_id' => 2, 'user_id' => 4, 'question' => 'Do restaurants accommodate dietary restrictions?', 'answer' => 'Most of our partner restaurants can accommodate common dietary restrictions. Please mention them when making your reservation.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'faq_categories_id' => 2, 'user_id' => 5, 'question' => 'What is the dress code for fine dining restaurants?', 'answer' => 'Dress codes vary by restaurant. Check the restaurant details or contact them directly for specific requirements.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'faq_categories_id' => 3, 'user_id' => 2, 'question' => 'Are high chairs available for children?', 'answer' => 'Most restaurants provide high chairs, but we recommend mentioning this when making your reservation to ensure availability.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'faq_categories_id' => 3, 'user_id' => 3, 'question' => 'Can I request a specific table location?', 'answer' => 'You can make special requests, but specific table assignments are subject to availability and restaurant policy.', 'created_at' => now(), 'updated_at' => now()],
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

        // News with realistic content
        DB::table('news')->insertOrIgnore([
            [
                'id' => 1,
                'title' => 'New Michelin-Starred Restaurant Opens in Brussels',
                'image_path' => 'news/image1.jpg',
                'content' => 'We are thrilled to announce that Le Jardin Étoilé, a new Michelin-starred restaurant, has joined our TableMate platform! Located in the heart of Brussels, this exquisite dining establishment offers contemporary French cuisine with a Belgian twist. Chef Antoine Dubois brings over 15 years of culinary expertise to create an unforgettable dining experience. The restaurant features locally sourced ingredients and an extensive wine collection. Reservations are now available through TableMate!',
                'publication_date' => '2025-01-15',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => 'TableMate Celebrates 10,000 Successful Reservations',
                'image_path' => 'news/image2.jpg',
                'content' => 'What an incredible milestone! TableMate has officially facilitated over 10,000 successful restaurant reservations since our launch. This achievement wouldn\'t have been possible without our amazing community of food lovers and our trusted restaurant partners. To celebrate, we\'re launching a special promotion: book any reservation this month and get a 10% discount on your next dining experience. Thank you for making TableMate your go-to platform for exceptional dining!',
                'publication_date' => '2025-01-10',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'title' => 'Winter Menu Highlights: Seasonal Delights Await',
                'image_path' => 'news/image3.jpg',
                'content' => 'As winter settles in, our partner restaurants are showcasing their most creative seasonal menus. From hearty Belgian stews to delicate winter vegetables, there\'s something special waiting at every table. Many restaurants are featuring limited-time winter specials, including truffle dishes, warming soups, and festive desserts. Don\'t miss out on these seasonal culinary adventures - book your winter dining experience today!',
                'publication_date' => '2025-01-05',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Comments with user relationships
        DB::table('comments')->insertOrIgnore([
            ['id' => 1, 'news_id' => 1, 'user_id' => 2, 'name' => 'Sarah Johnson', 'comment' => 'Finally! I\'ve been waiting for a Michelin-starred restaurant to join TableMate. Can\'t wait to try Le Jardin Étoilé!', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'news_id' => 1, 'user_id' => 3, 'name' => 'Marco Rodriguez', 'comment' => 'As a chef myself, I\'m really excited to experience Chef Dubois\' cuisine. The menu looks absolutely incredible!', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'news_id' => 1, 'user_id' => 4, 'name' => 'Emma Thompson', 'comment' => 'This is going to be perfect for my next restaurant review! Already made a reservation for next week.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'news_id' => 2, 'user_id' => 5, 'name' => 'David Chen', 'comment' => 'Congratulations TableMate! I\'ve made at least 20 reservations through your platform. Keep up the great work!', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'news_id' => 2, 'user_id' => 2, 'name' => 'Sarah Johnson', 'comment' => 'Love the 10% discount promotion! TableMate just keeps getting better and better.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'news_id' => 3, 'user_id' => 3, 'name' => 'Marco Rodriguez', 'comment' => 'Winter menus are always my favorite! The seasonal ingredients make such a difference in flavor.', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Tables with realistic data
        DB::table('tables')->insertOrIgnore([
            [
                'id' => 1,
                'image' => 'table1.jpg',
                'tableNumber' => 101,
                'persons' => 2,
                'description' => 'Intimate table for two with a romantic ambiance. Perfect for date nights and special occasions.',
                'seatingArea' => 'Indoor',
                'price' => 75.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'image' => 'table2.jpg',
                'tableNumber' => 102,
                'persons' => 4,
                'description' => 'Comfortable family table with excellent service. Ideal for small gatherings and business dinners.',
                'seatingArea' => 'Indoor',
                'price' => 120.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'image' => 'table3.jpg',
                'tableNumber' => 201,
                'persons' => 6,
                'description' => 'Spacious table for larger groups. Features premium seating with panoramic city views.',
                'seatingArea' => 'Indoor',
                'price' => 180.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'image' => 'table4.jpg',
                'tableNumber' => 301,
                'persons' => 8,
                'description' => 'Exclusive VIP table for special celebrations. Includes dedicated service and premium amenities.',
                'seatingArea' => 'Private Dining',
                'price' => 250.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'image' => 'table5.jpg',
                'tableNumber' => 401,
                'persons' => 3,
                'description' => 'Cozy corner table with artistic decor. Perfect for intimate conversations and wine tastings.',
                'seatingArea' => 'Indoor',
                'price' => 95.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'image' => 'table6.jpg',
                'tableNumber' => 501,
                'persons' => 10,
                'description' => 'Grand banquet table for large celebrations. Features elegant setup and premium location.',
                'seatingArea' => 'Banquet Hall',
                'price' => 350.00,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Reservations
        DB::table('reservations')->insertOrIgnore([
            ['id' => 1, 'tableNumber' => '101', 'name' => 'Alice', 'phone' => '123456789', 'email' => 'alice@example.com', 'checkin' => '2025-01-20', 'checkout' => '2025-01-21', 'status' => 'Approved', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $this->call(RoleSeeder::class);

        $this->command->info('Database seeded successfully!');
    }
}