<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataThpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_thps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_no');
            $table->string('employee_name');
            $table->bigInteger('base_salary');
            $table->bigInteger('tunjangan_jabatan');
            $table->bigInteger('tunjangan_fixed');
            $table->bigInteger('based_jamsostek');
            $table->string('no_jamsostek');
            $table->string('no_bpjs');
            $table->bigInteger('no_npwp');
            $table->integer('status_pajak');
            $table->bigInteger('no_rekening');
            $table->string('nama_bank');
            $table->string('nama_pemilik');

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
        Schema::dropIfExists('data_thps');
    }
}
