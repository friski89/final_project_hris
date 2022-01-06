<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToServiceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_histories', function (Blueprint $table) {
            $table->foreignId('company_home_id')->nullable()->constrained("company_homes")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('company_host_id')->nullable()->constrained("company_hosts")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('band_position_id')->nullable()->constrained("band_positions")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('job_title_id')->nullable()->constrained("job_titles")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained("users")->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_histories', function (Blueprint $table) {
            $table->dropForeign(['company_home_id']);
            $table->dropForeign(['company_host_id']);
            $table->dropForeign(['band_position_id']);
            $table->dropForeign(['job_title_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
