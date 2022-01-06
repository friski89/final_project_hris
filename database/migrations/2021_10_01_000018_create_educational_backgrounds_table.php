<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_backgrounds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_no', 100);
            $table->string('employee_name', 100);
            $table->string('institution_name');
            $table->string('faculty');
            $table->string('major');
            $table->date('graduate_date');
            $table->string('cost_category');
            $table->string('scholarship_institution')->nullable();
            $table->string('gpa');
            $table->string('gpa_scale');
            $table->string('default');
            $table->date('start_year');
            $table->string('city');
            $table->string('state');
            $table->string('country');

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
        Schema::dropIfExists('educational_backgrounds');
    }
}
