<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq_Items extends Model
{
    use HasFactory;

    protected $table = 'faq_items'; // Ensure the correct table name

    protected $fillable = [
        'faq_categories_id',
        'user_id',
        'question',
        'answer',
    ];

    public function category()
    {
        return $this->belongsTo(Faq_categories::class, 'faq_categories_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}