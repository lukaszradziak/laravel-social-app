<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeOwn($query)
    {
        return $query->whereHas('users', function($query){
            $query->where('id', auth()->user()->id);
        });
    }

    public function user()
    {
        return $this
            ->users
            ->where('id', '<>', auth()->user()->id)
            ->first();
    }
}
