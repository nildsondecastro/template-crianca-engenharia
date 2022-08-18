<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'Nildson',
            'email' => 'nildsond@gmail.com',
            'password' => bcrypt('12345678'),
            'super_admin' => true,
            'username' => 'nildson'
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
