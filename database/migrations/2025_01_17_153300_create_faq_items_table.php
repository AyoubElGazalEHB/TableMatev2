<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('faq_items', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->unsignedBigInteger('faq_categories_id'); // Foreign key
        $table->string('question'); // Question field
        $table->text('answer')->nullable(); // Answer field
        $table->timestamps(); // Created and updated timestamps

        // Foreign key constraint
        $table->foreign('faq_categories_id')
              ->references('id')->on('faq_categories')
              ->onDelete('cascade'); // Cascade on delete
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_items');
    }
};
