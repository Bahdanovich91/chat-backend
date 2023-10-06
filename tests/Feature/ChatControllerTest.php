<?php

namespace Tests\Feature;

use App\Models\Chat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChatControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex(): void
    {
        $response = $this->get(route('chat.index'));

        $response->assertStatus(200);
    }

    public function testShow(): void
    {
        $chat = Chat::factory()->create();

        $response = $this->get(route('chat.show', $chat->id));

        $response->assertStatus(200);
    }

    public function testStore(): void
    {
        $chatData = [
            'title' => $this->faker->unique()->title(),
        ];

        $response = $this->post(route('chat.store'), $chatData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('chats', $chatData);
    }

    public function testUpdate(): void
    {
        $chat = Chat::factory()->create();

        $newChatData = [
            'title' => 'Test',
        ];

        $response = $this->put(route('chat.update', $chat->id), $newChatData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('chats', $newChatData);
        $this->assertDatabaseMissing('chats', $chat->toArray());
    }

    public function testDestroy(): void
    {
        $chat = Chat::factory()->create();

        $response = $this->delete(route('chat.delete', $chat));

        $response->assertStatus(204);
        $this->assertDatabaseMissing('chats', $chat->toArray());
    }
}
