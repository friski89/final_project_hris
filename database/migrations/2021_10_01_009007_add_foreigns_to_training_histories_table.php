<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToTrainingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_histories', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained("users")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('other_competencies_id')->nullable()->constrained("other_competencies")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('competence_fanctional_id')->nullable()->constrained("competence_fanctionals")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('competence_leadership_id')->nullable()->constrained("competence_leaderships")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('competence_core_value_id')->nullable()->constrained("competence_core_values")->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_histories', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['other_competencies_id']);
            $table->dropForeign(['competence_fanctional_id']);
            $table->dropForeign(['competence_leadership_id']);
            $table->dropForeign(['competence_core_value_id']);
        });
    }
}
