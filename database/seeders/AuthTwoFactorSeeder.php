<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthTwoFactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php faker
        $faker = \Faker\Factory::create();

        // Delete existing records from the table
        DB::table('auth_two_factor')->delete();

        // Insert new records
        DB::table('auth_two_factor')->insert([
            [
                'uuid' => $faker->uuid,
                'name' => 'email',
            ],
            // Add more records as needed
        ]);
    }
}
