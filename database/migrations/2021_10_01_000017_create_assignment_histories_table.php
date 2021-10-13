<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_no');
            $table->string('employee_name');
            $table->date('date');
            $table->unsignedBigInteger('company_home_id');
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
        Schema::dropIfExists('assignment_histories');
    }
}
