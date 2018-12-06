<?php

use Illuminate\Database\Seeder;

use App\Thread;
use App\Reply;

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

        factory(Thread::class, 10)->create()->each(function($thread){
            factory(Reply::class, 20)->create(['thread_id' => $thread->id]);
        });
    }
}
