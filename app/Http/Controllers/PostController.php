<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use GuzzleHttp\Client as GuzzleClient;
use Redirect;

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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $client = new GuzzleClient();
        $client->post($this::JSON_PLACEHOLDER_POSTS_URL, [
            'form_params' => [
                'userId' => $data['userId'],
                'title' => $data['title'],
                'body' => $data['body']
            ]
        ]);

        return Redirect::route('posts.index')->with('flash', 'Post created successfully');
    }
}
