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
        Schema::create('organisation_delivery_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('org_id');
            $table->string('train_org_dlvr_loc_id');
            $table->string('train_org_dlvr_loc_name');
            $table->string('postcode');
            $table->string('state_id');
            $table->string('addr_location');
            $table->string('country_id');
            $table->string('addr_street_num')->nullable();
            $table->string('addr_street_name')->nullable();
            $table->string('addr_building_property_name')->nullable();
            $table->string('addr_flat_unit_detail')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('organisation_delivery_locations');
    }
};
