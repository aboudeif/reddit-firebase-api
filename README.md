# Laravel Firebase Reddit API

This Laravel application demonstrates how to create an API that requests and stores data in Firebase, and then displays the posts lists of the `/api/v1/reddit/{subreddit}/{category}` using two routes: one for Firebase data and the other for Reddit posts.

## Prerequisites

- [Composer](https://getcomposer.org/) installed
- [Firebase Project](https://console.firebase.google.com/) created with service account credentials
- Reddit API credentials (if necessary)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/your-username/laravel-firebase-reddit-api.git
```
2. Install dependencies:

```bash
cd laravel-firebase-reddit-api
```
```bash
composer install
```
3. Configure Firebase:

Place your Firebase service account key file (json format) in "/storage/app/" directory.

4. Set Firebase credentials in the .env file:

```
FIREBASE_DATABASE_URL=your-firebase-database-url
```
5. Create a Reddit Developer Account and Application:

 - Go to the Reddit Developer Platform.
 - Log in with your Reddit account or create a new one.
 - Click on the "Create App" or "Create Another App" button.
 - Fill out the required information for your new application (name, description, app type, etc.).
 - Set the redirect URI. For a Laravel project running locally, you can use http://localhost:8000/callback (adjust the port as needed).
   
6. Get Reddit API Credentials:

After creating the app, you'll get a set of credentials:
 - Client ID (under the app name)
 - Client Secret (click the "edit" button to reveal it)

7. Set Environment Variables:
 - Open your project's .env file.
 - Add the following lines and fill in the values you obtained from the Reddit Developer platform:
   
```
REDDIT_CLIENT_ID=your-client-id
REDDIT_CLIENT_SECRET=your-client-secret
REDDIT_REDIRECT_URI=http://localhost:8000/callback
```

8. Retrieve data from Firebase:

```php
Route::get('/api/v1/', [FirebaseController::class, 'getRedditData']);
```

9. Retrieve posts from a specific subreddit with a specific category (hot, new, rising):

```php
Route::get('/api/v1/reddit/{subreddit}/{category}', [RedditController::class, 'getPosts']);
```

## Usage
1. Start the Laravel development server:

```bash
php artisan serve
```

2. Access the routes:

- Firebase Data: http://localhost:8000/api/v1/
- Reddit Posts (replace {subreddit} with the desired subreddit):
  - Hot Posts: http://localhost:8000/api/v1/reddit/{subreddit}/hot
  - New Posts: http://localhost:8000/api/v1/reddit/{subreddit}/new
  - Rising Posts: http://localhost:8000/api/v1/reddit/{subreddit}/rising

## Customization
Feel free to customize the controllers, services, and views to match your specific requirements. Add error handling, logging, and other features as needed.

## Contributors
Abdallah Aboudeif


Replace placeholders such as `your-username`, `your-service-account-key.json`, and `your-firebase-database-url` with your actual values.

