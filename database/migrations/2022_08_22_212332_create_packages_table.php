<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('roi');
            $table->date('start_date');
            $table->string('slots');
            $table->string('min_amount');
            $table->enum('type', ['farm', 'plant']);
            $table->string('max_amount');
            $table->integer('duration')->nullable();
            $table->enum('duration_mode', ['day', 'month', 'year'])->default('day');
            $table->text('description');
            $table->text('image')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
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
        Schema::dropIfExists('packages');
    }
}