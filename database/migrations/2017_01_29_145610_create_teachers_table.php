<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function(Blueprint $table)
        {
            $table->increments('nip');
            $table->string('teacher_name');
            $table->string('gender');
            $table->date('date_birth');
            $table->string('address');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id_subject')->on('subjects');
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
        Schema::drop('teachers');  
    }
}
