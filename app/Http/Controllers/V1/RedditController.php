<?php

namespace App\Http\Controllers\V1;

use App\Services\RedditService;

class RedditController extends Controller
{
    protected $redditService;

    public function __construct(RedditService $redditService)
    {
        $this->redditService = $redditService;
    }

    public function getPosts($subreddit, $category, FirebaseController $firebase)
    {
        // Get posts from RedditService
        $posts = $this->redditService->getPosts($subreddit, $category);
        // Store posts in firebase
        $store = $firebase->setRedditData($posts);
        // return success message
        return ['result'=>'reddit posts have been stored successfully'];
    }
}