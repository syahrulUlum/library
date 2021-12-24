<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $catalog = new Catalog();

            $catalog->name = $faker->name();
            $catalog->created_at = date('H:i:s', rand(1, 54000));
            $catalog->save();
        }
    }
}
