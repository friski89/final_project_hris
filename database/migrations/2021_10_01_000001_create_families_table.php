<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_name');
            $table->string('emp_no');
            $table
                ->enum('marital_status', [
                    'Menikah',
                    'Belum Menikah',
                    'Duda',
                    'Janda',
                ])
                ->nullable();
            $table->string('no_kk');
            $table->string('family_name');
            $table->string('nik_id')->unique();
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('date_marital')->nullable();
            $table->enum('religion', [
                'Islam',
                'Kristen',
                'Hindu',
                'Budha',
                'Konghucu',
            ]);
            $table->string('citizenship');
            $table->string('work')->nullable();
            $table->integer('health_status');
            $table->enum('blood_group', ['Tidak Tahu', 'O', 'A', 'B', 'AB']);
            $table->string('blood_rhesus')->nullable();
            $table->string('house_number')->nullable();
            $table->string('handphone_number')->nullable();
            $table->string('emergency_number')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->enum('relationship', ['Suami', 'Istri', 'Anak']);
            $table->integer('alive');
            $table->integer('urutan');
            $table->integer('dependent_status');
            $table->boolean('vaccine1')->nullable();
            $table->boolean('vaccine2')->nullable();
            $table->boolean('not_vaccine')->nullable();
            $table->text('remarks_not_vaccine')->nullable();
            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('families');
    }
}
