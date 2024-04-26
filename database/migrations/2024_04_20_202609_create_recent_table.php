<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recent', function (Blueprint $table) {
            $table->id();
            $table->timestamp('view_date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps(); // This includes both 'created_at' and 'updated_at' timestamps
        
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        
            // Adding last_viewed_at column (userStamps renamed for clarity)
            $table->timestamp('last_viewed_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recent');
    }
};
