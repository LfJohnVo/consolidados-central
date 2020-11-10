<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('regiones',function (Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->string('identificador');
            $table->timestamps();
        });

        Schema::create('cat_grupos',function (Blueprint $table){
            $table->id('id_grupos');
            $table->string('grupo');
            $table->timestamps();
        });

        Schema::create('proyecto',function (Blueprint $table){
            $table->id();
            $table->integer('no_proyecto');
            $table->string('Nombre');
            $table->unsignedBigInteger('id_region');
            $table->foreign('id_region')->references('id')->on('regiones')->onDelete('cascade');
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_grupo')->references('id_grupos')->on('cat_grupos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('gerentes', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_proyecto');
            $table->foreign('id_proyecto')->references('id')->on('proyecto')->onDelete('cascade');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('OperacionesDet', function (Blueprint $table){
            $table->id();
            $table->timestamp('fecha');
            $table->integer('no_operaciones');
            $table->unsignedBigInteger('id_proyecto');
            $table->foreign('id_proyecto')->references('id')->on('proyecto')->onDelete('cascade');
            $table->timestamps();
            $table->char('estatus');
            $table->bigInteger('id_concepto');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('regiones');
        Schema::dropIfExists('cat_grupos');
        Schema::dropIfExists('proyecto');
        Schema::dropIfExists('gerentes');
        Schema::dropIfExists('OperacionesDet');
    }
}
