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
            $table->unsignedBigInteger('band_position_id');
            $table->unsignedBigInteger('job_grade_id')->nullable();
            $table->unsignedBigInteger('job_family_id')->nullable();
            $table->unsignedBigInteger('job_function_id')->nullable();
            $table->unsignedBigInteger('city_recuite_id');
            $table->unsignedBigInteger('status_employee_id');
            $table->unsignedBigInteger('company_home_id');
            $table->date('date_sk')->nullable();
            $table->unsignedBigInteger('company_host_id')->nullable();
            $table->unsignedBigInteger('sub_status_id')->nullable();
            $table->unsignedBigInteger('unit_id');
            $table->string('place_of_birth', 150);
            $table->unsignedBigInteger('division_id');
            $table->date('date_of_birth');
            $table->unsignedBigInteger('work_location_id');
            $table->integer('age');
            $table->unsignedBigInteger('job_title_id');
            $table->unsignedBigInteger('edu_id');
            $table->unsignedBigInteger('direktorat_id');
            $table->unsignedBigInteger('departement_id');
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
