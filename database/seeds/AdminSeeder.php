<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@bookreview.vn',
            'password' => 'admin',
            'is_admin' => true,
            'avatar_link' => null,
            'gender' => 1,
        ]);
    }
}
