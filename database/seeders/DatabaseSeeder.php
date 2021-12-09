<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()
            ->count(20)
            ->sequence(function ($sequence) {
                if ($sequence->index == 0) {
                    return [
                        'name' => 'Admin',
                        'email' => 'admin@admin',
                    ];
                } else if ($sequence->index == 1) {
                    return [
                        'name' => 'Test',
                        'email' => 'test@test',
                    ];
                }
                return [];
            })
            ->create();

        $usersId = $users->pluck('id');

        $users->each(function ($user) use ($usersId) {
            $user->chats()->saveMany(
                Chat::factory()
                    ->count(10)
                    ->create()
                    ->each(function ($chat) use ($user, $usersId) {
                        $randomUserId = $usersId->random();

                        $chat->users()->attach([$randomUserId]);

                        $chat->messages()->saveMany(
                            ChatMessage::factory()
                                ->count(10)
                                ->state(new Sequence(
                                    ['user_id' => $user->id],
                                    ['user_id' => $randomUserId],
                                ))
                                ->create([
                                    'chat_id' => $chat->id
                                ])
                        );
                    })
            );

            $user->posts()->saveMany(
                Post::factory()
                    ->count(5)
                    ->create()
            );
        });
    }
}
