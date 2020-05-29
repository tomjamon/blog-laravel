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
        $user = new \App\User();
        $user->name = 'Tom Jamon';
        $user->email = 'contact@tomjamon.com';
        $user->password = \Illuminate\Support\Facades\Hash::make('contact@tomjamon.com');
        $user->save();

        for ($i = 0; $i<4; $i++) {
            $post = new \App\Post();
            $post->title = 'Mon article '.$i;
            $post->slug = 'mon-article-'.$i;
            $post->user_id = $user->id;
            $post->save();
        }
        // $this->call(UserSeeder::class);
    }
}
