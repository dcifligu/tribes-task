<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('previous_counts', function (Blueprint $table) {
            $table->id();
            $table->string('countable_type');
            $table->unsignedInteger('count');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('previous_counts');
    }
};
