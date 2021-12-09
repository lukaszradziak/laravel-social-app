<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Multicaret\Acquaintances\Traits\CanBeLiked;

class Post extends Model
{
    use HasFactory;
    use CanBeLiked;

    protected $fillable = ['content'];

    /**
     * List hashtags in content
     * 
     * @return string[] 
     */
    public function parseHashtags()
    {
        preg_match_all('/#([\p{Pc}\p{N}\p{L}\p{Mn}]+)/u', $this->content, $matches);
        return $matches[1];
    }

    /**
     * Author of post
     * 
     * @return BelongsTo 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Hashtags
     * 
     * @return BelongsToMany 
     */

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class);
    }
}
