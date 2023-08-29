<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('entrance_exams', function (Blueprint $table) {
            $table->id();
            $table->integer('admission_year');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('code')->unique();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->foreignId('college_id')->constrained('colleges')->onDelete('cascade');
            $table->date('exam_date')->nullable();
            $table->date('registration_start_date')->nullable();
            $table->date('reg_last_date')->nullable();
            $table->decimal('fee', 8, 2)->nullable();
            $table->date('result_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entrance_exams');
    }
};
