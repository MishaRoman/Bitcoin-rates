<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableBitcoinRatesChangeTimestampsToString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bitcoin_rates', function (Blueprint $table) {
            $table->string('time_period_start')->change();
            $table->string('time_period_end')->change();
            $table->string('time_open')->change();
            $table->string('time_close')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bitcoin_rates', function (Blueprint $table) {
            $table->dropColumn('time_period_start');
            $table->dropColumn('time_period_end');
            $table->dropColumn('time_open');
            $table->dropColumn('time_close');


        });
        Schema::table('bitcoin_rates', function (Blueprint $table) {
            $table->timestamp('time_period_start');
            $table->timestamp('time_period_end');
            $table->timestamp('time_open');
            $table->timestamp('time_close');
        });
    }
}
