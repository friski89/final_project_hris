<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_no');
            $table->string('employee_name');
            $table->string('training_name');
            $table->string('institution');
            $table->date('start_date');
            $table->string('years_of_training');
            $table->string('training_duration');
            $table->date('end_date');
            $table->string('training_force');
            $table->string('rating');
            $table->string('trnevent_topic');
            $table->string('trncourse_cost');
            $table->string('trnevent_type');
            $table->string('trn_flag');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('other_competencies_id')->nullable();
            $table->unsignedBigInteger('competence_fanctional_id')->nullable();
            $table->unsignedBigInteger('competence_leadership_id')->nullable();
            $table->unsignedBigInteger('competence_core_value_id')->nullable();

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
        Schema::dropIfExists('training_histories');
    }
}
