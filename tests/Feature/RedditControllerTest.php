<?php

namespace Tests\Feature;

use App\Http\Controllers\RedditController;
use App\Services\RedditService;
use App\Http\Controllers\FirebaseController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery;

class RedditControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        // Create mocks for RedditService and FirebaseController
        $redditService = Mockery::mock(RedditService::class);
        $firebaseController = Mockery::mock(FirebaseController::class);

        // Assume $posts is the data you want to test
        $posts = ['test_post_1', 'test_post_2'];

        // Mock the getPosts method to return the test data
        $redditService->shouldReceive('getPosts')->with('technology')->andReturn($posts);

        // Mock the setRedditData method to simulate storing data
        $firebaseController->shouldReceive('setRedditData')->with($posts)->andReturn(['result' => 'reddit posts have been stored successfully']);

        // Bind the mocks to the app container
        $this->app->instance(RedditService::class, $redditService);
        $this->app->instance(FirebaseController::class, $firebaseController);

        // Call the endpoint
        $response = $this->get('/reddit/technology');

        // Assert the response
        $response->assertJson(['result' => 'reddit posts have been stored successfully']);
        $response->assertStatus(200);
    }

    // Make sure to clean up the mocks after each test
    protected function tearDown(): void
    {
        Mockery::close();
    }
}
