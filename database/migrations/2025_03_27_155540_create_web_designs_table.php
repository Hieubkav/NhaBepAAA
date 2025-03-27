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
        Schema::create('web_designs', function (Blueprint $table) {
            $table->id();

            // Footer section
            $table->string('footer_title')->nullable();
            $table->text('footer_content1')->nullable();
            $table->text('footer_content2')->nullable();
            $table->text('footer_content3')->nullable();
            $table->text('footer_content4')->nullable();
            $table->string('footer_link1')->nullable();
            $table->string('footer_link2')->nullable();
            $table->string('footer_link3')->nullable();
            $table->string('footer_link4')->nullable();

            // Services section
            $table->boolean('service_status')->default(true);
            $table->string('service_pic')->nullable();
            $table->text('service_des')->nullable();
            $table->string('service_title')->nullable();
            // Sub services 1-4
            $table->string('service_sub_logo_1')->nullable();
            $table->string('service_sub_title_1')->nullable();
            $table->text('service_sub_des_1')->nullable();
            $table->string('service_sub_logo_2')->nullable();
            $table->string('service_sub_title_2')->nullable();
            $table->text('service_sub_des_2')->nullable();
            $table->string('service_sub_logo_3')->nullable();
            $table->string('service_sub_title_3')->nullable();
            $table->text('service_sub_des_3')->nullable();
            $table->string('service_sub_logo_4')->nullable();
            $table->string('service_sub_title_4')->nullable();
            $table->text('service_sub_des_4')->nullable();

            // Vision section
            $table->boolean('vision_status')->default(true);
            $table->text('vision_des')->nullable();
            // Vision items 1-3
            $table->string('vision_content_title_1')->nullable();
            $table->text('vision_content_des_1')->nullable();
            $table->string('vision_content_logo_1')->nullable();
            $table->string('vision_content_title_2')->nullable();
            $table->text('vision_content_des_2')->nullable();
            $table->string('vision_content_logo_2')->nullable();
            $table->string('vision_content_title_3')->nullable();
            $table->text('vision_content_des_3')->nullable();
            $table->string('vision_content_logo_3')->nullable();

            // Map section
            $table->boolean('map_status')->default(true);
            $table->string('map_title')->nullable();
            $table->text('map_des')->nullable();
            $table->text('map_link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_designs');
    }
};
