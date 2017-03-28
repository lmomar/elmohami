<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSittingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sittings', function (Blueprint $table) {
            $table->increments('sitting_id');
            $table->date('sitting_date');
            $table->text('next_procedure');
            $table->text('Verdict');
            $table->string('file_reference', 25);
            $table->foreign('file_reference')->references('file_reference')->on('files')->onDelete('cascade');
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
        Schema::dropIfExists('sittings');
    }
}
