<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Multicaret\Acquaintances\Traits\CanBeLiked;

class Post extends Model
{
    use HasFactory;

    use CanBeLiked;

    protected $fillable = ['content'];

    /**
     * User
     * 
     * @return BelongsTo 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
