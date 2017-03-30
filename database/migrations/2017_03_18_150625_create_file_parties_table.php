<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_parties', function (Blueprint $table) {
            $table->integer('file_id')->unsigned();
            $table->integer('part_id')->unsigned();
            $table->boolean('type');
            $table->boolean('nature');
            $table->foreign('file_id')->references('id')->on('files');
            $table->foreign('part_id')->references('id')->on('parties');
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
        Schema::dropIfExists('file_parties');
    }
}
