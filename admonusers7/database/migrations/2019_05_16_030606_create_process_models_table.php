<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_models', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement()->unique();
            $table->string('process_id');
            $table->string('process_name');
            $table->text('description');
            $table->string('municipio');
            $table->string('departamento');
            $table->date('fecha_inicio');
            $table->date('feche_fin');
            $table->string('url_docs');
            $table->boolean('status');
            $table->boolean('confirmed');
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
        Schema::dropIfExists('process_models');
    }
}
