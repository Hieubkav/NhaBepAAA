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
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            //status kiểu 	tinyint(1)
            $table->boolean('status')->default(true);
            $table->string('name');
            $table->text('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_visible')->default(true);
            
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
