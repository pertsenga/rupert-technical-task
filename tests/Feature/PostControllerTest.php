<?php

describe('PostController', function () {
    it('returns a successful response', function () {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    });

    describe('create', function () {
        it('returns a successful response', function () {
            $response = $this->get('/posts/create');

            $response->assertStatus(200);
        });
    });

    describe('store', function () {
        it('redirects to index', function () {
            $response = $this->post('/posts', [
                'userId' => 1,
                'title' => 'Test Post',
                'body' => 'This is a test post.',
            ]);

            $response->assertRedirect(route('posts.index')); //
        });
    });
});
