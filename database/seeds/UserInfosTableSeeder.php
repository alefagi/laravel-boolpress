<?php

use Illuminate\Database\Seeder;
use App\UserInfo;
use Faker\Generator as Faker;

class UserInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_info = new UserInfo;
        $user_info->user_id = '3';
        $user_info->lastname = $faker->lastname();
        $user_info->address = $faker->address();
        $user_info->phone = $faker->phoneNumber();
        $user_info->save();
    }
}
