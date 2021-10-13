<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsAndProfessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills_and_professions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('emp_no');
            $table->string('employee_name');
            $table->string('certificate_name');
            $table->string('institution');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('skills_and_professions');
    }
}
