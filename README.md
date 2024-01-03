# Laravel Firebase Reddit API

This Laravel application demonstrates how to create an API that requests and stores data in Firebase, and then displays the posts lists of the `/r/{subreddit}` using two routes: one for Firebase data and the other for Reddit posts.

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

Place your Firebase service account key file (json format) in the config directory.

4. Set Firebase credentials in the .env file:

makefile
```
FIREBASE_CREDENTIALS=your-service-account-key.json
FIREBASE_DATABASE_URL=your-firebase-database-url
```

5. Retrieve data from Firebase:

```php
Route::get('/', [FirebaseController::class, 'getRedditData']);
```

6. Retrieve posts from a specific subreddit:

```php
Route::get('/reddit/{subreddit}', [RedditController::class, 'getPosts']);
```

## Usage
1. Start the Laravel development server:

```bash
php artisan serve
```

2. Access the routes:

Firebase Data: http://localhost:8000/
Reddit Posts (replace {subreddit} with the desired subreddit): http://localhost:8000/reddit/{subreddit}
Customization
Feel free to customize the controllers, services, and views to match your specific requirements. Add error handling, logging, and other features as needed.

Contributors
Abdallah Aboudeif


Replace placeholders such as `your-username`, `your-service-account-key.json`, and `your-firebase-database-url` with your actual values.

