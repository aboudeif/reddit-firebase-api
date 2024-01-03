<?php

namespace App\Services;

use App\Http\Controllers\FirebaseController;
use Illuminate\Support\Facades\Http;
use Kreait\Laravel\Firebase\Facades\Firebase;

class RedditService
{
    protected $firestore;

    public function __construct()
    {
        
    }

    public function getPosts($subreddit)
    {
        // Fetch Reddit API credentials from environment variables
        $clientId = env('REDDIT_CLIENT_ID', '/reddit-firebase.json');
        $clientSecret = env('REDDIT_CLIENT_SECRET');

        // Make HTTP request to Reddit API
        $response = Http::get("https://www.reddit.com/r/$subreddit.json", [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ]);

        // Handle HTTP request errors
        if (!$response->successful()) {
            return [];
        }

        // Extract posts from Reddit API response
        $posts = $response->json()['data']['children'];

        // Store data in Firebase Firestore
        $this->storeInFirebase($subreddit, $posts);

        // Return the posts
        return $posts;
    }

    protected function storeInFirebase($subreddit, $posts)
    {
        // Store posts in Firebase Firestore under 'reddit_data' collection
        $firebase = new FirebaseController;
        $firebase->setRedditData($posts);
        // $document = $this->firestore->database()->collection('reddit_data')->document($subreddit);
        // $document->set(['posts' => $posts]);
    }
}