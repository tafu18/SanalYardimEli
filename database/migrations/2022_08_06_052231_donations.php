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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('donation_uniq_id', 25);
            $table->string('donation', 100);
            $table->string('email', 100);
            $table->string('phone', 25);
            $table->integer('qty');
            $table->integer('qty_control');
            $table->integer('donation_form');
            $table->text('address');
            $table->text('another');
            $table->integer('status');
            $table->string('img_src', 255);
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
        Schema::dropIfExists('donations');
    }
};
