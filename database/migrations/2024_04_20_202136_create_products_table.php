<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->string('url');
            $table->text('short_description')->nullable();
            $table->json('images')->nullable(); // Store images as JSON array
            $table->decimal('average_rating', 3, 2)->nullable();
            $table->integer('total_reviews')->default(0);
            $table->string('seller_name')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
        
            // Define foreign key constraint for website_id (assuming this was missing)
            $table->unsignedBigInteger('website_id');
            $table->foreign('website_id')->references('id')->on('websites')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
