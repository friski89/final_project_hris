<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('gender', ['male', 'female', 'other']);
            $table
                ->string('phone_number', 20)
                ->nullable()
                ->unique();
            $table
                ->enum('blood_group', ['Tidak Tahu', 'O', 'A', 'B', 'AB'])
                ->nullable();
            $table
                ->string('no_ktp', 30)
                ->nullable()
                ->unique();
            $table
                ->string('no_npwp', 30)
                ->nullable()
                ->unique();
            $table->text('address_ktp')->nullable();
            $table->text('address_domisili')->nullable();
            $table
                ->enum('status_domisili', [
                    'Rumah Sendiri',
                    'Rumah Sewa',
                    'Rumah Keluarga',
                ])
                ->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('address_npwp');
            $table->string('nama_ibu');
            $table->boolean('vaccine1')->nullable();
            $table->boolean('vaccine2')->nullable();
            $table->boolean('not_vaccine')->nullable();
            $table->text('remarks_not_vaccine')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
