<?php

namespace App\Http\Controllers;

use App\Services\RedditService;
use App\Http\Controllers\FirebaseController;

class RedditController extends Controller
{
    protected $redditService;

    public function __construct(RedditService $redditService)
    {
        $this->redditService = $redditService;
    }

    public function getPosts($subreddit, FirebaseController $firebase)
    {
        // Get posts from RedditService
        $posts = $this->redditService->getPosts($subreddit);
        // Store posts in firebase
        $store = $firebase->setRedditData($posts);
        // return success message
        return ['result'=>'reddit posts have been stored successfully'];
    }
}