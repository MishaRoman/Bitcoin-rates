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
        Schema::create('bitcoin_rates', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time_period_start');
            $table->timestamp('time_period_end');
            $table->timestamp('time_open');
            $table->timestamp('time_close');
            $table->decimal('price_open', 18, 9);
            $table->decimal('price_high', 18, 9);
            $table->decimal('price_low', 18, 9);
            $table->decimal('price_close', 18, 9);
            $table->decimal('volume_traded', 18, 9);
            $table->integer('trades_count');

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
        Schema::dropIfExists('bitcoin_rates');
    }
};
