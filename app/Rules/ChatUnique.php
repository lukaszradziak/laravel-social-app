<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ChatUnique implements Rule
{
    private $userId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $query = \App\Models\Chat::whereHas('users', function($query){
            $query->where('user_id', auth()->user()->id);
        })->whereHas('users', function($query){
            $query->where('user_id', $this->userId);
        });
        
        return $query->count() === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This chat exists.';
    }
}
