<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference', 25);
            $table->string('elementary_num', 25)->nullable();
            $table->string('type')->nullable();
            $table->string('division')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('decision_judge')->nullable();
            $table->string('subject')->nullable();
            $table->text('verdict')->nullable();
            $table->date('verdict_date')->nullable();
            $table->string('appellate_num', 25)->nullable();
            $table->string('appellate_judge')->nullable();
            $table->unsignedInteger('office_id');
            $table->unsignedInteger('court_id');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('court_id')->references('court_id')->on('courts')->onDelete('cascade');
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
        Schema::dropIfExists('files');
    }
}
