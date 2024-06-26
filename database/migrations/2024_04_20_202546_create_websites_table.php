<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('website_name');
            $table->string('url');
            $table->string('icon')->nullable(); 
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('websites');
    }
};
