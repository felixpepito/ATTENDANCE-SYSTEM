<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');  // Links to the User table
            $table->date('date');
            $table->enum('status', ['present', 'absent']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance');
    }
}
