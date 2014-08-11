<?php

class FollowingsTableSeeder extends Seeder
{

    public function run()
    {
        Following::truncate();
        Following::create(['user_id' => 1, 'follows_user_id' => 1]);
        Following::create(['user_id' => 1, 'follows_user_id' => 3]);
        Following::create(['user_id' => 1, 'follows_user_id' => 5]);
        Following::create(['user_id' => 1, 'follows_user_id' => 7]);
        Following::create(['user_id' => 1, 'follows_user_id' => 9]);
        Following::create(['user_id' => 2, 'follows_user_id' => 1]);
        Following::create(['user_id' => 2, 'follows_user_id' => 3]);
        Following::create(['user_id' => 2, 'follows_user_id' => 4]);
        Following::create(['user_id' => 2, 'follows_user_id' => 6]);
        Following::create(['user_id' => 2, 'follows_user_id' => 8]);
        Following::create(['user_id' => 2, 'follows_user_id' => 10]);
    }

}