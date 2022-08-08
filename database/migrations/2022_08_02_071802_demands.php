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
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('demand_uniq_id', 25);
            $table->string('demand', 100);
            $table->string('email', 100);
            $table->string('phone', 25);
            $table->text('address');
            $table->string('gender', 5);
            $table->integer('size');
            $table->integer('shoes_size');
            $table->text('another');
            $table->integer('status');
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
        Schema::dropIfExists('demands');
    }
};
