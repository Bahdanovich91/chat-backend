<?php

namespace Tests\Feature;

use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex(): void
    {
        $response = $this->get(route('message.index', 1));

        $response->assertStatus(200);
    }

    public function testShow(): void
    {
        $message = Message::factory()->create();

        $response = $this->get(route('message.show', $message->id));

        $response->assertStatus(200);
    }

    public function testStore(): void
    {
        $messageData = [
            'text' => $this->faker->text(),
            'user_id' => 1,
            'chat_id' => 1,
        ];

        $response = $this->post(route('message.store'), $messageData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('messages', $messageData);
    }

    public function testUpdate(): void
    {
        $message = Message::factory()->create();

        $newMessageData = [
            'text' => 'Test',
            'user_id' => 1,
            'chat_id' => 1,
        ];

        $response = $this->put(route('message.update', $message), $newMessageData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('messages', $newMessageData);
        $this->assertDatabaseMissing('messages', $message->toArray());
    }

    public function testDestroy(): void
    {
        $message = Message::factory()->create();

        $response = $this->delete(route('message.delete', $message));

        $response->assertStatus(204);
        $this->assertDatabaseMissing('messages', $message->toArray());
    }
}
