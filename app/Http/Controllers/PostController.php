<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;

class PostController extends Controller
{
    const JSON_PLACEHOLDER_POSTS_URL = 'https://jsonplaceholder.typicode.com/posts';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Laravel's Illuminate\Support\Facades\Http Facade uses Guzzle under the hood
        // but since the Technical Task instructions require the use of Guzzle, we'll use it directly
        $client = new GuzzleClient();
        $response = $client->get($this::JSON_PLACEHOLDER_POSTS_URL);
        $posts = json_decode($response->getBody(), true);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
}
