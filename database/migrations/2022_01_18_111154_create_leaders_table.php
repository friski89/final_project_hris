<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('atasan1')->nullable();
            $table->string('nik_atasan1')->nullable();
            $table->string('jabatan1')->nullable();
            $table->string('atasan2')->nullable();
            $table->string('nik_atasan2')->nullable();
            $table->string('jabatan2')->nullable();
            $table->string('atasan3')->nullable();
            $table->string('nik_atasan3')->nullable();
            $table->string('jabatan3')->nullable();
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
        Schema::dropIfExists('leaders');
    }
}
