<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_no');
            $table->string('emoloyee_name');
            $table->date('start_date');
            $table->string('type');
            $table->unsignedBigInteger('company_home_id');
            $table->unsignedBigInteger('company_host_id');
            $table->unsignedBigInteger('band_position_id');
            $table->unsignedBigInteger('job_title_id');
            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('service_histories');
    }
}
