<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToAlamatKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alamat_kerjas', function (Blueprint $table) {
            $table
                ->foreign('work_location_id')
                ->references('id')
                ->on('work_locations')
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
        Schema::table('alamat_kerjas', function (Blueprint $table) {
            $table->dropForeign(['work_location_id']);
        });
    }
}
