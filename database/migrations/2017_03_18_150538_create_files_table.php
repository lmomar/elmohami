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
            $table->string('type')->nullable();             /*  نوع الملف*/
            $table->string('division')->nullable();         /*الشعبة    */
            $table->string('subject')->nullable();          /*  الموضوع*/
            $table->string('elementary_num')->unique()->nullable();   /*  الرقم الابتدائي*/
            $table->string('decision_judge')->nullable();   /*القاضي المقرر*/
            $table->date('registration_date')->nullable();  /*تاريخ التسجيل*/
            $table->text('verdict')->nullable();                        /*  آخر حكم/قرار*/
            $table->datetime('verdict_date')->nullable();
            $table->string('appellate_num')->unique()->nullable();    /*الرقم الاستئنافي*/
            $table->string('appellate_judge')->nullable();  /*القاضي المستشار*/
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
