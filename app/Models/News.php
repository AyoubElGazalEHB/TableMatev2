<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image_path', 'content', 'publication_date'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
