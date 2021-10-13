<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToAssignmentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assignment_histories', function (Blueprint $table) {
            $table
                ->foreign('company_home_id')
                ->references('id')
                ->on('company_homes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('job_title_id')
                ->references('id')
                ->on('job_titles')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::table('assignment_histories', function (Blueprint $table) {
            $table->dropForeign(['company_home_id']);
            $table->dropForeign(['job_title_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
