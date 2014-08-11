<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class TweetsTableSeeder extends Seeder
{

    public function run()
    {
        User::truncate();

        Tweet::create(['user_id' => 1, 'text' => 'OHHHH MY GODDDD I GOT A SELFIEEEEEEEE ', 'status' => 'published']);
        Tweet::create(['user_id' => 2, 'text' => 'There\'s a plane in the Hudson. I\'m on the ferry going to pick up the people. Crazy.', 'status' => 'published']);
        Tweet::create(['user_id' => 4, 'text' => 'Helicopter hovering above Abbottabad at 1AM (is a rare event).', 'status' => 'published']);
        Tweet::create(['user_id' => 3, 'text' => 'So I\'m told by a reputable person they have killed Osama Bin Laden. Hot damn.', 'status' => 'published']);
        Tweet::create(['user_id' => 6, 'text' => 'just setting up my twttr', 'status' => 'published']);
        Tweet::create(['user_id' => 5, 'text' => 'India has won! भारत की विजय। अच्छे दिन आने वाले हैं।', 'status' => 'published']);
        Tweet::create(['user_id' => 8, 'text' => 'We can neither confirm nor deny that this is our first tweet.', 'status' => 'published']);
        Tweet::create(['user_id' => 7, 'text' => 'Thank you for the @Twitter welcome! We look forward to sharing great #unclassified content with you.', 'status' => 'published']);
        Tweet::create(['user_id' => 10, 'text' => '@CIA We look forward to sharing great classified info about you http://t.co/QcdVxJfU4X https://t.co/kcEwpcitHo More: https://t.co/PEeUpPAt7F', 'status' => 'published']);
        Tweet::create(['user_id' => 9, 'text' => 'If only Bradley\'s arm was longer. Best photo ever. #oscars', 'status' => 'published']);
        Tweet::create(['user_id' => 2, 'text' => 'Four more years.', 'status' => 'published']);
        Tweet::create(['user_id' => 1, 'text' => 'Facebook turned me down. It was a great opportunity to connect with some fantastic people. Looking forward to life\'s next adventure.', 'status' => 'published']);
        Tweet::create(['user_id' => 4, 'text' => 'Got denied by Twitter HQ. That\'s ok. Would have been a long commute.', 'status' => 'published']);
        Tweet::create(['user_id' => 3, 'text' => 'Are you ready to celebrate? Well, get ready: We have ICE!!!!! Yes, ICE, *WATER ICE* on Mars! w00t!!! Best day ever!!', 'status' => 'published']);
        Tweet::create(['user_id' => 6, 'text' => 'Hello Twitterverse! We r now LIVE tweeting from the International Space Station -- the 1st live tweet from Space! :) More soon, send your ?s', 'status' => 'published']);
        Tweet::create(['user_id' => 5, 'text' => 'I\'m safely on the surface of Mars. GALE CRATER I AM IN YOU!!! #MSL', 'status' => 'published']);
        Tweet::create(['user_id' => 8, 'text' => '@Cmdr_Hadfield Are you tweeting from space? MBB', 'status' => 'published']);
        Tweet::create(['user_id' => 5, 'text' => '@WilliamShatner Yes, Standard Orbit, Captain. And we\'re detecting signs of life on the surface.', 'status' => 'published']);
        Tweet::create(['user_id' => 10, 'text' => 'Everest summit! -Sent with @DeLormeGPS Earthmate PN-60w', 'status' => 'published']);
        Tweet::create(['user_id' => 7, 'text' => 'Arrested', 'status' => 'published']);
        Tweet::create(['user_id' => 2, 'text' => 'Just another night of playing Cards Against Humanity...', 'status' => 'published']);
        Tweet::create(['user_id' => 9, 'text' => 'Ugh - NEVER going to a Ryan Gosling movie in a theater again. Apparently masturbating in the back row is still considered "inappropriate"', 'status' => 'published']);
        Tweet::create(['user_id' => 4, 'text' => 'I don\'t know why I wasn\'t invited, I\'m great at weddings... @KimKardashian @kanyewest', 'status' => 'published']);
        Tweet::create(['user_id' => 9, 'text' => 'The best way to get a man to do something is to suggest they are too old for it', 'status' => 'published']);


    }

}