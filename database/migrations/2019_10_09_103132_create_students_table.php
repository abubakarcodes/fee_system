<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->string('picture')->nullable();
            $table->string('name');
            $table->string('father_name');
            $table->string('gender');
            $table->string('cnic');
            $table->string('contact');
            $table->string('birth_date');
            $table->string('email')->nullable();
            $table->string('father_contact');
            $table->text('expertise')->nullable();
            $table->string('referral')->nullable();
            $table->text('address')->nullable();
            $table->text('courses');
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
        Schema::dropIfExists('students');
    }
}
