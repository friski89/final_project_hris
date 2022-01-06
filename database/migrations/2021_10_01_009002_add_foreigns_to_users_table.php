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
            $table->foreignId('band_position_id')->nullable()->constrained("band_positions")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('job_grade_id')->nullable()->constrained("job_grades")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('job_family_id')->nullable()->constrained("job_families")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('job_function_id')->nullable()->constrained("job_functions")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('city_recuite_id')->nullable()->constrained("city_recuites")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('status_employee_id')->nullable()->constrained("status_employees")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('company_home_id')->nullable()->constrained("company_homes")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('company_host_id')->nullable()->constrained("company_hosts")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('sub_status_id')->nullable()->constrained("sub_statuses")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('unit_id')->nullable()->constrained("units")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('division_id')->nullable()->constrained("divisions")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('work_location_id')->nullable()->constrained("work_locations")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('job_title_id')->nullable()->constrained("job_titles")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('edu_id')->nullable()->constrained("edus")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('direktorat_id')->nullable()->constrained("direktorats")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('departement_id')->nullable()->constrained("departements")->cascadeOnUpdate()->nullOnDelete();
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
        });
    }
}
