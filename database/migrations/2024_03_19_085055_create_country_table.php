<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('enable')->default(1);

            $table->string('code');
            $table->string('name')->nullable();
            $table->string('flag')->nullable();

            $table->string('latitude')->nullable(); // 위도
            $table->string('longitude')->nullable(); // 경도

            $table->string('lang')->nullable();

            $table->string('users')->nullable();
            $table->string('users_percent')->nullable();

            $table->text('description')->nullable();

            $table->string('manager')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country');
    }
}
