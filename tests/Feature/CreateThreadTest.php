<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */

     public function an_authenticated_user_can_create_new_forum_threads()
     {
        $this->signIn();

        $thread = factory('App\Thread')->make();

        $this->post('threads', $thread->toArray());

        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
     }
     
     /**
      * @test
      */
      
      public function guest_may_not_create_new_forum_threads()
      {
        $this->expectException(\Illuminate\Auth\AuthenticationException::class);

        $thread = factory('App\Thread')->make();

        $this->post('threads', $thread->toArray());
      }
}