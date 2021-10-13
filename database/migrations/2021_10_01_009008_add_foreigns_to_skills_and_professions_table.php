<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToSkillsAndProfessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skills_and_professions', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('other_competencies_id')
                ->references('id')
                ->on('other_competencies')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('competence_fanctional_id')
                ->references('id')
                ->on('competence_fanctionals')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('competence_leadership_id')
                ->references('id')
                ->on('competence_leaderships')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('competence_core_value_id')
                ->references('id')
                ->on('competence_core_values')
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
        Schema::table('skills_and_professions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['other_competencies_id']);
            $table->dropForeign(['competence_fanctional_id']);
            $table->dropForeign(['competence_leadership_id']);
            $table->dropForeign(['competence_core_value_id']);
        });
    }
}
