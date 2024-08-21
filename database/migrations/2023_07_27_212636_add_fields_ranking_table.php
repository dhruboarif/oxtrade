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
        Schema::table('rankings', function (Blueprint $table) {
            $table->integer('minimum_deposit')->default('0')->nullable()->after('ranking_name');
            $table->integer('minimum_invest')->default('0')->nullable()->after('minimum_deposit');
            $table->integer('minimum_referral')->default('0')->nullable()->after('minimum_invest');
            $table->integer('minimum_referral_deposit')->default('0')->nullable()->after('minimum_invest');
            $table->integer('minimum_referral_invest')->default('0')->nullable()->after('minimum_referral_deposit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rankings', function (Blueprint $table) {
            //
        });
    }
};
