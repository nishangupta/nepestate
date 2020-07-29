<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array(
            'Home Buyer', 'Home Seller', 'Both Home Buyer and Seller', 'Renter', 'Rentee/Rent payer'
        );
        foreach ($types as $type) {
            factory(App\UserType::class)->create(['user_type' => $type]);
        }
    }
}
