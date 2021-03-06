<?php

use App\Answer;
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
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class,3)->create()->each(function($user){
            $user->question()->saveMany(factory(App\Question::class,rand(1,5))->make())
            ->each(function($question){
                $question->answer()->saveMany(factory(App\Answer::class,rand(1,5))->make());
            });
        });
    }
}
