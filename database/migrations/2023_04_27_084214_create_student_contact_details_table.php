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
        Schema::create('student_contact_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id')->index();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            
            $table->string('addr_suburb')->nullable();
            $table->string('addr_flat_unit_detail')->nullable();
            $table->string('addr_building_property_name')->nullable();
            $table->string('addr_street_name')->nullable();
            $table->string('addr_street_num')->nullable();
            $table->string('postcode')->nullable();
            $table->string('state')->nullable();
            $table->string('addr_postal_delivery_box')->nullable();
            $table->string('home_country_res_addr')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('phone_work')->nullable();
            $table->string('phone_mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('email_alt')->nullable();
            $table->string('emer_name')->nullable();
            $table->string('emer_address')->nullable();
            $table->string('emer_phone')->nullable();
            $table->string('emer_relationship')->nullable();

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
        Schema::dropIfExists('student_contact_details');
    }
};
