<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoardStoreTest extends TestCase
{
    use RefreshDatabase;
    public function test_create_board()
    {
        $response = $this->postJson('/api/create-board', [
            'name' => 'new board',
            'description' => 'new board is good',
        ]);
        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Board created successfully!',
            ]);
    }
    public function test_user_cannot_create_duplicate_board_name()
    {
        $this->postJson('/api/create-board', [
            'name' => 'Duplicate Board',
            'description' => 'Another description.',
        ]);
        $response = $this->postJson('/api/create-board', [
            'name' => 'Duplicate Board',
            'description' => 'Another description.',
        ]);
        $response->assertStatus(409)
            ->assertJson([
                'message' => 'UserID 2 cannot create a board with the same name.',
            ]);
    }
}
