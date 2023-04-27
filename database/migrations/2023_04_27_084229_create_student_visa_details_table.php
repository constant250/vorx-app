<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_visa_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id')->index();
            // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->string('nationality')->nullable();
            $table->string('passport_no')->nullable();
            $table->date('passport_issued_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            
            $table->integer('visa_type_id')->nullable();
            $table->string('subclass')->nullable();
            $table->date('visa_expiry_date')->nullable();

            $table->string('study_rights')->nullable();
            $table->string('applied_for_au_residency')->nullable();

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
        Schema::dropIfExists('student_visa_details');
    }
};
