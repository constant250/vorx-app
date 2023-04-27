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
        Schema::create('student_avetmiss_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id')->index();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            
            $table->string('usi')->nullable();
            $table->string('highest_school_level_completed_id')->nullable();
            $table->string('indigenous_status_id')->nullable();
            $table->string('language_id')->nullable();
            $table->string('labour_force_status_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('disability_flag')->default('N');
            $table->longText('disability')->nullable(); // json
            $table->string('prior_educational_achievment_flag')->default('N');
            $table->longText('prior_educational_achievment')->nullable(); // json
            $table->string('at_school_flag')->default('N');
            $table->string('institute')->nullable();
            $table->string('city_of_birth')->nullable();
            $table->string('survey_contact_status')->nullable();
            $table->string('statistical_area_level_1_id')->nullable();
            $table->string('statistical_area_level_2_id')->nullable();
            $table->string('year_completed')->nullable();
            $table->date('aiss_check_date')->nullable();

            $table->integer('english_test_id')->nullable();
            $table->string('english_test_score')->nullable();
            $table->date('english_test_date ')->nullable();

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
        Schema::dropIfExists('student_avetmiss_details');
    }
};
