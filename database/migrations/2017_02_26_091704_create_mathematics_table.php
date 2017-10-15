<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMathematicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mathematics', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_nis')->unsigned();
            $table->foreign('id_nis')->references('nis')->on('students');
            $table->integer('id_nip')->unsigned();
            $table->foreign('id_nip')->references('nip')->on('teachers');
            $table->integer('daily_exam_1');
            $table->integer('daily_task_1');
            $table->integer('daily_exam_2');
            $table->integer('midterm_tests');
            $table->integer('daily_task_2');
            $table->integer('daily_exam_3');
            $table->integer('daily_task_3');
            $table->integer('final_exam');
            $table->integer('mathematics_score');
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
        Schema::drop('mathematics');
    }
}
