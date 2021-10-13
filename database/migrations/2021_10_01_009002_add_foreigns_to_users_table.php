<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table
                ->foreign('band_position_id')
                ->references('id')
                ->on('band_positions')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('job_grade_id')
                ->references('id')
                ->on('job_grades')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('job_family_id')
                ->references('id')
                ->on('job_families')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('job_function_id')
                ->references('id')
                ->on('job_functions')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('city_recuite_id')
                ->references('id')
                ->on('city_recuites')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('status_employee_id')
                ->references('id')
                ->on('status_employees')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('company_home_id')
                ->references('id')
                ->on('company_homes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('company_host_id')
                ->references('id')
                ->on('company_hosts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('sub_status_id')
                ->references('id')
                ->on('sub_statuses')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('division_id')
                ->references('id')
                ->on('divisions')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('work_location_id')
                ->references('id')
                ->on('work_locations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('job_title_id')
                ->references('id')
                ->on('job_titles')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('edu_id')
                ->references('id')
                ->on('edus')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('direktorat_id')
                ->references('id')
                ->on('direktorats')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('departement_id')
                ->references('id')
                ->on('departements')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('jabatan_id')
                ->references('id')
                ->on('jabatans')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['band_position_id']);
            $table->dropForeign(['job_grade_id']);
            $table->dropForeign(['job_family_id']);
            $table->dropForeign(['job_function_id']);
            $table->dropForeign(['city_recuite_id']);
            $table->dropForeign(['status_employee_id']);
            $table->dropForeign(['company_home_id']);
            $table->dropForeign(['company_host_id']);
            $table->dropForeign(['sub_status_id']);
            $table->dropForeign(['unit_id']);
            $table->dropForeign(['division_id']);
            $table->dropForeign(['work_location_id']);
            $table->dropForeign(['job_title_id']);
            $table->dropForeign(['edu_id']);
            $table->dropForeign(['direktorat_id']);
            $table->dropForeign(['departement_id']);
            $table->dropForeign(['jabatan_id']);
        });
    }
}
