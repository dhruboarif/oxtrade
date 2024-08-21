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
        Schema::table('gateways', function (Blueprint $table) {
            $table->string('is_withdraw')->default(0)->after('credentials')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gateways', function (Blueprint $table) {
            $table->dropColumn('is_withdraw');
            $table->dropColumn('type');
            $table->dropColumn('charge');
            $table->dropColumn('charge_type');
            $table->dropColumn('minimum_deposit');
            $table->dropColumn('maximum_deposit');
            $table->dropColumn('rate');
            $table->dropColumn('currency');
            $table->dropColumn('currency_symbol');
            $table->dropColumn('payment_details');
        });
    }
};
