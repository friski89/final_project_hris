<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->string('avatar')->nullable();
            $table
                ->string('nik_telkom')
                ->nullable()
                ->unique();
            $table->string('nik_company')->unique();
            $table->date('date_in');
            $table->date('date_sk')->nullable();
            $table->string('place_of_birth', 150);
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('jabatan')->nullable();
            $table->date('tanggal_kartap')->nullable();
            $table->string('no_sk_kartap')->unique();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
