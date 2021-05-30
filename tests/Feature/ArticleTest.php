<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    public function testArticlesAreCreatedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'title' => 'Lorem',
            'body' => 'Ipsum',
        ];

        $this->json('POST', '/api/articles', $payload, $headers)
            ->assertStatus(200)
            ->assertJson(['id' => 1, 'title' => 'Lorem', 'body' => 'Ipsum']);
    }

    public function testArticlesAreUpdatedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $article = Article::factory()->create([
            'title' => 'First Article',
            'body' => 'First Body',
        ]);

        $payload = [
            'title' => 'Lorem',
            'body' => 'Ipsum',
        ];

        $this->json('PUT', '/api/articles/' . $article->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
                'title' => 'Lorem',
                'body' => 'Ipsum'
            ]);
    }

    public function testArticlesAreDeletedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $article = Article::factory()->create([
            'title' => 'First Article',
            'body' => 'First Body',
        ]);

        $this->json('DELETE', '/api/articles/' . $article->id, [], $headers)
            ->assertStatus(204);
    }

    public function testArticlesAreListedCorrectly()
    {
        Article::factory()->create([
            'title' => 'First Article',
            'body' => 'First Body'
        ]);

        Article::factory()->create([
            'title' => 'Second Article',
            'body' => 'Second Body'
        ]);

        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/articles', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [ 'title' => 'First Article', 'body' => 'First Body' ],
                [ 'title' => 'Second Article', 'body' => 'Second Body' ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'body', 'title', 'created_at', 'updated_at'],
            ]);
    }

    public function testUnauthenticatedGetArticlesCorrectly()
    {
        $this->json('GET', '/api/articles')
            ->assertStatus(401)
            ->assertJson([
                'error' => 'Unauthenticated'
            ]);
    }
}
