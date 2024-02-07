<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'author',
        'content',
    ];

    // One to one relation
    public function article(): HasOne
    {
        return $this->hasOne(Article::class);
    }
}
