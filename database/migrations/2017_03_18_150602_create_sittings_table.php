<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSittingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sittings', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('sitting_date')->nullable();
            $table->string('nature')->nullable(); /* الطبيعة */
            $table->string('hall')->nullable(); /* القاعة */
            $table->integer('file_id')->unsigned();
            $table->timestamps();
            $table->foreign('file_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sittings');
    }

}
