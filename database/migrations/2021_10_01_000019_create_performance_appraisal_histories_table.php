<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceAppraisalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_appraisal_histories', function (
            Blueprint $table
        ) {
            $table->bigIncrements('id');
            $table->string('emp_no');
            $table->string('employee_name');
            $table->year('year');
            $table->string('performance_value');
            $table->string('performance_score');
            $table->string('competency_value');
            $table->string('behavioral_value');

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
        Schema::dropIfExists('performance_appraisal_histories');
    }
}
