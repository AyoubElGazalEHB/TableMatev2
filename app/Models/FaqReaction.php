<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqReaction extends Model
{
    use HasFactory;

    protected $fillable = ['faq_item_id', 'user_id', 'reaction'];

    public function faqItem()
    {
        return $this->belongsTo(Faq_Items::class, 'faq_item_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}