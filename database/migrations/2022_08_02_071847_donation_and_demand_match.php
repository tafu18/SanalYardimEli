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
        Schema::create('donation_and_demand_match', function (Blueprint $table) {
            $table->id();
            $table->string('donation_di', 25);
            $table->string('demand_id', 25);
            $table->string('donation_name', 50);
            $table->text('img_src');
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
        Schema::dropIfExists('donation_and_demand_match');
    }
};
