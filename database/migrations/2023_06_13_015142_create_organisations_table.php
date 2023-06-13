<?php

use App\Models\Schema\SchemaBuilder;
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
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->string('organisation_id')->nullable();
            $table->string('organisation_name')->nullable();
            $table->string('organisation_logo')->nullable();
            $table->string('org_type_identifier')->nullable();
            $table->string('abn')->nullable();
            $table->string('cricos_code')->nullable();
            $table->string('site_url')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('email')->nullable();
            $table->string('addr_line_1')->nullable();
            $table->string('addr_line_2')->nullable();
            $table->string('suburb')->nullable();
            $table->string('student_id_prefix')->nullable();
            $table->string('person_in_charge_name')->nullable();
            $table->string('person_in_charge_position')->nullable();
            $table->string('person_in_charge_signature')->nullable();
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
        Schema::dropIfExists('organisations');
    }
};
