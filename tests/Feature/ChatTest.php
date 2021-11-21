<?php

namespace Tests\Feature;

use App\Http\Livewire\Chat;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ChatTest extends TestCase
{
    use RefreshDatabase;

    public function test_chat_only_for_logged_users()
    {
        /** @var mixed $user */
        $user = User::factory()->make();

        $this
            ->get('/dashboard/chat')
            ->assertStatus(302);

        $this
            ->actingAs($user)
            ->get('/dashboard/chat')
            ->assertStatus(200);
    }

    public function test_chat_is_livewire_component()
    {
        /** @var mixed $user */
        $user = User::factory()->make();

        $this
            ->actingAs($user)
            ->get('/dashboard/chat')
            ->assertSeeLivewire('chat');
    }

    public function test_create_chat_and_after_set_active_chat()
    {
        $message = 'Hello';
        $sender = User::factory()->create();
        $receiver = User::factory()->create();

        $livewire = Livewire::actingAs($sender)
            ->test(Chat::class)
            ->set('userId', $receiver->id)
            ->set('message', $message)
            ->call('submit')
            ->assertHasNoErrors(['userId', 'message'])
            ->assertSet('modalOpen', false);

        $chat = $sender->chats()->whereHas('users', function ($query) use ($receiver) {
            $query->where('id', $receiver->id);
        })->first();

        $livewire
            ->assertSet('activeChat.id', $chat->id)
            ->assertSee('Message...')
            ->assertSee($receiver->name)
            ->assertSee($message);
    }
}
