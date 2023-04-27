<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->increments('id');
            $table->string('title');
            $table->string('category_id');
            $table->string('admin_id');
            $table->text('description');
            $table->string('image');
            $table->string('date');
            $table->string('state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
