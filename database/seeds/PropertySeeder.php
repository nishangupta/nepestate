<?php

use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 26; $i++) {
            factory(App\Property::class)->create(['img_url' => 'img/property/' . $i . '.jpg']);
        }
    }
}
