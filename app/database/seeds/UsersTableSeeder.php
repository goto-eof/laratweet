<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        User::truncate();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
                'username' => $faker->unique()->firstName,
                'email' => $faker->unique()->email,
                'password' =>  Hash::make('password'),
                'bio' => $faker->text(140)
                //'img_uri' => '',
			]);
		}
	}

}