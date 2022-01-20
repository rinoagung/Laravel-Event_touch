<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Bob",
            "username" => "bob",
            "email" => "Bob@gmail.com",
            "password" => bcrypt("12345")
        ]);

        // User::create([
        //     "name" => "Pooh",
        //     "email" => "Pooh@gmail.com",
        //     "password" => bcrypt("12345")
        // ]);

        \App\Models\User::factory(3)->create();

        Category::create([
            "name" => "Seminar",
            "slug" => "seminar"
        ]);

        Category::create([
            "name" => "Pentas Seni",
            "slug" => "pentas-seni"
        ]);

        Category::create([
            "name" => "Pameran Seni",
            "slug" => "pameran-seni"
        ]);

        Event::factory(17)->create();

        // Event::create([
        //     "title" => "Judul Pertama",
        //     "slug" => "judul-pertama",
        //     "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut harum sapiente laboriosam illo quasi.",
        //     "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus saepe porro tempora animi a! Assumenda eos ducimus ad velit saepe, unde deleniti sunt officiis voluptate quos? Ad maxime quidem repudiandae nesciunt id est tempore vel voluptatum laboriosam corrupti praesentium ea aliquid, odio voluptas pariatur natus. Velit molestiae impedit assumenda quae eos, aliquam asperiores veritatis quasi ex aut voluptatibus tempore blanditiis porro nostrum labore illo beatae autem! Laborum quaerat officiis laudantium autem eos neque similique ut hic vero quibusdam mollitia et quae adipisci dolorum tenetur reiciendis distinctio quisquam quos, nulla tempora deserunt eaque ipsum fugit? Consequatur distinctio eos quia perspiciatis dignissimos eum consequuntur veritatis modi incidunt, a officia provident quibusdam reprehenderit, aspernatur alias. Voluptatibus explicabo, eligendi aliquam et molestias eaque odio.",
        //     "category_id" => 1,
        //     "user_id" => 1
        // ]);

        // Event::create([
        //     "title" => "Judul Kedua",
        //     "slug" => "judul-kedua",
        //     "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut harum sapiente laboriosam illo quasi.",
        //     "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus saepe porro tempora animi a! Assumenda eos ducimus ad velit saepe, unde deleniti sunt officiis voluptate quos? Ad maxime quidem repudiandae nesciunt id est tempore vel voluptatum laboriosam corrupti praesentium ea aliquid, odio voluptas pariatur natus. Velit molestiae impedit assumenda quae eos, aliquam asperiores veritatis quasi ex aut voluptatibus tempore blanditiis porro nostrum labore illo beatae autem! Laborum quaerat officiis laudantium autem eos neque similique ut hic vero quibusdam mollitia et quae adipisci dolorum tenetur reiciendis distinctio quisquam quos, nulla tempora deserunt eaque ipsum fugit? Consequatur distinctio eos quia perspiciatis dignissimos eum consequuntur veritatis modi incidunt, a officia provident quibusdam reprehenderit, aspernatur alias. Voluptatibus explicabo, eligendi aliquam et molestias eaque odio.",
        //     "category_id" => 1,
        //     "user_id" => 1
        // ]);

        // Event::create([
        //     "title" => "Judul Ketiga",
        //     "slug" => "judul-ketiga",
        //     "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut harum sapiente laboriosam illo quasi.",
        //     "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus saepe porro tempora animi a! Assumenda eos ducimus ad velit saepe, unde deleniti sunt officiis voluptate quos? Ad maxime quidem repudiandae nesciunt id est tempore vel voluptatum laboriosam corrupti praesentium ea aliquid, odio voluptas pariatur natus. Velit molestiae impedit assumenda quae eos, aliquam asperiores veritatis quasi ex aut voluptatibus tempore blanditiis porro nostrum labore illo beatae autem! Laborum quaerat officiis laudantium autem eos neque similique ut hic vero quibusdam mollitia et quae adipisci dolorum tenetur reiciendis distinctio quisquam quos, nulla tempora deserunt eaque ipsum fugit? Consequatur distinctio eos quia perspiciatis dignissimos eum consequuntur veritatis modi incidunt, a officia provident quibusdam reprehenderit, aspernatur alias. Voluptatibus explicabo, eligendi aliquam et molestias eaque odio.",
        //     "category_id" => 2,
        //     "user_id" => 1
        // ]);
        // Event::create([
        //     "title" => "Judul Keempat",
        //     "slug" => "judul-keempat",
        //     "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut harum sapiente laboriosam illo quasi.",
        //     "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus saepe porro tempora animi a! Assumenda eos ducimus ad velit saepe, unde deleniti sunt officiis voluptate quos? Ad maxime quidem repudiandae nesciunt id est tempore vel voluptatum laboriosam corrupti praesentium ea aliquid, odio voluptas pariatur natus. Velit molestiae impedit assumenda quae eos, aliquam asperiores veritatis quasi ex aut voluptatibus tempore blanditiis porro nostrum labore illo beatae autem! Laborum quaerat officiis laudantium autem eos neque similique ut hic vero quibusdam mollitia et quae adipisci dolorum tenetur reiciendis distinctio quisquam quos, nulla tempora deserunt eaque ipsum fugit? Consequatur distinctio eos quia perspiciatis dignissimos eum consequuntur veritatis modi incidunt, a officia provident quibusdam reprehenderit, aspernatur alias. Voluptatibus explicabo, eligendi aliquam et molestias eaque odio.",
        //     "category_id" => 2,
        //     "user_id" => 2
        // ]);
    }
}
