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
        Schema::create('scheduled_task', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('command');
            $table->integer('frequency')->comment('in minutes');
            $table->timestamp('scheduled_at');
            $table->timestamp('scheduled_previous_at')->nullable();
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
        Schema::dropIfExists('scheduled_task');
    }
};
