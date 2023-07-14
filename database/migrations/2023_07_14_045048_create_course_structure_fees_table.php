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
        Schema::create('course_structure_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->string('cricos_code')->nullable();
            $table->integer('state_id')->nullable();
            $table->decimal('week_duration')->default(0);
            $table->decimal('training_hours_weekly')->default(0);
            $table->decimal('work_placement')->default(0);
            $table->decimal('onshore_material_fee', 12, 2)->default(0);
            $table->decimal('onshore_application_fee', 12, 2)->default(0);
            $table->decimal('onshore_tuition_fee', 12, 2)->default(0);
            $table->decimal('offshore_material_fee', 12, 2)->default(0);
            $table->decimal('offshore_application_fee', 12, 2)->default(0);
            $table->decimal('offshore_tuition_fee', 12, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_structure_fees');
    }
};
