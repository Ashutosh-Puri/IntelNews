<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('dev_name')->nullable();
            $table->string('dev_company')->nullable();
            $table->string('dev_site')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('logo_small')->nullable();
            $table->string('logo_large')->nullable();
            $table->string('favicon')->nullable();
            $table->string('social_icon_1')->nullable();
            $table->string('social_icon_1_url')->nullable();
            $table->string('social_icon_2')->nullable();
            $table->string('social_icon_2_url')->nullable();
            $table->string('social_icon_3')->nullable();
            $table->string('social_icon_3_url')->nullable();
            $table->string('social_icon_4')->nullable();
            $table->string('social_icon_4_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_setting');
    }
};
