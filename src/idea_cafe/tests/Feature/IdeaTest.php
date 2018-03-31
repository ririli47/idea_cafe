<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use IdeasCafe\Idea;
use IdeasCafe\Http\Controllers\IdeaController;

class IdeaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testIndex()
    {
        $response = $this->get('/');
        $this->assertEquals(200, $response->getStatusCode());


    }

    public function testShouldGetIdeas()
    {
        // $ideas = Idea::orderBy('updated_at', 'DESC')->get();
        // $this->assertGreaterThan(1, count($ideas));
        // $response =  view('idea.index');
        // $this->assertEquals(200, $response->getStatusCode());


        $this->browse(function ($browser) {
            $browser->visit('/')
                    -> assertSee('あなた');
        });

    }
}
