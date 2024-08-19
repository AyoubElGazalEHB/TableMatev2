<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq_categories extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function faqItems()
    {
        return $this->hasMany(Faq_items::class);
    }
}
