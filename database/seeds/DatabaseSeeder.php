<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        factory(App\Models\User::class, 50)->create();
        factory(App\Models\Category::class, 5)->create();
        factory(App\Models\Category::class, 5)->create();
        factory(App\Models\Book::class, 50)->create();
        factory(App\Models\Review::class, 100)->create();
        factory(App\Models\Comment::class, 200)->create();
    }
}
