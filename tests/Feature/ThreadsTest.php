<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }
    
    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function a_user_can_browse_all_threads()
    {
        $response = $this->get('threads');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function a_user_can_view_a_thread()
    {
        $response = $this->get('threads/' . $this->thread->channel->id . '/' . $this->thread->id);
        $response->assertSee($this->thread->title);
    }

    /**
     * @test
     */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);

        $response = $this->get('threads/' . $this->thread->channel->id . '/' . $this->thread->id);
        $response->assertSee($reply->body);
    }
}
