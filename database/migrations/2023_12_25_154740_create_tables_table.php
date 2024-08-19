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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // Image column
            $table->integer('tableNumber');
            $table->integer('persons');
            $table->text('description');
            $table->string('seatingArea'); // Changed from classTable to seatingArea
            $table->decimal('price', 8, 2)->nullable(); // Assuming price is optional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
};
