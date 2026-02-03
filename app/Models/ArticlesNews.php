<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticlesNews extends Model
{
    protected $table = 'articles_news';

    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'slug',
        'thumbnail',
        'content',
        'is_featured' => 'boolean',
        'views',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
