<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class FirebaseController extends Controller
{
    // Declare properties to hold Firebase objects
    private $firebase;
    private $database;

    // Constructor to initialize Firebase objects
    public function __construct()
    {
        $this->firebase = (new Factory)
            ->withServiceAccount(storage_path('app/reddit-firebase.json'))
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));
        $this->database = $this->firebase->createDatabase();
    }

    /**
     * Show data from firebase firestore
     */
    public function getRedditData()
    {
        $data = $this->database->getReference('reddit-data');
        return $data->getValue();
    }

    /**
     * Store data in firebase firestore
     */
    public function setRedditData($data)
    {
        $this->database->getReference('reddit-data')->push($data);
        return response()->json(['message' => 'Data stored successfully']);
    }
}
