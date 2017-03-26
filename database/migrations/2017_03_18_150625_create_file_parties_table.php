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
            $table->string('file_reference', 25);
            $table->unsignedInteger('part_id');
            $table->boolean('part_type');
            $table->primary(array('file_reference', 'part_id'));
            $table->foreign('file_reference')->references('file_reference')->on('files')->onDelete('cascade');
            $table->foreign('part_id')->references('part_id')->on('parties')->onDelete('cascade');
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
