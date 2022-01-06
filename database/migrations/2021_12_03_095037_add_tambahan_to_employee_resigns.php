<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTambahanToEmployeeResigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_resigns', function (Blueprint $table) {
            $table->string('keterangan')->nullable();
            $table->string('information')->nullable();
            $table->date('date_information')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_resigns', function (Blueprint $table) {
            $table->dropColumn('keterangan');
            $table->dropColumn('information');
            $table->dropColumn('date_information');
        });
    }
}
