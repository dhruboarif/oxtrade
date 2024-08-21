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
        Schema::create('deposit_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('gateway_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('name');
            $table->enum('type', ['auto', 'manual'])->default('manual');
            $table->string('gateway_code')->unique();
            $table->double('charge')->default(0);
            $table->enum('charge_type', ['percentage', 'fixed']);
            $table->double('minimum_deposit');
            $table->double('maximum_deposit');
            $table->double('rate');
            $table->string('currency');
            $table->string('currency_symbol');
            $table->longText('field_options')->nullable();
            $table->longText('payment_details')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('deposit_methods');
    }
};
