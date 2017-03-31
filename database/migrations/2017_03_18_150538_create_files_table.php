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
            $table->string('reference');
            $table->string('type')->nullable();
            $table->string('division')->nullable();
            $table->string('subject')->nullable();
            $table->string('elementary_num')->nullable();
            $table->string('decision_judge')->nullable();
            $table->date('registration_date')->nullable();
            $table->text('verdict');
            $table->date('verdict_date')->nullable();
            $table->string('appellate_num')->nullable();
            $table->string('appellate_judge')->nullable();
            $table->unsignedInteger('office_id');
            $table->unsignedInteger('court_id');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('court_id')->references('id')->on('courts')->onDelete('cascade');
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
