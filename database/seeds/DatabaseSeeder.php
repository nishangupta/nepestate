<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //comment UserTypeSeeder if already userTypes already exits
        $this->call(UserTypeSeeder::class);
        $this->call(PropertySeeder::class);
    }
}
