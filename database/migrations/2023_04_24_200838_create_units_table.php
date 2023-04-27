<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Schema\SchemaBuilder;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->string('unit_type')->nullable();
            $table->longText('assessment_method')->nullable();
            $table->integer('nominal_hours')->default(0);
            $table->integer('scheduled_hours')->default(0);
            $table->integer('training_method_id')->nullable();
            $table->integer('subject_field_educ_id')->nullable();
            $table->tinyInteger('vet_flag')->default(0);
            $table->tinyInteger('status')->default(1);
            SchemaBuilder::BelongsToUserSchemaUp($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
};
