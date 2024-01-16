<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\WhyChooseUsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        \App\Models\Slider::factory(3)->create();

        $this->call(UserSeeder::class);
        $this->call(WhyChooseUsTitleSeeder::class);
        $this->call(CategorySeeder::class);

        \App\Models\WhyChooseUs::factory(3)->create();
        \App\Models\Product::factory(10)->create();
        

    }
}
