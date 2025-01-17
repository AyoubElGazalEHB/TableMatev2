<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqItemsTable extends Migration
{
    public function up()
    {
        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_categories_id')->constrained('faq_categories')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('question');
            $table->text('answer')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_items');
    }
}