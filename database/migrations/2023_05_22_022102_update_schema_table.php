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
        Schema::table('schemas', function (Blueprint $table) {
            $table->after('off_days', function ($table) {
                $table->boolean('schema_cancel')->default(false)->nullable();
                $table->integer('expiry_minute')->default(50)->nullable();
                $table->boolean('is_trending')->default(false)->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
