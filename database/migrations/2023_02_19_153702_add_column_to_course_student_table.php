<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_student', function (Blueprint $table) {
            $table->integer('attendances')->default(0);
            $table->float('midterm_mark')->nullable(true);
            $table->float('final_mark')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_student', function (Blueprint $table) {
            $table->dropColumn('attendances');
            $table->dropColumn('midterm_mark');
            $table->dropColumn('final_mark');
        });
    }
}
