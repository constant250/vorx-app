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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('gender')->default('Male');
            $table->date('date_of_birth')->nullable();
            $table->string('shore_type')->default('ONSHORE');
            $table->integer('is_active')->default(1);
            $table->integer('is_test')->default(1);
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
        Schema::dropIfExists('students');
    }
};
